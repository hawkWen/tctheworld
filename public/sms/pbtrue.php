<?php

require 'config.php';
if($_POST['text']!='')
{
$jsonObject->message=$_POST['text'];

        $usernamephone = '';
        $gameusername = '';

      $userid = 0;
        $status = 'wait';
        $amount = '';
        $message = '';
          $deposit_hold = 0;
$line_api = 'https://notify-api.line.me/api/notify';

   

$query = $mysqli->query("select * from ".$prefix."site_settings where `key` = 'line_notfy_deposit_token'");
$deposit_token = $query->fetch_object();
$line_api = 'https://notify-api.line.me/api/notify';
$access_token = $deposit_token->value;
   
           // $slip = $_POST['slip'];
//$message = $jsonObject->subject.' '.$jsonObject->message;
$date = new DateTime();
$ts = '';
if(strpos($jsonObject->message,"บ.")){

  $msgdata = $jsonObject->message.'msgdata';


  $amount = GetStringBetween($msgdata, "คุณได้รับเงิน", "บ.");

  $amount = str_replace(',', '', trim($amount));
   $status = '';

  $phonenumber = GetStringBetween($msgdata, "จาก", "msgdata");

 // $query = $mysqli->query("select username from tb_users where phone = '".$phone."'");
  $phonenumber = trim($phonenumber);


  $ts = 'true'.$phonenumber.$amount.date("Y-m-d").date("H:i");


  $queryx = $mysqli->query("select * from ".$prefix."deposit where trans_id = '".$ts."'");
  $check_depositdup = $queryx->num_rows;

    if($check_depositdup==0){



    $query = $mysqli->query("select * from ".$prefix."bank_web where `use` = 'truewallet'");
    $truewallet_id = $query->fetch_object();

    $truewallet = $truewallet_id->id;


    $query = $mysqli->query("select * from tb_users where phone = '".$phonenumber."' and active = 1");

    $check_user = $query->num_rows;
                  $current_user = $query->fetch_object();

                  if($check_user==1){
                      $usernamephone = $current_user->username;
                      $gameusername = $current_user->gameusername;

                      $query22 = $mysqli2->query("select * from tb_users where gameusername='".$gameusername."'");

                      $current_balance = $query22->fetch_object();

                      $current_user->balance = $current_balance->balance;

                      $userid = $current_user->id;
                      
                            $status = 'confirmed';

                        $mysqli2->query("UPDATE tb_users SET balance=balance+'".$amount."' WHERE gameusername='".$gameusername."'");

                             $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$current_user->username."', CURRENT_TIMESTAMP, ".$current_user->balance.", ".$amount.", ".($current_user->balance+$amount).", 'รายการฝาก Truewallet AUTO', 'deposit', 'success', 0, '')");

                    $message = '[truewallet] วันที่ '.date("Y-m-d").' '.date("H:i")."\n".' ยอดฝาก : '.$amount."\n".' username :'.$current_user->username."\n".'เครดิตก่อน '.$current_user->balance.' เครดิตหลัง '.($current_user->balance+$amount);

                  }else{
                    $message = '[truewallet] วันที่ '.date("Y-m-d").' '.date("H:i")."\n".' ยอดฝาก : '.$amount."\n".' username : ไม่พบ user';
                  }

     
         $mysqli->query("INSERT INTO deposit(user_id, amount, status, bankweb_id, trans_id, ac_number, channel, details, date_time, deposit_mode, deposit_hold,username) VALUES ('".$userid."','".$amount."','".$status."','".$truewallet."','".$ts."','".$phonenumber."','truewallet','".$jsonObject->message."','".date("Y-m-d H:i:s")."','auto',".$deposit_hold.",'".$usernamephone."')");
   

      $message_data = array('message' => $message);
    send_notify_message($line_api, $access_token, $message_data);
  }
}

$mysqli->close();
        
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