<?php
require "tw.php";
$tw = new TrueWallet(
    array(
      "phone" => "0990968605", 
      "password" => "nngwhn486",
      "pin" => "789895",
      "api_key" => "034c8bef-a6b7-cb30-6ea2150897c4"
    )
   
  );

$login = $tw->Login();
print_r($tw->GetTransaction());

/*foreach ($login->GetTransaction(20)['data']['activities'] as $value) {
   print_r($tw->GetTransactionReport($value['report_id']));
}*/

  //print_r($tw->RequestLoginOTP());
 // print_r($tw->SubmitLoginOTP('216959', '0990968605', 'GSDH')); 
  //print_r($tw->RequestLoginOTP());
  //print_r($tw->SubmitLoginOTP('605585', $phone, 'VCPR')); 
  /*$data = $tw->GetProfile();
  echo '<pre>';
  print_r($data);
  echo '</pre>';  */
 //print_r($tw->RequestLoginOTP());
//  print_r($tw->SubmitLoginOTP('434160', $phone, 'QWXR'));  
  /*
  
  #STEP1
  print_r($tw->RequestLoginOTP());
  
  #STEP2
  print_r($tw->SubmitLoginOTP('434160', $phone, 'QWXR'));  
  
  */
  
  //$tw->setAccessToken($access_token);
  //$data = $tw->GetTransaction();
  //print_r($data);
  
?>