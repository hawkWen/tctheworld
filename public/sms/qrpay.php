<?php

require 'config.php';

$jsonObject = json_decode(implode('', file("php://input")));

    $query = $mysqli->query("select status,user_id,amount,deposit_id from deposit where channel = 'QR' and trans_id = '".$jsonObject->id."'");
    $user_qr = $query->fetch_object();


//$hash = sha1();



if($user_qr->status=='wait'){

  $mysqli->query("UPDATE deposit SET status = 'confirmed' WHERE deposit_id = '".$user_qr->deposit_id."'");
  $mysqli->query("UPDATE tb_users SET balance=balance+'".$user_qr->amount."' WHERE id=".$user_qr->userid);
  

$hash = hash_hmac("sha1", "code=0&message=success&timestamp=".$jsonObject->timestamp, "295d4b2c-a03f-4d1b-acc4-a3da8cd769a5");
$message_data = array(
                      'code' => 0,
                      'message' => 'success',
                      'timestamp' => $jsonObject->timestamp,
                      'hash' => $hash
                    );


                    echo json_encode($message_data);
}else{

  $hash = hash_hmac("sha1", "code=0&message=error&timestamp=".$jsonObject->timestamp, "295d4b2c-a03f-4d1b-acc4-a3da8cd769a5");
  $message_data = array(
                      'code' => 1,
                      'message' => 'error',
                      'timestamp' => $jsonObject->timestamp,
                      'hash' => $hash
                    );


                    echo json_encode($message_data);
}
/*

$line_api = 'https://notify-api.line.me/api/notify';
        $access_token = 'UUFSVSYMuFpimwWvRFoV5e5fej0UMuSgVHcG2PO4us6';
   
        $moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';

   
           // $slip = $_POST['slip'];
        $deposit_api = 'http://play.moradok88.com/sximoapi?module=deposit';

if($jsonObject->subject=='027777777'){

  $date = substr($jsonObject->message, 0, 5);
                    $time = GetStringBetween($jsonObject->message, "@", " ");
                   // $amount = substr($data["latest"]["body"],11);//$this->GetStringBetween(, " ", "จาก");
                    $amount =  GetStringBetween($jsonObject->message,$time, " จาก");

                    $bank_code = GetStringBetween($jsonObject->message, "จาก", "/x");
                    $account_number = GetStringBetween($jsonObject->message, $bank_code."/x", "เข้าx");

                    $to_acc = substr($jsonObject->message, strpos($jsonObject->message,"เข้าx")+13, strlen($jsonObject->message));




    $userid = 0;
    $status = 'wait';


    if(strpos($jsonObject->message,"จาก")){
      
      $query = $mysqli->query("select bank_id from banks where bankcode = '".$bank_code."'");
      $user_bankid = $query->fetch_object();

      $query = $mysqli->query("select id from tb_users where bank = '".$user_bankid->bank_id."' and account_number like '%".$account_number."%'");
      $check_user = $query->num_rows;
      $current_user = $query->fetch_object();

      if($check_user==1){

        $userid = $current_user->id;
        $status = 'confirmed';

        $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."' WHERE id=".$userid);

      }

      $mysqli->query("INSERT INTO deposit(user_id, amount, status, bankweb_id, trans_id, ac_number, channel, details, date_time) VALUES ('".$userid."','".$amount."','".$status."','3','0','".$account_number."','SCB','".$bank_code."','".$date.'/'.date('Y').' '.$time."')");


                           $message = '[SCB]'."\n\n".'มีลูกค้าโอนมา '.$date.'/'.date('Y').' '.$time."\n\n".'ธนาคาร : '.$bank_code."\n\n".'เลขบัญชี : '.$account_number."\n\n".' ยอดเงิน : '.$amount."\n\n".'เข้าบัญชี '.$to_acc;
                           $message_data = array(
                            'message' => $message
                          );
                           send_notify_message($line_api, $access_token, $message_data);

              echo '{"error_code":0}';

  }else{

          $date = substr($jsonObject->message, 0, 5);
                    $time = GetStringBetween($jsonObject->message, "@", " ");
                   // $amount = substr($data["latest"]["body"],11);//$this->GetStringBetween(, " ", "จาก");
                    $amount =  GetStringBetween($jsonObject->message,$time, " เข้าx");

                    $to_acc = substr($jsonObject->message, strpos($jsonObject->message,"เข้าx")+13, strlen($jsonObject->message));

    $mysqli->query("INSERT INTO deposit(user_id, amount, status, bankweb_id, trans_id, channel, details, date_time) VALUES ('0','".$amount."','".$status."','3','0','SCB','ต้องเลือก user ใส่','".$date.'/'.date('Y').' '.$time."')");


                           $message = '[SCB]'."\n\n".'มีลูกค้าโอนมา '.$date.'/'.date('Y').' '.$time."\n\n".' ยอดเงิน : '.$amount."\n\n".'เข้าบัญชี '.$to_acc;
                           $message_data = array(
                            'message' => $message
                          );
                           send_notify_message($line_api, $access_token, $message_data);

              echo '{"error_code":0}';
  }
          
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
    }*/
?>