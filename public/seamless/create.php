<?php
if($_POST['username']!=''&&$_POST['password']!=''&&$_POST['agent']!=''){
//$photo=$_GET["photo"];
     //$photo = 'https://moradok88.com/slips/images-1.jpeg';
/*-------------line noti----------------------,*/
      //'contact' => $_POST['contact'],
//      'signature' => md5($_POST['memberLoginName'].':'.$_POST['memberLoginPass'].':moradok')

  //  $line_api = 'https://api-prod.pgslot-api.com/seamless/create';
    
	$line_api = 'https://api-prod.pgslot-api.com/seamless/create';

  $username = $_POST['username'];
  $password = $_POST['password'];
  $agent = $_POST['agent'];

    $message_data = array(
      'username' => $username,
      'password' => $password,
      'agent' => $agent
    );

    $password_secret = '{"username":"'.$username.'","password":"'.$password.'","agent":"'.$agent.'"}'; $iterations = 1000;
    $secret = "8d76c0c626d7ffbda5eeb543afa26568";
    $hash = hash_pbkdf2("sha512", $password_secret, $secret, $iterations, 64, true); // echo base64_encode($hash);
         

    //print_r($message_data);

    $result = send_notify_message($line_api, json_encode($message_data),$hash);

    echo json_encode($result,true);
/*-------------line noti----------------------*/

}

function send_notify_message($line_api, $message_data,$hash){
   $headers = array('Method: POST', 'Content-type: application/json','x-amb-signature:'.base64_encode($hash));

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $line_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

   $result = curl_exec($ch);
   //print_r($result);
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