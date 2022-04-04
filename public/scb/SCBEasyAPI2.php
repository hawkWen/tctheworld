<?php
date_default_timezone_set("Asia/Bangkok");

class SCBEasyAPI
{

    public $availableBalance = 0;
    private $apiUrl = 'https://fasteasy.scbeasy.com:8443';
    private $deviceId = '';
    private $refreshToken = '';
    private $accountNumber = '';
    private $fileToken = '';


    public function setAccount($deviceId, $refreshToken, $accountNumber)
    {
        $this->deviceId = $deviceId;
        $this->refreshToken = $refreshToken;
        $this->accountNumber = $accountNumber;
        $this->fileToken = "scb-access-token-" . $accountNumber . ".txt";
    }

    public function login()
    {

        if (!$this->isLoggedIn()) {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "{$this->apiUrl}/v1/login/refresh");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);

            $headers = array();
            // $headers[] = 'User-Agent: Android/11;FastEasy/3.35.0/3906';
            //$headers[] = 'User-Agent: Android/10;FastEasy/3.38.0/4219';
            $headers[] = 'User-Agent: Android/10;FastEasy/3.48.0/4926';
            $headers[] = 'Accept-Language: th';
            $headers[] = 'Content-Type: application/json';
            $headers[] = "Api-Refresh: $this->refreshToken";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, '{"deviceId": "' . $this->deviceId . '"}');

            $result = json_decode(curl_exec($ch));
            $accessToken = $result->data->access_token;
            file_put_contents($this->fileToken, $accessToken);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            if ($result->status->code == 1000) {
                $this->isLoggedIn();
                return true;
            } else {
                return false;
            }
        }

        return true;
    }

    public function isLoggedIn()
    {

        // $accessToken = file_get_contents("scb-access-token.txt");
        $accessToken = file_get_contents($this->fileToken);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "{$this->apiUrl}/v2/deposits/casa/details");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        $headers = array();
        $headers[] = "Api-Auth: $accessToken";
        // $headers[] = 'User-Agent: Android/11;FastEasy/3.35.0/3906';
     //   $headers[] = 'User-Agent: Android/10;FastEasy/3.38.0/4219';
        $headers[] = 'User-Agent: Android/10;FastEasy/3.48.0/4926';
        $headers[] = 'Accept-Language: th';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"accountNo": "' . $this->accountNumber . '"}');

        $result = json_decode(curl_exec($ch));
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($result->status->code == 1000) {
            $this->availableBalance = $result->availableBalance;
            return true;
        } else {
            return false;
        }
    }

    public function transactionPage($page = 1)
    {

        // $accessToken = file_get_contents("scb-access-token.txt");
        $accessToken = file_get_contents($this->fileToken);
        $today = date("Y-m-d", time());
        // $yesterday = date("Y-m-d", time() - 60 * 60 * 24);
        $yesterday  = date("Y-m-d", strtotime(date("Y-m-d") . "-2 days"));
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "{$this->apiUrl}/v2/deposits/casa/transactions");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);

        $headers = array();
        $headers[] = "Api-Auth: $accessToken";
      //  $headers[] = 'User-Agent: Android/10;FastEasy/3.38.0/4219';
        $headers[] = 'User-Agent: Android/10;FastEasy/3.48.0/4926';
        $headers[] = 'Accept-Language: th';
        $headers[] = 'Content-Type: application/json; charset=UTF-8';
        // $headers[] = 'Content-Type: application/json';
        $headers[] = 'scb-channel: APP';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"accountNo": "' . $this->accountNumber . '","endDate": "' . $today . '","pageNumber": "' . $page . '","pageSize": 50,"productType": "2","startDate": "' . $yesterday . '"}');

        $result = json_decode(curl_exec($ch));
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    public function transactions()
    {
        $transactions = [];
        $i = 0;
        $limitTime = 3;  // 150 trxs.
        $page = 1;
        $minutes = 60;
        while ($page != null || $page != '') {
            if ($i == $limitTime) {
                break;
            }
            try {
                $result = $this->transactionPage($page);
                if ($result->status->code != 1000) {
                    return $result;
                }
                $page = $result->data->nextPageNumber;
                foreach ($result->data->txnList as $transaction) {
                    $dateTime = date_create(date('Y-m-d H:i:s', strtotime($transaction->txnDateTime)));
                    $dateTimeNow = date_create(date('Y-m-d H:i:s'));

                    if ($dateTime->diff($dateTimeNow)->format('%h') > 6) {
                        $dateTime = date_create(date("Y-m-d H:i:s", strtotime($transaction->txnDateTime . "-1 days")))->format('Y-m-d H:i:s');
                        // $dateTime = date('Y-m-d') . ' ' . $dateTime->format('H:i:s');
                    } else {
                        $dateTime = date('Y-m-d H:i:s', strtotime($transaction->txnDateTime));
                    }

                    // $dateTimeCheck = new DateTime($dateTime);
                    // $dateTime = date_create(date("Y-m-d H:i:s", strtotime($dateTime . "-" . $minutes . " minutes")));

                    $transactions[] = [
                        'dateTime' => $dateTime,
                        'amount' => $transaction->txnAmount,
                        'txRemark' => $transaction->txnRemark,
                        'txHash' => md5($transaction->txnDateTime . $transaction->txnRemark),
                        'remark' => $this->remarkDescription($transaction->txnRemark),
                        'detail' => $transaction->txnRemark,
                        'channel' => $transaction->txnChannel,
                        'type' => $transaction->txnCode,
                        'nextPageNumber' => $page
                    ];
                }
            } catch (\Exception $exception) {
                // Do nothing.
            }
            $i++;
        }

        $dt = array();
        $dt = array_column($transactions, 'dateTime');
        array_multisort($dt, SORT_DESC, $transactions);

        return ['availableBalance' => $this->availableBalance, 'transactions' => $transactions];
    }

    public function verifyAccount($bank, $accountNumber)
    {
        // $accessToken = file_get_contents("scb-access-token.txt");
        $accessToken = file_get_contents($this->fileToken);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fasteasy.scbeasy.com:8443/v2/transfer/verification');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        if (is_numeric($bank)) {
            $bankCode = $bank;
        } else {
            $bankCode = $this->bankCode($bank);
        }
        $transferType = ($bank == 'SCBA') ? '3RD' : (($bank == '014') ? '3RD' : 'ORFT');
        $headers = array();
        $headers[] = "Api-Auth: $accessToken";
        //$headers[] = 'User-Agent: Android/10;FastEasy/3.38.0/4219';
        $headers[] = 'User-Agent: Android/10;FastEasy/3.48.0/4926';
        $headers[] = 'Accept-Language: th';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"accountFrom": "' . $this->accountNumber . '","accountFromType": "2","accountTo": "' . $accountNumber . '","accountToBankCode": "' . $bankCode . '","amount": "1","annotation": null,"transferType": "' . $transferType . '"}');

        $result = json_decode(curl_exec($ch));

        if ($result->status->code != 1000 && $result->status->code != 9003) {
            curl_close($ch);
            return json_encode(['code' => 404, 'desc' => 'ไม่พบบัญชี']);
        }

        $accountToName = $result->data->accountToName;
        $transferType = $result->data->transferType;
        $accountToName = str_replace('  ', ' ', $accountToName);

        $arrName = explode(' ', $accountToName);
        $prefix = '';
        $firstName = '';
        $lastName = '';
        if (sizeof($arrName) < 3) {
            $firstName = $this->getName($accountToName);
            $lastName = $arrName[1];
        } else {
            $prefix = $arrName[0];
            $firstName = $arrName[1];
            $lastName = $arrName[2];
        }

        curl_close($ch);
        return json_encode(['code' => 0, 'prefix' => $prefix, 'firstName' => $firstName, 'lastName' => $lastName, 'fullName' => $accountToName]);
    }

    public function transfer($bank, $transferTo, $amount)//, $fname, $lname
    {
        // $accessToken = file_get_contents("scb-access-token.txt");
        $accessToken = file_get_contents($this->fileToken);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fasteasy.scbeasy.com:8443/v2/transfer/verification');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        if (is_numeric($bank)) {
            $bankCode = $bank;
        } else {
            $bankCode = $this->bankCode($bank);
        }
        $transferType = ($bank == 'SCBA') ? '3RD' : (($bank == '014') ? '3RD' : 'ORFT');
        $headers = array();
        $headers[] = "Api-Auth: $accessToken";
       // $headers[] = 'User-Agent: Android/10;FastEasy/3.38.0/4219';
        $headers[] = 'User-Agent: Android/10;FastEasy/3.48.0/4926';
        $headers[] = 'Accept-Language: th';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"accountFrom": "' . $this->accountNumber . '","accountFromType": "2","accountTo": "' . $transferTo . '","accountToBankCode": "' . $bankCode . '","amount": "' . $amount . '","annotation": null,"transferType": "' . $transferType . '"}');

        $result = json_decode(curl_exec($ch));

        if ($result->status->code != 1000 && $result->status->code != 9003) {
            return $result;
        }

        $accountFromName = $result->data->accountFromName;
        $accountTo = $result->data->accountTo;
        $accountToBankCode = $result->data->accountToBankCode;
        $accountToName = $result->data->accountToName;
        $transactionToken = $result->data->transactionToken;
        $terminalNo = $result->data->terminalNo;
        $sequence = $result->data->sequence;
        $transferType = $result->data->transferType;
        $pccTraceNo = $result->data->pccTraceNo;
        $feeType = $result->data->feeType;

        // $firstName = explode(' ', $accountToName)[1];
        // $lastName = explode(' ', $accountToName)[2];

        /*if (strpos($accountToName, $fname) === false || strpos($accountToName, $lname) === false) {
            // if ($fname !== $firstName || $lname !== $lastName) {
            $arr['status']['code'] = 404;
            $arr['status']['sysName'] = $fname . ' ' . $lname;
            $arr['status']['scbName'] = $accountToName;
            $arr['status']['description'] = 'ชื่อบัญชีปลายทางไม่ตรงกับระบบ';
            return $arr;
            exit();
        }*/

        $confirmData = [
            'accountFromName' => $accountFromName,
            'accountFromType' => '2',
            'accountTo' => $accountTo,
            'accountToBankCode' => $accountToBankCode,
            'accountToName' => $accountToName,
            'amount' => $amount,
            'botFee' => 0.0,
            'channelFee' => 0.0,
            'fee' => 0.0,
            'feeType' => $feeType,
            'pccTraceNo' => $pccTraceNo,
            'scbFee' => 0.0,
            'sequence' => $sequence,
            'terminalNo' => $terminalNo,
            'transactionToken' => $transactionToken,
            'transferType' => $transferType
        ];

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_setopt($ch, CURLOPT_URL, 'https://fasteasy.scbeasy.com:8443/v3/transfer/confirmation');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($confirmData));

        $result = json_decode(curl_exec($ch));

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }

    /*private function bankCode($bank)
    {
        $bankCode = [
            'SCB' => '014',
            'BBL' => '002',
            'KBANK' => '004',
            'KTB' => '006',
            'BAAC' => '034', // ธกส.
            'TMB' => '011',
            'TTB' => '011',
            'ICBC' => '070',
            'BAY' => '025',
            'CIMBT' => '022',
            'CIMB' => '022',
            'TBANK' => '065',
            'GSB' => '030',
            'LH' => '073',
            'LHBA' => '073',
            'UOBT' => '024',
            'GHB' => '033'
        ];
        return $bankCode[$bank];
    }*/

    private function bankCode($bank)
    {
        $bankCode = [
            'SCBA' => '014', 'BBLA' => '002', 'KBNK' => '004', 'KTBA' => '006', 'BAAC' => '034', 'TTBK' => '011',
            'ICBC' => '070', 'BAYA' => '025', 'CIMB' => '022', 'TBNK' => '065', 'GSBA' => '030', 'UOBT' => '024', 
            'TCDA' => '071', 'SMEA' => '098', 'GHBA' => '033', 'ISBT' => '066', 'UOBT' => '024', 'LHFG' => '073' , 
            'EXIM' => '035', 'KKPA' => '069'
        ];
        return $bankCode[$bank];
    }

    private function remarkDescription($text)
    {
        if (preg_match('/\((.*?)\) \/X(.*)/', $text)) {
            preg_match('/\((.*?)\) \/X(.*)/', $text, $temp);
            return [
                'bank' => $temp[1],
                'number' => str_replace(" ", "", $temp[2]),
                'name' => ''
            ];
        } else if (preg_match('/ (.*?) x(.*?) (.*)/', $text)) {
            preg_match('/ (.*?) x(.*?) (.*)/', $text, $temp);
            return [
                'bank' => $temp[1],
                'number' => str_replace(" ", "", $temp[2]),
                'name' => $temp[3]
            ];
        } else {
            return [
                'bank' => '',
                'number' => '',
                'name' => ''
            ];
        }
    }

    private function getName($name)
    {
        $titles = [
            'น.ส.',
            'นางสาว',
            'นาง',
            'นาย',
            'นพ.',
            'พญ.',
            'พล.อ.',
            'พล.ท.',
            'พล.ต.',
            'พ.อ.',
            'พ.ท.',
            'พ.ต.',
            'ร.อ.',
            'ร.ท.',
            'ร.ต.',
            'จ.ส.อ.',
            'จ.ส.ท.',
            'จ.ส.ต.',
            'ส.อ.',
            'ส.ท.',
            'ส.ต.',
            'พลฯ',
            'นนร.',
            'พล.ร.อ.',
            'พล.ร.ท.',
            'พล.ร.ต.',
            'พ.จ.อ.',
            'พ.จ.ท.',
            'พ.จ.ต.',
            'จ.อ.',
            'จ.ท.',
            'จ.ต.',
            'พลฯ',
            'นนร.',
            'พล.อ.อ.',
            'พล.อ.ท.',
            'พล.อ.ต.',
            'น.อ.',
            'น.ท.',
            'น.ต.',
            'ร.อ.',
            'ร.ท.',
            'ร.ต.',
            'พ.อ.อ.',
            'พ.อ.ท.',
            'พ.อ.ต.',
            'จ.อ.',
            'จ.ท.',
            'จ.ต.',
            'พลฯ',
            'นนอ.',
            'นจอ.',
            'พล.ต.อ.',
            'พล.ต.ท.',
            'พล.ต.ต.',
            'พ.ต.อ.',
            'พ.ต.ท.',
            'พ.ต.ต.',
            'ร.ต.อ.',
            'ร.ต.ท.',
            'ร.ต.ต.',
            'ด.ต.',
            'จ.ส.ต.',
            'ส.ต.อ.',
            'ส.ต.ท.',
            'ส.ต.ต.',
        ];

        $results = [];

        $temp = str_replace($titles, '<> ', $name);
        $temp = mb_ereg_replace('/\s+/', '\s', $temp);
        $temp = array_values(array_filter(explode(' ', $temp)));

        if ($temp[0] == '<>') {
            $results['title'] = substr($name, 0, strpos($name, $temp[1]));
        } else {
            $results['title'] = '';
            array_unshift($temp, '');
        }

        $results['firstname'] = $temp[1];
        if (count($temp) == 4) {
            $results['middlename'] = $temp[2];
            $results['lastname'] = $temp[3];
        } else {
            unset($temp[0], $temp[1]);
            $results['middlename'] = '';
            $results['lastname'] = implode(' ', $temp);
        }

        if (strpos(explode(' ', $name)[0], 'นายนาย') !== false) {
            $name = explode(' ', $name)[0];
            $results['firstname'] = substr($name, 9, strlen($name) - 9);
        }

        return $results['firstname'];
    }

    private function getFullName($name)
    {
        $titles = [
            'น.ส.',
            'นางสาว',
            'นาง',
            'นาย',
            'นพ.',
            'พญ.',
            'พล.อ.',
            'พล.ท.',
            'พล.ต.',
            'พ.อ.',
            'พ.ท.',
            'พ.ต.',
            'ร.อ.',
            'ร.ท.',
            'ร.ต.',
            'จ.ส.อ.',
            'จ.ส.ท.',
            'จ.ส.ต.',
            'ส.อ.',
            'ส.ท.',
            'ส.ต.',
            'พลฯ',
            'นนร.',
            'พล.ร.อ.',
            'พล.ร.ท.',
            'พล.ร.ต.',
            'พ.จ.อ.',
            'พ.จ.ท.',
            'พ.จ.ต.',
            'จ.อ.',
            'จ.ท.',
            'จ.ต.',
            'พลฯ',
            'นนร.',
            'พล.อ.อ.',
            'พล.อ.ท.',
            'พล.อ.ต.',
            'น.อ.',
            'น.ท.',
            'น.ต.',
            'ร.อ.',
            'ร.ท.',
            'ร.ต.',
            'พ.อ.อ.',
            'พ.อ.ท.',
            'พ.อ.ต.',
            'จ.อ.',
            'จ.ท.',
            'จ.ต.',
            'พลฯ',
            'นนอ.',
            'นจอ.',
            'พล.ต.อ.',
            'พล.ต.ท.',
            'พล.ต.ต.',
            'พ.ต.อ.',
            'พ.ต.ท.',
            'พ.ต.ต.',
            'ร.ต.อ.',
            'ร.ต.ท.',
            'ร.ต.ต.',
            'ด.ต.',
            'จ.ส.ต.',
            'ส.ต.อ.',
            'ส.ต.ท.',
            'ส.ต.ต.',
        ];

        $results = [];

        $temp = str_replace($titles, '<> ', $name);
        $temp = mb_ereg_replace('/\s+/', '\s', $temp);
        $temp = array_values(array_filter(explode(' ', $temp)));

        if ($temp[0] == '<>') {
            $results['title'] = substr($name, 0, strpos($name, $temp[1]));
        } else {
            $results['title'] = '';
            array_unshift($temp, '');
        }

        $results['firstname'] = $temp[1];
        if (count($temp) == 4) {
            $results['middlename'] = $temp[2];
            $results['lastname'] = $temp[3];
        } else {
            unset($temp[0], $temp[1]);
            $results['middlename'] = '';
            $results['lastname'] = implode(' ', $temp);
        }

        if (strpos(explode(' ', $name)[0], 'นายนาย') !== false) {
            $name = explode(' ', $name)[0];
            $results['firstname'] = substr($name, 9, strlen($name) - 9);
        }

        return $results['firstname'];
    }
}
