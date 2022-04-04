<?php
require 'config.php';

$query = $mysqli->query("select * from site_settings");

$site_setting_values = array();

while ($row = $query->fetch_object()) {
   $site_setting_values[$row->key] = $row->value;
}



$line_api = 'https://notify-api.line.me/api/notify';
$access_token = $site_setting_values['line_notfy_report_token'];




  //  $slip = $_POST['slip'];
      //text max 1,000 charecter
  //  $image_thumbnail_url = 'https://moradok88.com/slips/images-1.jpeg';  // max size 240x240px JPEG
   // $image_fullsize_url = $photo; //max size 1024x1024px JPEG
    //$imageFile = 'images-1.jpeg';
 //   $imageFile = new CurlFile('/home1/moradk88/public_html/slips/'.$slip);
   // $sticker_package_id = '';  // Package ID sticker
   // $sticker_id = '';    // ID sticker


    $query2 = $mysqli->query("SELECT count(*) as count_current_users FROM tb_users where date(last_login) = curdate()");
    $current_users = $query2->fetch_object();

    $query2 = $mysqli->query("SELECT count(*) as count_create_users FROM tb_users where date(created_at) = curdate()");
    $create_users = $query2->fetch_object();

    $current_users=$current_users->count_current_users-$create_users->count_create_users;
    $create_users=$create_users->count_create_users;
    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today,count(*) as count_deposit FROM deposit where status = 'confirmed' and DATE(system_date) = CURDATE()");
    $current_deposit = $query2->fetch_object();

        $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as withdraw_today,ROUND(sum(reduce_credit),2) as withdraw_credit,count(*) as count_withdraw FROM withdraw where status = 'confirmed' and DATE(date_time) = CURDATE()");
    $current_withdraw = $query2->fetch_object();

    $query2 = $mysqli->query("SELECT sum(amount) as sumamount FROM withdraw where status = 'confirmed' and DATE(date_time) = CURDATE() and promotion_id >0");
    $amountpro_withdraw = $query2->fetch_object();

        $query2 = $mysqli->query("SELECT sum(amount) as sumamount FROM withdraw where status = 'confirmed' and DATE(date_time) = CURDATE() and promotion_id =0");
    $amountnopro_withdraw = $query2->fetch_object();

$query2 = $mysqli->query("SELECT sum(deposit_amount) as sumamount FROM promotions_history_users where DATE(date_time) = CURDATE() and `lock` = 1");
    $amountpro_deposit = $query2->fetch_object();


$prowdtext = '';
$prowdcount = 0;
$noprowdcount = 0;
$prowdamount = 0;
$noprowdamount = 0;
        $query2 = $mysqli->query("SELECT count(*) as sumpromotion,sum(amount) as sumamount, promotion_name FROM withdraw left join promotions on promotions.id = withdraw.promotion_id 
where status = 'confirmed' and DATE(date_time) = CURDATE()
GROUP by promotion_id
order by promotion_id ASC");
    while ($promotion_withdraw = $query2->fetch_object()) {

            if($promotion_withdraw->promotion_name==''){
                //  $promotion_withdraw->promotion_name = 'ไม่รับโปร';
                  $noprowdcount = $noprowdcount+$promotion_withdraw->sumpromotion;
                  $noprowdamount = $noprowdamount+$promotion_withdraw->sumamount;
            }else{

                //$prowdtext .= $promotion_withdraw->promotion_name.' จำนวน '.$promotion_withdraw->sumpromotion."\n";
                $prowdcount = $prowdcount+$promotion_withdraw->sumpromotion;
                $prowdamount = $prowdamount+$promotion_withdraw->sumamount;
            }

            

    }
$sumcredit = 0;
$protext = '';
$countpro = 0;
        $query2 = $mysqli->query("SELECT count(*) as sumpromotion,sum(credit_additional) as sumcredit, promotion_name,promotion_id FROM promotions_history_users inner join promotions on promotions.id = promotions_history_users.promotion_id 
where status = 'confirmed' and DATE(date_time) = CURDATE()
GROUP by promotion_id
order by promotion_id ASC");
    while ($promotion_all = $query2->fetch_object()) {

            $query1 = $mysqli->query("SELECT count(*) as sumpromotion FROM withdraw 
            where status = 'confirmed' and DATE(date_time) = CURDATE() and promotion_id = ".$promotion_all->promotion_id);

            $promotion_withdraw = $query1->fetch_object();

            $sumcredit = $sumcredit+$promotion_all->sumcredit;
            $protext .= $promotion_all->promotion_name.' ('.$promotion_all->sumpromotion.'/'. $promotion_withdraw->sumpromotion .')'."\n";
            $countpro = $countpro+$promotion_all->sumpromotion;

    }

$noprodep = $current_deposit->deposit_today-$amountpro_deposit->sumamount;
$creditall = $sumcredit+$noprodep;

$message = ' วันที่ '.date("d/m/Y").' เวลา '.date('H:i').' น.'."\n\n".
'💹 ฝากรวม : '.$current_deposit->count_deposit.' ครั้ง : '.number_format($current_deposit->deposit_today,2).' บ.'."\n".
'❌ ถอนรวม : '.$current_withdraw->count_withdraw.' ครั้ง : '.number_format($current_withdraw->withdraw_today,2).' บ.'."\n".
'💲 กำไรสุทธิ : '.number_format($current_deposit->deposit_today-$current_withdraw->withdraw_today,2).' บ.'."\n\n".

'🏛️ ฝากไม่โปร : '.number_format($noprodep,2).' บ.'."\n".
'❌ ถอนไม่โปร '.$noprowdcount.' ครั้ง : '.number_format($amountnopro_withdraw->sumamount,2).' บ.'."\n".
'💲 ส่วนต่าง : '.number_format($noprodep-$amountnopro_withdraw->sumamount,2).' บ.'."\n\n".

'💰 ฝากโปร '.$countpro.' ครั้ง : '.number_format($amountpro_deposit->sumamount,2).' บ.'."\n".
'❌ ถอนโปร '.$prowdcount.' ครั้ง : '.number_format($amountpro_withdraw->sumamount,2).' บ.'."\n".
'💲 ส่วนต่าง : '.number_format($amountpro_deposit->sumamount-$amountpro_withdraw->sumamount,2).' บ.'."\n\n".

'🎰 เครดิตฝาก : '.number_format($creditall,2).' เครดิต'."\n".
'❌ เครดิตถอน : '.number_format($current_withdraw->withdraw_credit,2).' เครดิต'."\n".
'💲 ส่วนต่าง : '.number_format($creditall-$current_withdraw->withdraw_credit,2).' เครดิต'."\n\n".

'👤 ยูสใหม่ '.$create_users.' 👨‍👩‍👧‍👧 กลับมาเล่น '.$current_users;

    //$message = 'ยอดรวมวันที่ '.$sumdeposit[0]->date."\n".'จำนวนฝากทั้งหมด : '.$sumdeposit[0]->rows_deposit.' ครั้ง'."\n".'ยอดฝากทั้งหมด : '.number_format($sumdeposit[0]->total_web,2).' บ.'."\n".'ยอดถอนทั้งหมด : 0.00'.' บ.'."\n".'ส่วนต่าง : '.number_format($totalgap,2).' บ.'."\n".'เสียเครดิตไป : '.number_format($sumdeposit[0]->lost_credits,2).' เครดิต'."\n".'ไม่รับโปรจำนวน : '.$sumdeposit[0]->nopro.' ครั้ง'."\n".'รับโปร 99/100 : 0 ครั้ง';  
   // print_r($message);
    $message_data = array(
        'message' => $message
    );

    $result = send_notify_message($line_api, $access_token, $message_data);



/*$message = 'จำนวนโปรโมชั่นที่ถอนไปวันนี้ ทั้งหมด : '.$prowdcount.' ครั้ง'."\n".$prowdtext."\n\n";

    $message_data = array(
        'message' => $message
    );

    $result = send_notify_message($line_api, $access_token, $message_data);*/

$message = '🎰 โปรโมชั่นวันนี้ (ฝาก/ถอน)'."\n".$protext;


    $message_data = array(
        'message' => $message
    );

    if(date('H:i')=="23:59"){

        $mysqli->query("INSERT INTO stat_daily (`date`, deposit_num, deposit_amount, withdraw_num, withdraw_amount, nopro_deposit_amount, nopro_withdraw_num, nopro_withdraw_amount, pro_deposit_num, pro_deposit_amount, pro_withdraw_num, pro_withdraw_amount, credit_deposit_amount, credit_withdraw_amount, newuser, olduser) VALUES('".date("Y-m-d")."', ".$current_deposit->count_deposit.", ".$current_deposit->deposit_today.", ".$current_withdraw->count_withdraw.", ".$current_withdraw->withdraw_today.", ".$noprodep.", ".$noprowdcount.", ".$amountnopro_withdraw->sumamount.", ".$countpro.", ".$amountpro_deposit->sumamount.", ".$prowdcount.", ".$amountpro_withdraw->sumamount.", ".$creditall.", ".$current_withdraw->withdraw_credit.", ".$create_users.", ".$current_users.")");

    }

    $result = send_notify_message($line_api, $access_token, $message_data);
/*-------------line noti----------------------*/
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