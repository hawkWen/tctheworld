<?php
require 'config.php';
if($_POST['username']!=''){


$query = $mysqli->query("select * from site_settings");

$site_setting_values = array();

while ($row = $query->fetch_object()) {
   $site_setting_values[$row->key] = $row->value;
}


	$line_api = 'https://notify-api.line.me/api/notify';
    $access_token = $site_setting_values['line_notfy_withdraw_token'];



  $message = 'username : '.$_POST['username']."\n\n".'ยอดเงิน : '.$_POST['amount']."\n\n".'เครดิต '.$_POST['credit']."\n\n".'โปร :'.$_POST['promotion']."\n\n".'ถอนได้สูงสุด : '.$_POST['maxwithdraw'];

  $message_data = array('message' => $message);
  send_notify_message($line_api, $access_token, $message_data);

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


    function GetStringBetween($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

 ?>