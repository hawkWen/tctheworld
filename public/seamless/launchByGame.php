<?php

if($_POST['gameId']!=''){


//$photo=$_GET["photo"];
     //$photo = 'https://moradok88.com/slips/images-1.jpeg';
/*-------------line noti----------------------,*/
      //'contact' => $_POST['contact'],
//      'signature' => md5($_POST['memberLoginName'].':'.$_POST['memberLoginPass'].':moradok')

  //  $line_api = 'https://api-prod.pgslot-api.com/seamless/create';
    
	  $line_api = 'https://api-prod.pgslot-api.com/seamless/launchByGame';
    $partner = str_replace("<SPAN>", "", $_POST['partner']);
    $partner = str_replace("</SPAN>", "", $partner);


    $username = strtolower($_POST['username']);
    $message_data = array(
      "username" => $username,
      "agent" => $_POST['agent'],
      "partner" => $partner,
      "code" => $_POST['code'], 
      "gameId" => $_POST['gameId'],
      "backLink" => $_POST['backLink']
    );

    $password = '{"username":"'.$username.'","agent":"'.$_POST['agent'].'","partner":"'.$partner.'","code":"'.$_POST['code'].'","gameId":"'.$_POST['gameId'].'","backLink":"'.$_POST['backLink'].'"}'; 
    $iterations = 1000;
    $secret = "8d76c0c626d7ffbda5eeb543afa26568";
    $hash = hash_pbkdf2("sha512", $password, $secret, $iterations, 64, true); 
 //   echo base64_encode($hash); echo '<br>';
         

    
  /*  echo '<br>';
    echo '<pre>';
    print_r($message_data);
    echo '</pre>';*/
    $result = send_notify_message($line_api,json_encode($message_data),$hash);
 //    echo '<pre>';
    echo $result;
   // echo '</pre>';
    //header( "location: ".$result['data']['url'] );
/*-------------line noti----------------------*/

}

function send_notify_message($line_api,$message_data,$hash){
   $headers = array('Method: POST', 'Content-type: application/json','x-amb-signature:'.base64_encode($hash));

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $line_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

   $result = curl_exec($ch);
//   print_r($result);
   // Check Error
   if(curl_error($ch))
   {
      $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) );
   }
   else
   {
      $return_array = $result;
   }
   curl_close($ch);
return $return_array;
}

?>