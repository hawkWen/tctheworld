<?php
require 'config.php';
require_once 'SCBEasyAPI2.php';


$query = $mysqli->query("select * from site_settings");

$site_setting_values = array();

while ($row = $query->fetch_object()) {
   $site_setting_values[$row->key] = $row->value;
}

$query = $mysqli->query("select * from bank_web where `use` = 'depositbank'");
$depositbank = $query->fetch_object();


$depositbankid = $depositbank->id;
$deviceId = $depositbank->device_id;
$refreshToken = $depositbank->api_refresh;
$accountNumber = $depositbank->bank_account_no;


$line_api = 'https://notify-api.line.me/api/notify';
$access_token = $site_setting_values['line_notfy_deposit_token'];



$scb = new SCBEasyAPI();
$scb->setAccount($deviceId, $refreshToken, $accountNumber);

if ($scb->login()) {
    // อ่านรายการฝาก
    $response = $scb->transactions();
    echo '<pre>';
    print_r($response);
    echo '</pre>';


        if($response['availableBalance']>$site_setting_values['amount_collect']){



                                        $response2 = $scb->transfer($site_setting_values['bank_collect'], $site_setting_values['account_collect'], $site_setting_values['transfer_collect']);

                                        if($response2->status->code==1000){  

                                     $message_data = array('message' => 'รายการโอนเก็บบันชี สำเร็จ ยอดตั้งต้น '.$response['availableBalance'].' ยอดคงเหลือ '.$response2->data->remainingBalance.' บาท');
                                     send_notify_message($line_api, $access_token, $message_data);

                                }else{

                                    $message_data = array('message' => 'รายการโอนเก็บ ไม่สำเร็จ '.$response2->status->description);
                                     send_notify_message($line_api, $access_token, $message_data);

                                }
                            }

    $mysqli->query("UPDATE bank_web SET balance = '".($response['availableBalance'])."' WHERE id=".$depositbankid);

     if(!empty($response['transactions'])){



    foreach ($response['transactions'] as $key => $value) {



      if($value['type']->code=='X1'){   

        $userid = 0;
        $status = 'wait';
        $deposit_hold = 0;

        $username = '';

        $amount = $value['amount'];
        $date_time = $value['dateTime'];
        $bank_code = $value['remark']['bank'];

        $name = explode(" ",$value['remark']['name']);

        $user_bankid = 0;

        $message = '';

        $origin = new DateTime("now");
        $target = new DateTime($date_time);

        $queryadd = '';

        $interval = date_diff($origin, $target);
        $timemindiff = (int)$interval->format('%r%h%i');

        $credit_before = 0;
        $credit_after = 0;
       
        $account_number = $value['remark']['number'];

        $check_user = 0;
        $current_user = '';

        $gameusername = '';
        $wallet_user = '';

          $queryx = $mysqli->query("select * from deposit where trans_id = '".$value['txHash']."'");

          $check_depositdup = $queryx->num_rows;
     
                if($check_depositdup==0){

                    if($value['channel']->code=="EWLT")
                    {
                        $namedetail = explode("/",$value['detail']);

                        $name = explode(" ",$namedetail[1]);

                        $query = $mysqli->query("select * from tb_users where first_name = '".$name[0]."' and last_name like '".$name[1]."%'");
                        $check_user = $query->num_rows;
                        $current_user = $query->fetch_object();
                        $bank_code = 'PROMPT';
                        $account_number=$name[0].' '.$name[1];
                    }
                    else
                    {

                        $query = $mysqli->query("select bank_id from banks where bankset = '".$bank_code."'");
                        $user_bankid = $query->fetch_object();


                        if($bank_code=='SCB'){
                          $queryadd = "'%".$account_number."' and first_name = '".$name[1]."' and last_name like '".$name[2]."%'";
                        }else{
                          $queryadd = "'%".$account_number."'";
                        }
                        $query = $mysqli->query("select * from tb_users where bank = '".$user_bankid->bank_id."' and account_number like ".$queryadd);
                        $check_user = $query->num_rows;
                        $current_user = $query->fetch_object();
                    }
            
                    

                    if($check_user==1){

                        $userid = $current_user->id;
                        $username = $current_user->username;
                        $gameusername = $current_user->gameusername;

                        $queryxx = $mysqli2->query("select * from tb_users where gameusername = '".$gameusername."'");
                        $wallet_user = $queryxx->fetch_object();

                        $credit_before = $wallet_user->balance;
                        $credit_after = $wallet_user->balance+$amount;
                        if($timemindiff>-5){
                          $status = 'confirmed';

                          $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, ".$credit_before.", ".$amount.", ".$credit_after.", 'รายการฝาก SCB AUTO', 'deposit', 'success', 0, '')");

                          $message = '[SCB] วันที่ '.$date_time."\n".'ธนาคาร : '.$bank_code.' - '.$account_number."\n".'ยอด : '.$amount."\n".'username :'.$username."\n".'เครดิตก่อน '.$credit_before.' หลัง '.$credit_after;

                          if($amount>=300&&$amount<1000){

                                        $round = floor($amount/300);

                                        $coin = $round*100;

                                        $mysqli->query("UPDATE tb_users SET coins=coins+".$coin." WHERE id=".$userid);

                                        $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, 0.00, 0.00, 0.00, 'ฝากเงินได้รับเพรช ".$coin." เพรช', 'wheellogs', 'success', 0, '')");

                            }elseif($amount>=1000){


                                        $coin = 500;

                                        $mysqli->query("UPDATE tb_users SET coins=coins+".$coin." WHERE id=".$userid);

                                        $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, 0.00, 0.00, 0.00, 'ฝากเงินได้รับเพรช ".$coin." เพรช', 'wheellogs', 'success', 0, '')");

                            }


                          if($current_user->bonus_mode==1){

                                    $mysqli2->query("UPDATE tb_users SET bonus=bonus+'".$amount."' WHERE gameusername='".$gameusername."'");
                                    $mysqli->query("UPDATE tb_users SET bonus=bonus+".$amount." WHERE id=".$userid);

                          }elseif($current_user->bonus_mode==2){

                                    $querya = $mysqli->query("select * from promotions_current_user where user_id = ".$userid);
                                    $check_userpromotion = $querya->num_rows;
                                    $promotion_user = $querya->fetch_object();
                                    
                                    $addamount = ($promotion_user->value/100)*$amount;

                                
                                    if($addamount>$promotion_user->max_bonus)
                                    {
                                        $addamount=$promotion_user->max_bonus;
                                    }

                                    $newamount = $amount+$addamount;

                                    $credit_after = $wallet_user->balance+$newamount;

                                    $turnover = $credit_after*2;

                                    $mysqli->query("UPDATE promotions_current_user SET turnover='".$turnover."',credit_before='".$credit_before."',credit_after='".$credit_after."',credit_additional='".$addamount."' WHERE user_id=".$userid);


                                    


                                    $mysqli2->query("UPDATE tb_users SET balance=balance+'".$newamount."' WHERE gameusername='".$gameusername."'");

                                    $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, ".$credit_before.", ".$addamount.", ".$credit_after.", 'เพิ่มโบนัสอัตโนมัติ', 'userpromotion', 'success', 0, '')");

                            }else{

                                    $mysqli2->query("UPDATE tb_users SET balance=balance+'".$amount."',turnover='".$credit_after."' WHERE gameusername='".$gameusername."'");

                            }

                                
                      }else{
                              $status = 'wait';
                              $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, ".$credit_before.", 0.00, ".$credit_before.", 'รายการฝาก SCB AUTO รอตรวจสอบเนื่องจากเวลาฝากต่างเกิน 5 นาที', 'deposit', 'wait', 0, '')");


                              $message = '[SCB] วันที่ '.$date_time."\n".'ธนาคาร : '.$bank_code.' - '.$account_number."\n".'ยอด : '.$amount."\n".'username :'.$username."\n".'เครดิตก่อน '.$credit_before.' หลัง '.$credit_after;
                      }
                      

                    }else{
                      $message = '[SCB] วันที่ '.$date_time."\n".'ธนาคาร : '.$bank_code."\n".'เลขบัญชี : '.$account_number."\n".' ยอด : '.$amount."\n".' username : ไม่พบยูส';
                    }


                    $mysqli->query("INSERT INTO deposit(user_id, username,amount, status, bankweb_id, trans_id, ac_number, channel, details, date_time, deposit_mode, deposit_hold) VALUES ('".$userid."','".$username."','".$amount."','".$status."','".$depositbankid."','".$value['txHash']."','".$account_number."','SCB AUTO','".$value['txRemark']."','".$date_time."','auto',".$deposit_hold.")");


                      $message_data = array('message' => $message);
                      send_notify_message($line_api, $access_token, $message_data);

          }


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


    function GetStringBetween($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }