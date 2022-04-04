<?php

namespace App\Plugins;

use App\Constant;
use Exception;
use Illuminate\Support\Facades\Log;

class SCBPC
{

    private $className = 'SCBPC';
    private $baseUrl = 'https://www.scbeasy.com';
    private $userAgent = 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36';
    private $cookie = 'bank.scbpc.cookie';
    private $username = '';
    private $password = '';
    public $currentBalance = 0;
    private $timeout = 60;
    private $SESSIONEASY;
    public $loggedInType;

    public function setAccount($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function setCookieFile($filePath)
    {
        $this->cookie = $filePath;
    }

    public function login()
    {
        if (!$this->isLoggedIn()) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "{$this->baseUrl}/v1.4/site/presignon/index.asp");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Expect:"));
            curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
            curl_exec($ch);

            if (curl_errno($ch)) {
                $error = curl_error($ch);
                $this->errorHanding($error);
                $data = ['error' => $error];
                return $this->responseHanding('login', 'failed', 'ไม่สามารถเข้าหน้าฟอร์มเข้าใช้งานระบบ', $data);
            }

            $this->loggedInType = 'NEW SESSION';
            $this->cookieFailedHading();
            Log::debug('THE SESSION HAS EXPIRED, TRYING TO LOGIN AGAIN.');

            curl_setopt($ch, CURLOPT_URL, "{$this->baseUrl}/online/easynet/page/lgn/login.aspx");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "LANG=T&LOGIN=" . urlencode($this->username) . "&PASSWD=" . urlencode($this->password) . "&lgin.x=24&lgin.y=21");
            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                $error = curl_error($ch);
                $this->errorHanding($error);
                $data = ['error' => $error];
                Log::error($error);
                return $this->responseHanding('login', 'failed', 'ไม่สามารถเข้าสู่ระบบได้', $data);
            }

            if (preg_match("/error_signon.aspx/", $result)) {
                preg_match("/\"ERR_CASE\" VALUE=\"([0-9]{1,})\"/", $result, $errno);
                curl_setopt($ch, CURLOPT_URL, "{$this->baseUrl}/online/easynet/page/err/error_signon.aspx");
                curl_setopt($ch, CURLOPT_REFERER, "{$this->baseUrl}/online/easynet/page/lgn/login.aspx");
                curl_setopt($ch, CURLOPT_POSTFIELDS, "LANG=T&ERR_CASE=" . urlencode($errno[1]));
                $errPage = iconv("TIS-620", "UTF-8", curl_exec($ch));
                preg_match("/<b>(.*?)<br/", $errPage, $errmsg);
                $error = $errmsg[1];
                $data = ['error' => $error];
                Log::error($error);
                return $this->responseHanding('login', 'failed', 'ไม่สามารถเข้าสู่ระบบได้', $data);
            }

            preg_match("/<INPUT TYPE=\"HIDDEN\" NAME=\"SESSIONEASY\" VALUE=\"(.*?)\">/", $result, $ml);
            $this->SESSIONEASY = $ml[1];

            Constant::set('SCB_INBOUND_SESSIONEASY', $this->SESSIONEASY);
            $this->getBalance();
        }
        return true;
    }

    public function isLoggedIn()
    {
        $this->loggedInType = 'OLD SESSION';
        $this->SESSIONEASY = Constant::item('SCB_INBOUND_SESSIONEASY');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "{$this->baseUrl}/online/easynet/page/acc/acc_bnk_bln.aspx");
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "SESSIONEASY={$this->SESSIONEASY}");
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            Log::error($error);
            $this->errorHanding($error);
            $data = ['error' => $error];
            return $this->responseHanding('isLoggedIn', 'failed', 'ไม่สามารถตรวจสอบการเข้าใช้งานระบบได้', $data);
        }
        curl_close($ch);

        try {
            $result = iconv("TIS-620", "UTF-8", $result);
        } catch (Exception $exception) {
            $error = 'ไม่สามารถตรวจสอบการเข้าใช้งานระบบได้';
            Log::error($error);
            $this->cookieFailedHading();
            return false;
        }

        $result = str_replace(["\r", "\t", "\n"], "", $result);
        if (preg_match('/ท่านไม่สามารถทำรายการได้ในขณะนี้/', $result)) {
            $error = 'ขออภัย ท่านไม่สามารถทำรายการได้ในขณะนี้ อีกสักครู่กรุณาลองใหม่';
            Log::error($error);
            $this->cookieFailedHading();
            return false;
        }

        if (preg_match('/ธนาคารไม่สามารถให้บริการกับท่านได้ในขณะนี้/', $result)) {
            $error = 'ธนาคารไม่สามารถให้บริการกับท่านได้ในขณะนี้ เนื่องจากเงื่อนไขของท่านไม่ตรงกับที่ธนาคารกำหนด';
            Log::error($error);
            $this->cookieFailedHading();
            return false;
        }

        if (preg_match('/ได้ออกจากระบบแล้ว/', $result) || preg_match('/already logged out/', $result)) {
            $error = 'ท่านไม่ได้ทำรายการเกินเวลาที่กำหนดหรือได้ออกจากระบบแล้ว';
            Log::error($error);
            $this->cookieFailedHading();
            return false;
        } else {
            $result = str_replace([" "], "", $result);
            $this->setAlive(true);
            preg_match("/ยอดเงินในบัญชี\(บาท\)<\/td><tdwidth=\"40%\"align=\"right\"class=\"hd_th_blk11_bld\">(.*?)<\/td>/", $result, $balance);
            $this->currentBalance = (float)str_replace(",", "", $balance[1]);
            return true;
        }

    }

    public function getBalance()
    {
        $this->SESSIONEASY = Constant::item('SCB_INBOUND_SESSIONEASY');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "{$this->baseUrl}/online/easynet/page/acc/acc_bnk_bln.aspx");
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "SESSIONEASY={$this->SESSIONEASY}");
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        $result = curl_exec($ch);
        curl_close($ch);
        try {
            $result = iconv("TIS-620", "UTF-8", $result);
            $result = str_replace(["\r", "\t", "\n", " "], "", $result);
            preg_match("/ยอดเงินในบัญชี\(บาท\)<\/td><tdwidth=\"40%\"align=\"right\"class=\"hd_th_blk11_bld\">(.*?)<\/td>/", $result, $balance);
            $this->currentBalance = (float)str_replace(",", "", $balance[1]);
        } catch (Exception $exception) {
            $this->currentBalance = 'ERROR';
        }
    }

    public function transactions()
    {
        $this->SESSIONEASY = Constant::item('SCB_INBOUND_SESSIONEASY');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "{$this->baseUrl}/online/easynet/page/acc/acc_bnk_tst.aspx");
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "SESSIONEASY={$this->SESSIONEASY}");
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            if (preg_match("/Operation timed out/", $error)) {
                /*Log::info('Transaction timed out and trying again.');*/
                return $this->transactions();
            } else {
                $error = 'เข้าถึงหน้า Statement ไม่สำเร็จ';
                curl_close($ch);
                $this->errorHanding($error);
                $data = ['error' => $error];
                return $this->responseHanding('transactions', 'failed', 'ขออภัยค่ะ ระบบไม่สามารถทำรายการได้ในขณะนี้ อีกสักครู่ กรุณาลองใหม่ค่ะ', $data);
            }
        }
        try {
            $result1 = iconv("TIS-620", "UTF-8", $result);
        } catch (Exception $exception) {
            $data = ['currentBalance' => $this->currentBalance, 'transactions' => []];
            return $this->responseHanding('transactions', 'success', "อ่านทรานแซกชั่นสำเร็จ [$this->loggedInType]", $data);
        }

        if (preg_match("/err_post.aspx/", $result1)) {
            $data = ['currentBalance' => $this->currentBalance, 'transactions' => []];
            return $this->responseHanding('transactions', 'success', "อ่านทรานแซกชั่นสำเร็จ [$this->loggedInType]", $data);
        }

        /*$result2 = str_replace(array("\r", "\t", "\n", " "), "", $result1);
        if (preg_match("/><div><\/div><\/table>/", $result2)) {
            $error = 'ขออภัยค่ะ ระบบไม่สามารถทำรายการได้ในขณะนี้ อีกสักครู่ กรุณาลองใหม่ค่ะ';
            curl_close($ch);
            $this->errorHanding($error);
            $data = ['error' => $error];
            return $this->responseHanding('transactions', 'failed', 'เข้าถึงหน้า Statement ไม่สำเร็จ', $data);
        }*/

        $this->successHanding();
        $result = str_replace(array("\r", "\t", "\n"), "", $result1);
        file_put_contents('transaction.scb.log.html', $result1);
        preg_match("/<table cellspacing=\"0\" id=\"DataProcess_GridView\" style=\"width:100%;border-collapse:collapse;\">(.*?)<\\/table>/", $result, $temp);
        preg_match_all("/<tr( style=\"background\\-color:White;\")?>.*?\">(.*?)<\\/.*?\">(.*?)<\\/.*?\">(.*?)<\\/.*?\">(.*?)<\\/.*?\">(.*?)<\\/.*?\">(.*?)<\\/.*?\">(.*?)<\\/.*?<\\/tr>/", $temp[1], $temp);
        for ($i = 0; $i < count($temp[0]); $i++) {
            $data[$i]["unixDateTime"] = strtotime(str_replace("/", "-", $temp[2][$i]) . "T" . $temp[3][$i] . "");
            if (23 <= date("H", $data[$i]["unixDateTime"])) {
                $data[$i]["unixDateTime"] -= 24 * 3600;
            }
            if ($data[$i]["unixDateTime"] < strtotime("02-06-2019T00:00:00+0700")) {
                $data[$i]["channel"] = "";
                $data[$i]["value"] = (float)floatval(preg_replace("/[^0-9\\.\\+\\-]/", "", $temp[6][$i] == "&nbsp;" ? $temp[7][$i] : $temp[6][$i]));
            } else {
                $data[$i]["channel"] = $temp[5][$i] . " (" . $temp[4][$i] . ")";
                $data[$i]["value"] = (float)preg_replace("/[^0-9\\.\\+\\-]/", "", $temp[6][$i] == "&nbsp;" ? $temp[7][$i] : $temp[6][$i]);
            }
            $data[$i]['dateTime'] = date('Y-m-d H:i:s', $data[$i]["unixDateTime"]);
            $data[$i]["detail"] = $temp[8][$i];
            $data[$i]["tx_hash"] = $data[$i]["unixDateTime"] . $data[$i]["value"] . $data[$i]["channel"] . $data[$i]["detail"];
            $data[$i]["tx_hash"] = md5($data[$i]["tx_hash"]);
            try {
                preg_match("/[xX][0-9]{4,6}/", $data[$i]["detail"], $tempacc);
                $data[$i]["acc_num"] = str_replace(array("X", "x"), "", $tempacc[0]);
                if ($data[$i]["acc_num"] == "**********") {
                    $data[$i]["acc_num"] = "";
                }
            } catch (Exception $exception) {
                $data[$i]["acc_num"] = "";
            }
        }
        $transactions = [];
        if (isset($data[0])) {
            $transactions = $data;
        }
        /*Log::info("SCB LOGGED IN TYPE $this->loggedInType");*/
        $data = ['currentBalance' => $this->currentBalance, 'transactions' => $transactions];
        return $this->responseHanding('transactions', 'success', "อ่านทรานแซกชั่นสำเร็จ [$this->loggedInType]", $data);
    }

    private function setAlive($status)
    {
        Constant::set('SCB_INBOUND_ALIVE', $status);
    }

    private function getAlive()
    {
        if (Constant::item('SCB_INBOUND_ALIVE') == '1') {
            return true;
        } else {
            return false;
        }
    }

    public function cookieFailedHading()
    {
        if ($this->getAlive()) {
            $lineAPI = new LineAPIPlugin();
            $text = "❌ [SCB รับโอน] หลุดออกจากระบบ";
            $lineAPI->notify($text, 'log');
        }
        $this->setAlive(false);
    }

    public function errorHanding($error)
    {
        $lineAPI = new LineAPIPlugin();
        $text = "⚠️ [SCB รับโอน] $error";
        $lineAPI->notify($text, 'log');
        // $this->setAlive(false);
    }

    public function successHanding()
    {
        if (!$this->getAlive()) {
            $lineAPI = new LineAPIPlugin();
            $text = "✅ [SCB รับโอน] เชื่อมต่อระบบสำเร็จ";
            $lineAPI->notify($text, 'log');
        }
        $this->setAlive(true);
    }

    private function responseHanding($method, $status, $message, $response = [])
    {
        return [
            'method' => $this->className . "@" . $method,
            'status' => $status,
            'message' => $message,
            'response' => $response
        ];
    }
}