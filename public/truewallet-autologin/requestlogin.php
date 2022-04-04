<?php
  require "twapi/Truewallet.php";
  
  $tw = new TrueWalletClass("nnicha585@gmail.com", "attapong9665");//Login
  
  $test = $tw->RequestLoginOTP();//เป็นฟังชั่นขอ otp
  print_r($test);
 
?>
