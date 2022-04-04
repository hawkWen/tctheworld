<?php
  require "twapi/tw.php";

  $phone    = "0990968605"; //เบอร์วอลเลต
  $password = "nngwhn486"; //รหัสผ่านวอลเลต
  $access_token = "@TOKEN" //ได้รับหลังจากยืนยัน OTP

  $tw = new TrueWallet($phone, $password);

 //print_r($tw->RequestLoginOTP());
  print_r($tw->SubmitLoginOTP('817414', $phone, 'WBDJ')); 
 // $data = $tw->GetProfile();
  /**echo '<pre>';
  print_r($data);
  echo '</pre>';  */
 //print_r($tw->RequestLoginOTP());
//  print_r($tw->SubmitLoginOTP('434160', $phone, 'QWXR'));  
  
  /*
  
  #STEP1
  print_r($tw->RequestLoginOTP());
  
  #STEP2
  print_r($tw->SubmitLoginOTP('986378', $phone, 'WXXJ'));  
  
  */
  
 // $tw->setAccessToken($access_token);
 // $data = $tw->GetTransaction();
  //print_r($data);
  
?>