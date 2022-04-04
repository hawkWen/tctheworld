<?php

require 'config.php';

$jsonObject = json_decode(implode('', file("php://input")));

$mysqli->query("INSERT INTO sms(subject, message) VALUES ('".$jsonObject->subject."','".$jsonObject->message."')");


$line_api = 'https://notify-api.line.me/api/notify';
        $access_token = 'UUFSVSYMuFpimwWvRFoV5e5fej0UMuSgVHcG2PO4us6';
   
        $moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';

   
           // $slip = $_POST['slip'];
        $deposit_api = 'http://play.moradok88.com/sximoapi?module=deposit';
$message = '';
if($jsonObject->subject=='027777777'){

	$date = substr($jsonObject->message, 0, 5);
                    $time = GetStringBetween($jsonObject->message, "@", " ");
                   // $amount = substr($data["latest"]["body"],11);//$this->GetStringBetween(, " ", "จาก");
                    $amount =  GetStringBetween($jsonObject->message,$time, " จาก");

                    $amount = str_replace(',', '', $amount);

                    $bank_code = GetStringBetween($jsonObject->message, "จาก", "/x");
                    $account_number = GetStringBetween($jsonObject->message, $bank_code."/x", "เข้าx");

                    $to_acc = substr($jsonObject->message, strpos($jsonObject->message,"เข้าx")+13, strlen($jsonObject->message));




    $userid = 0;
    $status = 'wait';
    $deposit_hold = 0;
    $wheel_rounds = 0;


    if(strpos($jsonObject->message,"จาก")){


      $queryx = $mysqli->query("select * from deposit where date_time = '".$date.'/'.date('Y').' '.$time."' and amount = '".$amount."' and ac_number like '%".$account_number."%'");
      $check_depositdup = $queryx->num_rows;

      if($check_depositdup==0){

              
    	
          	    $query = $mysqli->query("select bank_id from banks where bankcode = '".$bank_code."'");
          	    $user_bankid = $query->fetch_object();

          	    $query = $mysqli->query("select id,username,balance,bonus from tb_users where bank = '".$user_bankid->bank_id."' and account_number like '%".$account_number."%'");
          	    $check_user = $query->num_rows;
          	    $current_user = $query->fetch_object();

          	    if($check_user==1){

            	    	$userid = $current_user->id;
            	    	$status = 'confirmed';

                      if($current_user->balance > 5||$current_user->bonus > 5){
                          $deposit_hold = 1;
                      }else{


                      	  $wheel_rounds = floor($amount/100);

                          if($amount>999){
                          	
                            $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."',max_withdraw='9999999',wheel_rounds=wheel_rounds+'".$wheel_rounds."' WHERE id=".$userid);
                          }else{
                            $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."',max_withdraw='".($amount*10)."',wheel_rounds=wheel_rounds+'".$wheel_rounds."' WHERE id=".$userid);
                          }
                      }
            	    	  

                    $message = '[SCB]'."\n\n".'มีลูกค้าโอนมา '.$date.'/'.date('Y').' '.$time."\n\n".'ธนาคาร : '.$bank_code."\n\n".'เลขบัญชี : '.$account_number."\n\n".' ยอดเงิน : '.$amount."\n\n".'เข้าบัญชี '.$to_acc."\n\n".' username :'.$current_user->username;

          	    }else{
                  $message = '[SCB]'."\n\n".'มีลูกค้าโอนมา '.$date.'/'.date('Y').' '.$time."\n\n".'ธนาคาร : '.$bank_code."\n\n".'เลขบัญชี : '.$account_number."\n\n".' ยอดเงิน : '.$amount."\n\n".'เข้าบัญชี '.$to_acc;
                }

          	    $mysqli->query("INSERT INTO deposit(user_id, amount, status, bankweb_id, trans_id, ac_number, channel, details, date_time, deposit_mode, deposit_hold) VALUES ('".$userid."','".$amount."','".$status."','3','0','".$account_number."','SCB','".$bank_code."','".$date.'/'.date('Y').' '.$time."','auto',".$deposit_hold.")");


             

                                   

      }

	}else{


					$date = substr($jsonObject->message, 0, 5);
                    $time = GetStringBetween($jsonObject->message, "@", " ");
                   // $amount = substr($data["latest"]["body"],11);//$this->GetStringBetween(, " ", "จาก");
                    $amount =  GetStringBetween($jsonObject->message,$time, " เข้าx");

                    $amount = str_replace(',', '', $amount);

                    $to_acc = substr($jsonObject->message, strpos($jsonObject->message,"เข้าx")+13, strlen($jsonObject->message));

   

          $checkdot = dot_deposit($mysqli,$amount);

          if($checkdot==0)
          {



		          $mysqli->query("INSERT INTO deposit(user_id, amount, status, bankweb_id, trans_id, channel, details, date_time, deposit_mode, deposit_hold) VALUES ('0','".$amount."','".$status."','3','0','SCB','ต้องเลือก user ใส่','".$date.'/'.date('Y').' '.$time."','manual',0)");


              $message = '[SCB]'."\n\n".'มีลูกค้าโอนมา '.$date.'/'.date('Y').' '.$time."\n\n".' ยอดเงิน : '.$amount."\n\n".'เข้าบัญชี '.$to_acc;

          }else{

            $query = $mysqli->query("select username from tb_users where id = '".$checkdot."'");
              
            $current_user = $query->fetch_object();
              $message = '[SCB]'."\n\n".'มีลูกค้าโอนมา '.$date.'/'.date('Y').' '.$time."\n\n".' ยอดเงิน : '.$amount."\n\n".'เข้าบัญชี '.$to_acc."\n\n".' username :'.$current_user->username;
          }
          
	}


  $message_data = array('message' => $message);
  send_notify_message($line_api, $access_token, $message_data);
    			
  echo '{"error_code":0}';
}


function dot_deposit($mysqli,$amount){

                    $query = $mysqli->query("SELECT * from deposit where TIMEDIFF(NOW(),STR_TO_DATE(date_time,'%d/%m/%Y %H:%i')) < '00:05:00' and channel = 'dot' and status = 'wait' and amount = '".$amount."'");
                      $check_deposit = $query->num_rows;
                      $current_deposit = $query->fetch_object();


                     $wheel_rounds = 0;

                      if($check_deposit==1){

                            

                            $query = $mysqli->query("select balance,bonus from tb_users where id = '".$current_deposit->user_id."'");
                            $check_credit_amount = $query->num_rows;
                            $credit_amount = $query->fetch_object();

                            if($credit_amount->balance > 5){
      $mysqli->query("UPDATE deposit SET status = 'confirmed',deposit_mode = 'auto',deposit_hold=1 WHERE deposit_id=".$current_deposit->deposit_id);
                            }else{


                            	$wheel_rounds = floor($amount/100);

                              if($amount>999){

    $mysqli->query("UPDATE deposit SET status = 'confirmed',deposit_mode = 'auto',deposit_hold=0 WHERE deposit_id=".$current_deposit->deposit_id);
                                $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."',max_withdraw='9999999',wheel_rounds=wheel_rounds+'".$wheel_rounds."' WHERE id=".$current_deposit->user_id); 
                            
                              }else{


    $mysqli->query("UPDATE deposit SET status = 'confirmed',deposit_mode = 'auto',deposit_hold=0 WHERE deposit_id=".$current_deposit->deposit_id);
                                $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."',max_withdraw='".($amount*10)."',wheel_rounds=wheel_rounds+'".$wheel_rounds."' WHERE id=".$current_deposit->user_id);

                              }
                            }

                        return $current_deposit->user_id;

                      }else{
                        return 0;
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