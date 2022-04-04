<?php

require 'config.php';

require_once 'SCBEasyAPI2.php';

$query = $mysqli->query("select * from site_settings");

$site_setting_values = array();

while ($row = $query->fetch_object()) {
   $site_setting_values[$row->key] = $row->value;
}

$query = $mysqli->query("select * from bank_web where `use` = 'withdrawbank'");
$withdraw_bank = $query->fetch_object();

$withdraw_bank_id = $withdraw_bank->id;
$deviceId = $withdraw_bank->device_id;
$refreshToken = $withdraw_bank->api_refresh;
$accountNumber = $withdraw_bank->bank_account_no;


$line_api = 'https://notify-api.line.me/api/notify';
$access_token = $site_setting_values['line_notfy_withdraw_token'];



			$query = $mysqli->query("select * from withdraw where (status = 'wait' and amount < 20000) or status = 'approved' or (status = 'error' and amount < 20000) limit 1");
          
          	$check_withdraw = $query->num_rows;

          	if($check_withdraw>0){

          		$scb = new SCBEasyAPI();


				      $scb->setAccount($deviceId, $refreshToken, $accountNumber);
          		if ($scb->login()) {

						while ($withdraw = $query->fetch_object()) {


								$query2 = $mysqli->query("select account_number from tb_users where id = '".$withdraw->user_id."'");
          	    				$current_user = $query2->fetch_object();


          	    				$query3 = $mysqli2->query("select bankcode from banks where bank_id = '".$withdraw->bank_id."'");
          	    				$banks = $query3->fetch_object();


          	    			$queryal = $mysqli->query("select withdraw_id from scbappwithdraw where withdraw_id = ".$withdraw->withdraw_id);
          
				          	$check_already_withdraw = $queryal->num_rows;

				          	if($check_already_withdraw==0){


										$response = $scb->transfer($banks->bankcode, $current_user->account_number, $withdraw->amount);

             //  print_r($response);  
               
										if($response->status->code==1000){    

											$mysqli->query("INSERT INTO scbappwithdraw(transactionId,remainingBalance,auto_status,transactionDateTime,qr_type,QRstring,withdraw_id) VALUES ('".$response->data->transactionId."','".$response->data->remainingBalance."','success','".$response->data->transactionDateTime."','".$response->data->additionalMetaData->paymentInfo[0]->type."','".$response->data->additionalMetaData->paymentInfo[0]->QRstring."','".$withdraw->withdraw_id."')");

											 $mysqli->query("UPDATE withdraw SET bank_transaction_id='".$response->data->transactionId."',auto_status='success',transactionDateTime='".$response->data->transactionDateTime."',status='confirmed' WHERE withdraw_id=".$withdraw->withdraw_id);

											 $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$withdraw->user_id."','".$withdraw->username."', CURRENT_TIMESTAMP, 0.00, ".$withdraw->amount.", 0.00, 'รายการถอน SCB AUTO', 'withdraw', 'success', 0, '')");

											 $mysqli->query("UPDATE bank_web SET balance = '".($response->data->remainingBalance)."' WHERE id=".$withdraw_bank_id);

											 $message_data = array('message' => 'auto #'.$withdraw->withdraw_id.' สำเร็จ ยอด '.$withdraw->amount.'บาท คงเหลือ '.($response->data->remainingBalance));
											 send_notify_message($line_api, $access_token, $message_data);


											 if($response->data->remainingBalance>$site_setting_values['amount_collect2']){



                                        $response2 = $scb->transfer($site_setting_values['bank_collect2'], $site_setting_values['account_collect2'], $site_setting_values['transfer_collect2']);

                                        if($response2->status->code==1000){  

	                                     		$message_data2 = array('message' => 'รายการโอนเก็บ สำเร็จ ยอดตั้งต้น '.$response->data->remainingBalance.' ยอดคงเหลือ '.$response2->data->remainingBalance.' บาท');
	                                     		send_notify_message($line_api, $access_token, $message_data2);

			                                }else{

		                                    $message_data2 = array('message' => 'รายการโอนเก็บ ไม่สำเร็จ '.$response2->status->description);
		                                     	send_notify_message($line_api, $access_token, $message_data2);

		                                		}
		                            }

				                    }else{
	  
				                    	 $mysqli->query("UPDATE withdraw SET status='error',note='".$response->status->description."' WHERE withdraw_id=".$withdraw->withdraw_id);

				                    	$message_data = array('message' => 'auto ไม่สำเร็จ #'.$withdraw->withdraw_id.' '.$response->status->description);
										send_notify_message($line_api, $access_token, $message_data);
						

				                    }
			                  
									}else{

											$transferdata = $queryal->fetch_object();

											$mysqli->query("UPDATE withdraw SET bank_transaction_id='".$transferdata->transactionId."',auto_status='success',transactionDateTime='".$transferdata->transactionDateTime."',status='confirmed' WHERE withdraw_id=".$withdraw->withdraw_id);

											$mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$withdraw->user_id."','".$withdraw->username."', CURRENT_TIMESTAMP, 0.00, ".$withdraw->amount.", 0.00, 'รายการถอน SCB AUTO', 'withdraw', 'success', 0, '')");

											$message_data = array('message' => 'auto #'.$withdraw->withdraw_id.' รายการนี้ถอนไปแล้วทำการปรับปรุงข้อมูล');
											send_notify_message($line_api, $access_token, $message_data);

									}




				}
			}
		}


$mysqli->close();



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
?>