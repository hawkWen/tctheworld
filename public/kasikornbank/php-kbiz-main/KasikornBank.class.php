<?php
    date_default_timezone_set('Asia/Bangkok');
    class KasikornBank {
        public $credentials = array();
        public $cookie_file = null;

        public $online_gateway = "https://online.kasikornbankgroup.com";
        public $ib_gateway = "https://ib.gateway.kasikornbank.com";
        
        public $curl_options = null;

        public function __construct ($username = null, $password = null, $userProfiles = 0, $cookie_path = null , $language = "en") {
            if (!is_null($username) && !is_null($password)) {
                $this->credentials["username"] = strval($username);
                $this->credentials["password"] = strval($password);
                $this->credentials["userProfiles"] = strval($userProfiles);
                $this->credentials["language"] = strval($language);
            }
            $this->cookie_file = $cookie_path;
        }

        public function ExportCredentials(){
            return json_encode($this->credentials);
        }

        public function ImportCredentials($credentials = array()){
            $this->credentials = json_decode($credentials);
        }

        public function request($method, $endpoint, $headers = array(), $data = null) {
            $handle = curl_init();
            if (!is_null($data)) {
                curl_setopt($handle, CURLOPT_POSTFIELDS, is_array($data) ? json_encode($data) : $data);
                if (is_array($data)) $headers = array_merge(array("Content-Type" => "application/json"), $headers);
            }
            curl_setopt_array($handle, array(
                CURLOPT_URL => $endpoint,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => true,
                CURLOPT_USERAGENT => "okhttp/3.12.0",
                CURLOPT_COOKIEFILE => $this->cookie_file,
                CURLOPT_COOKIEJAR => $this->$cookie_file,
                CURLOPT_HTTPHEADER => $this->buildHeaders($headers)
            ));
            if (is_array($this->curl_options)) curl_setopt_array($handle, $this->curl_options);
            $response = curl_exec($handle);
            $http_code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            $header_size = curl_getinfo($handle, CURLINFO_HEADER_SIZE);
            $res_header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);
            $res_headers = [];
            foreach(explode("\r\n", trim($res_header)) as $row) {
                if(preg_match('/(.*?): (.*)/', $row, $matches)) {
                    $res_headers[$matches[1]] = $matches[2];
                }
            }
            if ($result = json_decode($body, true)) {
                return array("code" => $http_code, "header" => $res_headers,"body" => $result);;
            }
            return array("code" => $http_code, "header" => $res_headers,"body" => $body);
        }

        public function buildHeaders ($array) {
            $headers = array();
            foreach ($array as $key => $value) {
                $headers[] = $key.": ".$value;
            }
            return $headers;
        }

        public function Login () {
            $login_res = $this->request("POST", $this->online_gateway."/kbiz/login.do" ,array(
                "Content-Type" => "application/x-www-form-urlencoded"
            ), http_build_query(array(
                "userName" => $this->credentials["username"],
                "password" => $this->credentials["password"],
                "tokenId" => "0",
                "cmd" => "authenticate",
                "locale" => $this->credentials["language"],
                "custType" => "",
                "captcha" => "",
                "app" => "0"
            )));
            if (preg_match('/window\.top\.location\.href = "(.*)";/', $login_res["body"], $matches)) {
                $url_dataRsso = $matches[1];
                $dataRsso = explode("dataRsso=",$url_dataRsso)[1];
                $this->request("GET", $url_dataRsso);
                return $this->Session($dataRsso);
            }
            return false;
        }

        public function Session($dataRsso) {
            $res_vs = $this->request("POST", $this->ib_gateway."/api/authentication/validateSession",array(
                "Content-Type" => "application/json",
                "Accept" => "application/json, text/plain, */*"
            ), array(
                "dataRsso" => $dataRsso,
            ));
            $this->credentials["token"] = $res_vs["header"]["X-SESSION-TOKEN"];
            $profile = $res_vs["body"]["data"]["userProfiles"][$this->credentials["userProfiles"]];
            $this->credentials["ownerId"] = $profile["ibId"];
            $this->credentials["ownerType"] = $profile["roleList"]["0"]["roleName"];
            return $res_vs;
        }

        public function Session_refresh() {
            $res_rs = $this->request("POST", $this->ib_gateway."/gateway/refreshSession",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"],
                "X-RE-FRESH" => "Y",
                "X-URL" => "",
                "X-REQUEST-ID" => ""
            ), "{}");
            $this->credentials["token"] = $res_rs["header"]["X-SESSION-TOKEN"]; 
            return $res_rs;
        }

        public function getBankAccount ($checkBalance = "N",$accType = "CA,SA,FD",$nicknameType = "OWNAC") {
            $res_acc = $this->request("POST", $this->ib_gateway."/api/bankaccountget/getOwnBankAccountFromList",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"]
            ), array(
                "accountType" => $accType,
                "checkBalance" => $checkBalance,
                "custType" => "I",
                "language" => $this->credentials["language"],
                "nicknameType" => $nicknameType,
                "ownerId" => $this->credentials["ownerId"],
                "ownerType" => $this->credentials["ownerType"]
            ));
            return $res_acc["body"]["data"];
        }

        public function getAccountSummary () {
            $res_asy = $this->request("POST", $this->ib_gateway."/api/accountsummary/getAccountSummaryList",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"]
            ), array(
                "custType" => "I",
                "isReload" => "N",
                "lang" => $this->credentials["language"],
                "nicknameType" => "OWNAC",
                "ownerId" => $this->credentials["ownerId"],
                "ownerType" => $this->credentials["ownerType"],
                "pageAmount" => "6"
            ));
            return $res_asy["body"]["data"];
        }
        public function getTransactionList ($account_no = null,$account_type = "SA",$start_date = null,$end_date = null,$pageNo = 1,$rowPerPage = 7) {
            if (is_null($start_date) && is_null($end_date)) $start_date = "01/".date('m/Y');
		    if (is_null($end_date)) $end_date = date('d/m/Y');
            $res_tr = $this->request("POST", $this->ib_gateway."/api/accountsummary/getRecentTransactionList",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"]
            ), array(
                "acctNo" => $account_no,
                "acctType" => $account_type,
                "custType" => "I",
                "ownerType" => $this->credentials["ownerType"],
                "ownerId" => $this->credentials["ownerId"], 
                "pageNo" => $pageNo,
                "rowPerPage" => $rowPerPage,
                "refKey" => "",
                "startDate" => $start_date,
                "endDate" => $end_date
            ));
            return $res_tr["body"]["data"];
        }

        public function getTransactionDetail ($account_no = null,$transaction = null) {
            $res_tr = $this->request("POST", $this->ib_gateway."/api/accountsummary/getRecentTransactionDetail",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"]
            ), array(
                "acctNo" => $account_no,
                "custType" => $transaction["custType"] ?? 'I',
                "debitCreditIndicator" => $transaction["debitCreditIndicator"],
                "origRqUid" => $transaction["origRqUid"],
                "originalSourceId" => $transaction["originalSourceId"],
                "ownerType" => $this->credentials["ownerType"],
                "ownerId" => $this->credentials["ownerId"], 
                "transCode" => $transaction["transCode"],
                "transDate" => explode(" ",$transaction["transDate"])[0],
                "transType" => $transaction["transType"],
            ));
            return $res_tr["body"]["data"];
        }

        public function promptpayTransfer ($transfer_type,$number,$amount,$accountNo,$accountName) {
            $res_ppt = $this->request("POST", $this->ib_gateway."/api/fundtransferPromptpayindividual/inquiryFundTransferPromptpay",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"]
            ), array(
                "amount" => $amount,
                "anyType" => $transfer_type,
                "anyValue" => $number,
                "bulk" => "N",
                "custType" => "I",
                "effectiveDate" => "",
                "favFlag" => "N",
                "feeAmount" => "0.00",
                "fromAccountName" => $accountName,
                "fromAccountNo" => $accountNo,
                "lang" => "th",
                "memo" => "",
                "memoTypeId" => "26",
                "notiEmailNote" => "",
                "ownerId" => $this->credentials["ownerId"],
                "ownerType" => $this->credentials["ownerType"],
                "scheduleFlag" => "N",
                "smsLang" => "th",
                "totalAmount" => $amount,
                "transType" => "FTPP",
                "transferType" => "Online",

            ));
            $this->credentials["token"] = $res_ppt["header"]["X-SESSION-TOKEN"]; 
            return $res_ppt["body"]["data"];
        }

        public function promptpayPhoneTransfer($number,$amount,$accountNo,$accountName){
            return $this->promptpayTransfer("02",$number,$amount,$accountNo,$accountName);
        }

        public function promptpayIDTransfer(){
            return $this->promptpayTransfer("01",$number,$amount,$accountNo,$accountName);
        }

        public function bankTransferOrft ($bankCode,$id,$amount,$accountNo,$accountName) {
            $res_bt = $this->request("POST", $this->ib_gateway."/api/fundtransferOrftindividual/inquiryFundTransferOrft",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"]
            ), array(
                "amount" => $amount,
                "bankCode" => $bankCode,
                "beneficiaryNo" => $id,
                "bulk" => "N",
                "custType" => "I",
                "effectiveDate" => "",
                "favFlag" => "N",
                "feeAmount" => "0.00",
                "fromAccountName" => $accountName,
                "fromAccountNo" => $accountNo,
                "lang" => "th",
                "memo" => "",
                "memoTypeId" => "26",
                "notiEmailNote" => "",
                "ownerId" => $this->credentials["ownerId"],
                "ownerType" => $this->credentials["ownerType"],
                "scheduleFlag" => "N",
                "smsLang" => "th",
                "totalAmount" => $amount,
                "transType" => "FTOB",
                "transferType" => "Online"

            ));
            $this->credentials["token"] = $res_bt["header"]["X-SESSION-TOKEN"]; 
            return $res_bt["body"]["data"];
        }

        public function bankTransferOther ($bankCode,$id,$amount,$accountNo,$accountName) {
            $res_bt = $this->request("POST", $this->ib_gateway."/api/fundtransferOtherindividual/inquiryFundTransferOther",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"]
            ), array(
                "amount" => $amount,
                "bankCode" => $bankCode,
                "beneficiaryNo" => $id,
                "bulk" => "N",
                "custType" => "I",
                "effectiveDate" => "",
                "favFlag" => "N",
                "feeAmount" => "0.00",
                "fromAccountName" => $accountName,
                "fromAccountNo" => $accountNo,
                "lang" => "th",
                "memo" => "",
                "memoTypeId" => "26",
                "notiEmailNote" => "",
                "ownerId" => $this->credentials["ownerId"],
                "ownerType" => $this->credentials["ownerType"],
                "scheduleFlag" => "N",
                "smsLang" => "th",
                "totalAmount" => $amount,
                "transType" => "FTOT",
                "transferType" => "Online"

            ));
            $this->credentials["token"] = $res_bt["header"]["X-SESSION-TOKEN"]; 
            return $res_bt["body"]["data"];
        }

        public function bankTransferSubmitOTP ($transferData,$otp) {
            $res_bts = $this->request("POST", $this->ib_gateway."/api/fundtransferOrftindividual/confirmFundTransferOrft",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"]
            ), array(
                "actionAttachFile" => "DEFAULT",
                "amount" => $transferData["amount"],
                "bankCode" => $transferData["bankCode"],
                "beneficiaryName" => $transferData["beneficiaryName"],
                "beneficiaryNo" => $transferData["beneficiaryNo"],
                // "beneficiaryNo" => $transferData["anyValue"],
                "bulk" => $transferData["bulk"],
                "custType" => $transferData["custType"] ?? 'I',
                // "effectiveDate" => $transferData["effectiveDate"],
                "effectiveDate" => "",
                "feeAmount" => $transferData["feeAmount"],
                "fromAccountName" => $transferData["fromAccountName"],
                "fromAccountNo" => $transferData["fromAccountNo"],
                "lang" => $transferData["lang"],
                "memo" => $transferData["memo"],
                "memoTypeId" => $transferData["memoTypeId"],
                "otp" => $otp,
                "ownerId" => $this->credentials["ownerId"],
                "ownerType" => $this->credentials["ownerType"],
                "pac" => $transferData["pac"],
                "reqRefNo" => $transferData["reqRefNo"],
                "rqUID" => $transferData["rqUID"],
                "scheduleFlag" => $transferData["scheduleFlag"],
                "tokenUUID" => $transferData["tokenUUID"],
                "totalAmount" => $transferData["totalAmount"],
                "transType" => $transferData["transType"],
                "transferType" => $transferData["transferType"],
            ));
            return $res_bts["body"]["data"];
        }
        public function promptpaySubmitOTP ($transferData,$otp) {
            $res_pps = $this->request("POST", $this->ib_gateway."/api/fundtransferPromptpayindividual/confirmFundTransferPromptpay",array(
                "Content-Type" => "application/json",
                "X-IB-ID" =>  $this->credentials["ownerId"],
                "Authorization" => $this->credentials["token"]
            ), array(
                "actionAttachFile"=> "DEFAULT",
                "amount" => $transferData["amount"],
                "anyType" => $transferData["anyType"],
                "anyValue" => $transferData["anyValue"],
                "beneficiaryName" => $transferData["beneficiaryName"],
                "beneficiaryNo" => $transferData["beneficiaryNo"],
                // "beneficiaryNo" => $transferData["anyValue"],
                "bulk" => $transferData["bulk"],
                "custType" => $transferData["custType"] ?? 'I',
                // "effectiveDate" => $transferData["effectiveDate"],
                "effectiveDate"=> "",
                "feeAmount" => $transferData["feeAmount"],
                "fromAccountName" => $transferData["fromAccountName"],
                "fromAccountNo" => $transferData["fromAccountNo"],
                "lang" => $transferData["lang"],
                "memo" => $transferData["memo"],
                "memoTypeId" => $transferData["memoTypeId"],
                "otp"=> $otp,
                "ownerId" => $this->credentials["ownerId"],
                "ownerType" => $this->credentials["ownerType"],
                "pac" => $transferData["pac"],
                "reqRefNo" => $transferData["reqRefNo"],
                "rqUID" => $transferData["rqUID"],
                "scheduleFlag" => $transferData["scheduleFlag"],
                "tokenUUID" => $transferData["tokenUUID"],
                "totalAmount" => $transferData["totalAmount"],
                "transType" => $transferData["transType"],
                "transferType" => $transferData["transferType"],
            ));
            return $res_pps["body"]["data"];
        }
    }