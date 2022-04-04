<?php 

require 'config.php';

//ini_set('display_errors', 0);
//CONFIG
$secert_key = "2pKd3ircui6aAIsCAu0C9CtJTN"; //รหัสลับที่ได้จาก Zpay
//$api = "https://api.tsc-users-gateway.rutbase.com/users_api_gateway/users/api_2/?type=tmn_transaction_all_realtime&secert_key=2pKd3ircui6aAIsCAu0C9CtJTN&limit=15";
$api = "https://tsc-gateway.rutbase.com/api_2/?type=tmn_transaction_all_realtime&secert_key=QlxptEZy9kag1qXrpVHnmZ0FTZ&limit=15";
$line_api = 'https://notify-api.line.me/api/notify';
$access_token = 'UUFSVSYMuFpimwWvRFoV5e5fej0UMuSgVHcG2PO4us6';
   
$moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';

//$data  = json_decode(file_get_contents($api));
$truewallet = json_decode(file_get_contents($api,false));

$mysqli->query("UPDATE cashinfo SET bank_balance = '".$truewallet->balance."' WHERE bankweb_id=2");


foreach ($truewallet->data->activities as $key => $value) {


	$query_truewallet = $mysqli->query("SELECT * from truewallet_records where date_time = '".$value->date_time."' and transaction_reference_id = '".$value->transaction_reference_id."'");
    $check_truewallet_records = $query_truewallet->num_rows;



    if($check_truewallet_records==0){

    	

			$mysqli->query("INSERT INTO truewallet_records(report_id, type,amount,date_time,action,transaction_id,transaction_reference_id) VALUES ('".$value->report_id."','".$value->type."','".$value->amount."','".$value->date_time."','".$value->original_action."','".$value->transaction_reference_id."','".$value->transaction_reference_id."')");

			$userid = 0;
    		$status = 'wait';
    		$amount = str_replace('+', '', $value->amount);
        $amount = str_replace(',', '', $amount);
    		$message = '';
          $deposit_hold = 0;

			if($value->original_action=='creditor'){

				$phone = str_replace('-','',$value->transaction_reference_id);
				//print_r($phone);
				$query = $mysqli->query("select id,username from tb_users where phone = '".$phone."'");

				$check_user = $query->num_rows;
          	    $current_user = $query->fetch_object();

          	    if($check_user==1){

            	    	$userid = $current_user->id;
                    $queryapp = $mysqli->query("select status from app_status where id = 1");
                    $current_status = $queryapp->fetch_object();

                    if($current_status->status=="auto")
                    {
            	    	      $status = 'confirmed';

                          if($current_user->balance > 5){
                              $deposit_hold = 1;
                          }else{


                              if($amount>999){
                                $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."',max_withdraw='9999999' WHERE id=".$userid);
                             }else{
                                $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."',max_withdraw='".($amount*10)."' WHERE id=".$userid);
                              }
                          }
                    }
          	    	  

                  $message = '[truewallet]'."\n\n".'วันที่ '.$value->date_time."\n".'เบอร์โทร : '.$phone."\n".' ยอดเงิน : '.$amount."\n".' username :'.$current_user->username;

          	    }else{
                  $message = '[truewallet]'."\n\n".'วันที่ '.$value->date_time."\n".'เบอร์โทร : '.$phone."\n".' ยอดเงิน : '.$amount."\n".' username : ไม่พบ user';
                }


                $mysqli->query("INSERT INTO deposit(user_id, amount, status, bankweb_id, trans_id, ac_number, channel, details, date_time, deposit_mode, deposit_hold) VALUES ('".$userid."','".$amount."','".$status."','2','".$value->report_id."','".$phone."','truewallet','".$value->title." ".$value->sub_title."','".$value->date_time."','auto',".$deposit_hold.")");


                $message_data = array('message' => $message);
  				send_notify_message($line_api, $access_token, $message_data);

			}

			

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
    }
?>