<?php
require 'config.php';
require_once('TrueWallet.php');

$query = $mysqli->query("select * from site_settings");

$site_setting_values = array();

while ($row = $query->fetch_object()) {
   $site_setting_values[$row->key] = $row->value;
}

$line_api = 'https://notify-api.line.me/api/notify';
$access_token = $site_setting_values['line_notfy_deposit_token'];

$query = $mysqli->query("select * from bank_web where `use` = 'truewallet'");
$depositbank = $query->fetch_object();


$depositbankid = $depositbank->id;
$trueusername = $depositbank->bank_account_no;
$login_token = $depositbank->login_token;
$tmn_id = $depositbank->tmn_id;
$pin = $depositbank->pin;

$username = $trueusername;
$login_token = $login_token;
$type = "mobile";
$pin = $pin;
$tmn_id = $tmn_id;
$data = array(
    "username" => trim($username),
    "login_token" => trim($login_token),
    "type" => trim($type),
    "pin" => trim($pin),
    "tmn_id" => trim($tmn_id)
);
$tw = new TrueWallet($data);
$tw->curl_options = array(
    CURLOPT_SSL_VERIFYPEER => false,
);
$res = $tw->Login(); //ล็อคอิน
//$res = $tw->GetTransaction(); //ดึงรายการเงิน
echo '<pre>';
print_r($res);
echo '</pre>';
$resb = $tw->GetBalance(); //ดึงยอดเงินในบัญชี
echo '<pre>';
print_r($resb);
echo '</pre>';

if($resb['code']=='UPC-200'){
    $mysqli->query("UPDATE bank_web SET balance = '".($resb['data']['current_balance'])."' WHERE id=".$depositbankid);
}
//$res = $tw->GetProfile(); //ดึงข้อมูลบัญชี

$res2 = $tw->GetTransaction();
echo '<pre>';
print_r($res2);
echo '</pre>';
if($res2['code']=='HTC-200'){
        foreach ($res2['data']['activities'] as $key => $value) {



                $userid = 0;
                $status = 'wait';
                $deposit_hold = 0;
                $username = '';
                $phone = str_replace('-','',$value['transaction_reference_id']);

                $amount = str_replace(['+','-',','],'',$value['amount']);
                $datetime = explode(" ",$value['date_time']);
                $date=$datetime[0];
                $time=$datetime[1];

                $date = explode("/",$date);


           

                $day = $date[0];
                $month = $date[1];
                $year = $date[2];

                $date_time = '20'.$year.'-'.$month.'-'.$day.' '.$time;

                //$bank_code = $value['remark']['bank'];

                $name = explode(" ",$value['sub_title']);

                $firstname = $name[0];
                $lastname = str_replace('*','',$name[1]);

                $user_bankid = 0;

                $message = '';

                $origin = new DateTime("now");
                $target = new DateTime($date_time);

                $queryadd = '';

                $interval = date_diff($origin, $target);
                $timemindiff = (int)$interval->format('%r%h%i');

                $credit_before = 0;
                $credit_after = 0;
               
              //  $account_number = $value['remark']['number'];

                $check_user = 0;
                $current_user = '';

                  $queryx = $mysqli->query("select * from deposit where trans_id = '".$value['report_id']."'");
                 // echo "select * from deposit where bankweb_id = 6 and trans_id = '".$value['txHash']."'";
                  $check_depositdup = $queryx->num_rows;
             
                        if($check_depositdup==0){

                            if($value['original_action']=="creditor")
                            {
                                if ( is_numeric($phone) ) {
                                   $queryadd = "phone = '".$phone."'";
                                } else {
                                   $queryadd = "first_name = '".$firstname."' and last_name like '".$lastname."%'";
                                }

                                $query = $mysqli->query("select id,username,balance,bonus from tb_users where active = 1 and ".$queryadd);
                                $check_user = $query->num_rows;
                                $current_user = $query->fetch_object();
                           
                    
                            

                            if($check_user==1){

                                $userid = $current_user->id;
                                $username = $current_user->username;

                                $credit_before = $current_user->balance;
                                $credit_after = $current_user->balance+$amount;
                                if($timemindiff>-5){
                                  $status = 'confirmed';
                                           

                            $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, ".$credit_before.", ".$amount.", ".$credit_after.", 'รายการฝาก TrueWallet AUTO', 'deposit', 'success', 0, '')");

                            $message = '[TrueWallet Auto] วันที่ '.$date_time."\n".'ชื่อ : '.$firstname.' '.$lastname."*** - ".$phone."\n".'ยอด : '.$amount."\n".'username :'.$current_user->username."\n".'เครดิตก่อน '.$credit_before.' หลัง '.$credit_after;


                           

                            if($amount>=300&&$amount<1000){

                                        $round = floor($amount/300);

                                        $coin = $round*100;

                                        $mysqli->query("UPDATE tb_users SET coins=coins+".$coin." WHERE id=".$userid);

                                        $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$current_user->username."', CURRENT_TIMESTAMP, 0.00, 0.00, 0.00, 'ฝากเงินได้รับเพรช ".$coin." เพรช', 'wheellogs', 'success', 0, '')");

                            }elseif($amount>=1000){


                                        $coin = 500;

                                        $mysqli->query("UPDATE tb_users SET coins=coins+".$coin." WHERE id=".$userid);

                                        $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$current_user->username."', CURRENT_TIMESTAMP, 0.00, 0.00, 0.00, 'ฝากเงินได้รับเพรช ".$coin." เพรช', 'wheellogs', 'success', 0, '')");

                            }



                          if($current_user->bonus_mode==2){

                                    $querya = $mysqli->query("select * from promotions_current_user where user_id = ".$userid);
                                    $check_userpromotion = $querya->num_rows;
                                    $promotion_user = $querya->fetch_object();
                                    
                                    $addamount = ($promotion_user->value/100)*$amount;

                                

                                    if($addamount>$promotion_user->max_bonus)
                                    {
                                        $addamount=$promotion_user->max_bonus;
                                    }

                                    $newamount = $amount+$addamount;

                                    $credit_after = $current_user->balance+$newamount;

                                    $turnover = $credit_after*2;

       $mysqli->query("UPDATE promotions_current_user SET turnover='".$turnover."',credit_before='".$credit_before."',credit_after='".$credit_after."',credit_additional='".$addamount."' WHERE user_id=".$userid);


                                    


                                    $mysqli->query("UPDATE tb_users SET balance=balance+'".$newamount."',max_withdraw='9999999' WHERE id=".$userid);

                                    $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$current_user->username."', CURRENT_TIMESTAMP, ".$credit_before.", ".$addamount.", ".$credit_after.", 'เพิ่มโบนัสอัตโนมัติ', 'userpromotion', 'success', 0, '')");

                            }else{


                                    $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."',turnover='".$credit_after."',max_withdraw='9999999' WHERE id=".$userid);

                            }
                                        
                              }else{
                                      $status = 'wait';
                                      $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, ".$credit_before.", 0.00, ".$credit_before.", 'รายการฝาก TrueWallet AUTO รอตรวจสอบเนื่องจากเวลาฝากต่างเกิน 5 นาที', 'deposit', 'wait', 0, '')");


                                      $message = '[TrueWallet Auto] วันที่ '.$date_time."\n".'ชื่อ : '.$firstname.' '.$lastname."*** - ".$phone."\n".'ยอด : '.$amount."\n".'username :'.$current_user->username."\n".'เครดิตก่อน '.$credit_before.' หลัง '.$credit_before;
                              }
                              

                            }else{
                              $message = '[TrueWallet Auto] วันที่ '.$date_time."\n".'ชื่อ : '.$firstname.' '.$lastname."*** - ".$phone."\n".' ยอด : '.$amount."\n".' username : ไม่พบยูส';
                            }


                            $mysqli->query("INSERT INTO deposit(user_id, username,amount, status, bankweb_id, trans_id, ac_number, channel, details, date_time, deposit_mode, deposit_hold) VALUES ('".$userid."','".$username."','".$amount."','".$status."','".$depositbankid."','".$value['report_id']."','".$phone."','TrueWallet AUTO','".$value['title']." ".$value['sub_title']."','".$date_time."','auto',".$deposit_hold.")");


                              $message_data = array('message' => $message);
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


    function GetStringBetween($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
?>

