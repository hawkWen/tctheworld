<?php 
//require 'config.php';
require_once("KBiz.class.php");
$username = 'tctheworld';
$password = '4Ko6my9013!';
$kbank = new KasikornBank($username, $password,"0","cookie.txt");

// Check if the session in the cookie is still valid. If not, then login again.
$login = $kbank->Login();
if ($login) {
$refreshSession = $kbank->Session_refresh();
$Account = $kbank->getBankAccount();

$AccountSummary = $kbank->getAccountSummary();

$acc = $Account["ownAccountList"]["0"];


header('Content-Type: application/json; charset=utf-8');

$Statement = $kbank->getTransactionList($acc["accountNo"],$acc["accountType"]);
echo '<pre>';
       print_r($Statement);
       echo '</pre>';



foreach ($Statement as $key => $value) {

    $Transaction = $kbank->getTransactionDetail($acc["accountNo"],$Statement["recentTransactionList"][$key]);
      echo '<pre>';
       print_r($Transaction);
       echo '</pre>';
   // code...
}

     






//$bankTransfer = $kbank->bankTransfer("014","4261064451","0.1",$acc["accountNo"],$acc["accountName"]);
//$bankTransferSubmitOTP = $kbank->bankTransferSubmitOTP($bankTransfer,"797055");


   //  
}
       // if ($login) {
    //     $Account = $kbank->getBankAccount();
    //     $AccountSummary = $kbank->getAccountSummary();
    //     $acc = $Account["ownAccountList"]["0"];
    //     $Statement = $kbank->getTransactionList($acc["accountNo"],$acc["accountType"]);
    //     $Transaction = $kbank->getTransactionDetail($acc["accountNo"],$Statement["recentTransactionList"][0]);
    //     $refreshSession = $kbank->Session_refresh();
    //     header('Content-Type: application/json; charset=utf-8');
    //     echo json_encode(array(
    //         "Login" => $login,
    //         "refreshSession" => $refreshSession,
    //         "Account" => $Account,
    //         "AccountSummary" => $AccountSummary,
    //         "Statement" => $Statement,
    //         "Transaction" => $Transaction
    //     ));

    //     //bank codes: https://th.wikipedia.org/wiki/รายชื่อธนาคารในประเทศไทย
    //     $bankTransfer = $kbank->bankTransfer("002","0000000000","100",$acc["accountNo"],$acc["accountName"]);
    //     $bankTransferSubmitOTP = $kbank->bankTransferSubmitOTP($bankTransfer,"000000");

    //     $promptpayIDTransfer = $kbank->promptpayIDTransfer("0000000000000","100",$acc["accountNo"],$acc["accountName"]);
    //     $promptpaySubmitOTP_A = $kbank->promptpaySubmitOTP($promptpayIDTransfer,"000000");

    //     $promptpayPhoneTransfer = $kbank->promptpayPhoneTransfer("0000000000","100",$acc["accountNo"],$acc["accountName"]);
    //     $promptpaySubmitOTP_B = $kbank->promptpaySubmitOTP($promptpayPhoneTransfer,"000000");
    // }
//function GetStatement ($account_number, $start_date = null, $end_date = null, $retry_login = true, $retry_token = true)
// Get Today's Statement.
//$kk = $kbank->GetTodayStatement("075-3-94018-9");function GetStatement


?>