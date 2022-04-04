<?php
define( 'BLOCK_LOAD', true );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
  require "getotp/readsms.php";
  require "twapi/Truewallet.php";
  require "system/conn.php";


$wpdb = new wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

  
  error_reporting(0);
  $sms = new ReadSMS($access_token);
  print_r($sms);
  $iden = $sms->DevicesList()["devices"][0]["iden"];
  $data = ($sms->GetTrueWalletOTP($iden));
  
  $ref = $data["ref"];
  $otp = $data["otp_code"];

  $tw = new TrueWalletClass("nnicha585@gmail.com", "attapong9665");//Login
  $result = $tw->SubmitLoginOTP($otp, "0990968605", $ref);

  if($result['data']['access_token'] != null){
    $access_token = $result['data']['access_token'];
  }else{
    $access_token = 0;
  }
  print_r($access_token);
  echo '<br>';
  $sql_access_token = $wpdb->get_results("select access_token from access_token where token_id = 1");
  print_r($sql_access_token[0]->access_token);
 
  
  if($access_token != $sql_access_token[0]->access_token && $access_token != 0){
   // $insert_access_token = "UPDATE access_token SET access_token= '".$access_token."' WHERE token_id=1";
    $wpdb->query( $wpdb->prepare("UPDATE access_token SET access_token= '".$access_token."' WHERE token_id=1") );
  }

  print_r($result);

?>
