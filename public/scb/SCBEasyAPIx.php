<?php

class SCBEasyAPI
{

    public $availableBalance = 0;
    private $apiUrl = 'https://fasteasy.scbeasy.com:8443';
    private $deviceId = '';
    private $refreshToken = '';
    private $accountNumber = '';

    public function setAccount($deviceId, $refreshToken, $accountNumber)
    {
        $this->deviceId = $deviceId;
        $this->refreshToken = $refreshToken;
        $this->accountNumber = $accountNumber;
    }

    public function login()
    {

        if (!$this->isLoggedIn()) {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "{$this->apiUrl}/v1/login/refresh");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);

            $headers = array();
            $headers[] = 'User-Agent: Android/11;FastEasy/3.35.0/3906';
            $headers[] = 'Accept-Language: th';
            $headers[] = 'Content-Type: application/json';
            $headers[] = "Api-Refresh: $this->refreshToken";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, '{"deviceId": "' . $this->deviceId . '"}');

            $result = json_decode(curl_exec($ch));
            $accessToken = $result->data->access_token;
            file_put_contents('aceessToken.txt', $accessToken);

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

        $accessToken = file_get_contents('aceessToken.txt');
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "{$this->apiUrl}/v2/deposits/casa/details");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        $headers = array();
        $headers[] = "Api-Auth: $accessToken";
        $headers[] = 'User-Agent: Android/11;FastEasy/3.35.0/3906';
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

        $accessToken = file_get_contents('aceessToken.txt');
        $today = date("Y-m-d", time());
        $yesterday = date("Y-m-d", time() - 60 * 60 * 24);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "{$this->apiUrl}/v2/deposits/casa/transactions");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);

        $headers = array();
        $headers[] = "Api-Auth: $accessToken";
        $headers[] = 'User-Agent: Android/11;FastEasy/3.35.0/3906';
        $headers[] = 'Accept-Language: th';
        $headers[] = 'Content-Type: application/json';
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
        $limitTime = 1;
        $page = 1;
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
                    $transactions[] = [
                        'dateTime' => date('Y-m-d H:i:s', strtotime($transaction->txnDateTime)),
                        'amount' => $transaction->txnAmount,
                        'txRemark' => $transaction->txnRemark,
                        'txHash' => md5($transaction->txnDateTime . $transaction->txnRemark),
                        'remark' => $this->remarkDescription($transaction->txnRemark),
                        'channel' => $transaction->txnChannel,
                        'type' => $transaction->txnCode
                    ];
                }
            } catch (\Exception $exception) {
                // Do nothing.
            }
            $i++;
        }
        return ['availableBalance' => $this->availableBalance, 'transactions' => $transactions];
    }

    public function transfer($bank, $transferTo, $amount)
    {

        $accessToken = file_get_contents('aceessToken.txt');
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fasteasy.scbeasy.com:8443/v2/transfer/verification');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $bankCode = $this->bankCode($bank);
        $transferType = $bank == 'SCBA' ? '3RD' : 'ORFT';
        $headers = array();
        $headers[] = "Api-Auth: $accessToken";
        $headers[] = 'User-Agent: Android/11;FastEasy/3.35.0/3906';
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
}
