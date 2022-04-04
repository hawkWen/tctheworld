<?php 
define( 'BLOCK_LOAD', true );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
require_once("KasikornBank.class.php");
$username = 'moradok88';
$password = 'moradok99';
$kbank = new KasikornBank($username, $password);

// Check if the session in the cookie is still valid. If not, then login again.
if (!$kbank->CheckSession()) {
	$kbank->Login();
}
//function GetStatement ($account_number, $start_date = null, $end_date = null, $retry_login = true, $retry_token = true)
// Get Today's Statement.
//$kk = $kbank->GetTodayStatement("075-3-94018-9");function GetStatement
date_default_timezone_set("Asia/Bangkok");
echo date("Y-m-d H:i:s").'<br>';
$bb = $kbank->GetBalance("075-3-94018-9");
print_r($bb);
$kk = $kbank->GetTodayStatement("075-3-94018-9");
echo '<pre>';
print_r($kk);
echo '</pre>';
    /*[Date/Time] =&gt; 16/11/20 01:50:03
    [Channel] =&gt; Moblie
    [Transaction Type] =&gt; Cheque/Money Transfer NB
    [Withdrawal (THB)] =&gt; 
    [Deposit (THB)] =&gt; 1.00
    [A/C Number] =&gt; xxx-2-65674-x
    [Details] =&gt; K PLUS

print_r($kk[0]['Date/Time']);
echo '<pre>';
print_r($kk);
echo '</pre>';
    $line_api = 'https://notify-api.line.me/api/notify';
    $access_token = 'UUFSVSYMuFpimwWvRFoV5e5fej0UMuSgVHcG2PO4us6';
    $kbank_trans_data = array();
    $moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';

    $kbank_db_api = 'http://play.moradok88.com/sximoapi?module=kbanktrans';
    $kbank_db_api_today = 'http://play.moradok88.com/sximoapi?module=todaydata';
    $deposit_api = 'http://play.moradok88.com/sximoapi?module=deposit';*/
   // $slip = $_POST['slip'];



   // $message = "\n\n".'มีลูกค้าโอนมา '.$kk[0]['Date/Time']."\n\n".'ช่องทาง : '.$kk[0]['Channel']." - ".$kk[0]['Details']."\n\n".' เลขบัญชี : '.$kk[0]['A/C Number']."\n\n".' ยอดเงิน : '.$kk[0]['Deposit (THB)'];    //text max 1,000 charecter
 

   // $message_data = array(
   // 	'message' => $message
   // );

    //$result = send_notify_message($line_api, $access_token, $message_data);

    //print_r($result);
/*-------------line noti----------------------*/
function send_kbank_db_api($kbank_db_api,$moradok_access_token, $kbank_trans_data){
   $headers = array('Method: POST', 'Content-type: application/json', 'Authorization: Basic '.$moradok_access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $kbank_db_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $kbank_trans_data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);

   // Check Error
   if(curl_error($ch))
   {
      $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) );
   }
   else
   {
      $return_array = json_decode($result, true);
   }
   curl_close($ch);
   return $return_array;
}

function get_kbank_db_api($kbank_db_api_today,$moradok_access_token){
   $headers = array('Method: GET', 'Authorization: Basic '.$moradok_access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $kbank_db_api_today);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);

   // Check Error
   if(curl_error($ch))
   {
      $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) );
   }
   else
   {
      $return_array = json_decode($result, true);
   }
   curl_close($ch);
   return $return_array;
}


function send_notify_message($line_api, $access_token, $message_data){
   $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $line_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   // Check Error
   if(curl_error($ch))
   {
      $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) );
   }
   else
   {
      $return_array = json_decode($result, true);
   }
   curl_close($ch);
   return $return_array;
}




?>