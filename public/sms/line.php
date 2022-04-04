<?php
require 'config.php';
  require 'sendMessage.php';


$mysqli->query("SET time_zone = '+8:00'");
//$photo=$_GET["photo"];
     //$photo = 'https://moradok88.com/slips/images-1.jpeg';
/*-------------line noti----------------------*/
    $line_api = 'https://notify-api.line.me/api/notify';
    $access_token = '90b0a00822af2c3ffbdbf539d7661233';



  //  $slip = $_POST['slip'];
      //text max 1,000 charecter
  //  $image_thumbnail_url = 'https://moradok88.com/slips/images-1.jpeg';  // max size 240x240px JPEG
   // $image_fullsize_url = $photo; //max size 1024x1024px JPEG
    //$imageFile = 'images-1.jpeg';
 //   $imageFile = new CurlFile('/home1/moradk88/public_html/slips/'.$slip);
   // $sticker_package_id = '';  // Package ID sticker
   // $sticker_id = '';    // ID sticker
$query2 = $mysqli->query("SELECT *  FROM bank_web where `use` = 'depositbank'");

         $baldepositbank = $query2->fetch_object();

$query2 = $mysqli->query("SELECT *  FROM bank_web where `use` = 'depositbank2'");

$baldepositbank2 = '';
if(!empty($query2)){
         $baldepositbank2 = $query2->fetch_object();
       }

$query2 = $mysqli->query("SELECT *  FROM bank_web where `use` = 'ktbdepositbank'");


$baldepositktbbank = '';
if(!empty($query2)){

         $baldepositktbbank = $query2->fetch_object();
}


        /* $query2 = $mysqli->query("SELECT *  FROM bank_web where `use` = 'depositbank2'");

$baldepositbank2 = $query2->fetch_object();*/

                  $query2 = $mysqli->query("SELECT *  FROM bank_web where `use` = 'withdrawbank'");

         $balwithdrawbank = $query2->fetch_object();

$query2 = $mysqli->query("SELECT *  FROM bank_web where `use` = 'truewallet'");

         $baldeposittrue = $query2->fetch_object();

$query2 = $mysqli->query("SELECT *  FROM stat_daily where `date` = '".date("Y-m-d",strtotime("-1 days"))."'");

         $yesterdaybal = $query2->fetch_object();


         $query2 = $mysqli->query("SELECT *  FROM stat_daily where `date` = '".date("Y-m-d",strtotime("-1 days"))."'");

         $yesterdaybal2 = $query2->fetch_object();

    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today,count(*) as count_deposit FROM deposit where status  in ('manual', 'confirmed') and date(CONVERT_TZ(`date_time`,'+07:00','+08:00')) = CURDATE()");
    $current_deposit = $query2->fetch_object();

    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status  in ('manual', 'confirmed') and date(CONVERT_TZ(`date_time`,'+07:00','+08:00')) = CURDATE() and bankweb_id = ".$baldepositbank->id);
    $current_deposit_scb = $query2->fetch_object();


     if($baldepositbank2!=''){

    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status  in ('manual', 'confirmed') and date(CONVERT_TZ(`date_time`,'+07:00','+08:00')) = CURDATE() and bankweb_id = ".$baldepositbank2->id);
    $current_deposit_scb2 = $query2->fetch_object();

  }

  /*  $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status = 'confirmed' and DATE(date_time) = CURDATE() and bankweb_id = ".$baldepositbank2->id);
    $current_deposit_scb2 = $query2->fetch_object();
*/
    if($baldepositktbbank!=''){
    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status  in ('manual', 'confirmed') and date(CONVERT_TZ(`date_time`,'+07:00','+08:00')) = CURDATE() and bankweb_id = ".$baldepositktbbank->id);
    $current_deposit_ktb = $query2->fetch_object();

    }

    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status  in ('manual', 'confirmed') and date(CONVERT_TZ(`date_time`,'+07:00','+08:00')) = CURDATE() and bankweb_id = ".$baldeposittrue->id);
    $current_deposit_true = $query2->fetch_object();


    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status  in ('manual', 'confirmed') and date(CONVERT_TZ(`date_time`,'+07:00','+08:00')) = CURDATE() and bankweb_id = 5");
    $current_deposit_admin = $query2->fetch_object();

    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status  in ('manual', 'confirmed') and date(CONVERT_TZ(`date_time`,'+07:00','+08:00')) = CURDATE() and bankweb_id = 18");
    $current_deposit_7day = $query2->fetch_object();

     $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as withdraw_today,ROUND(sum(reduce_credit),2) as withdraw_credit,count(*) as count_withdraw FROM withdraw where status = 'confirmed' and date(`date_time`) = CURDATE()");
    $current_withdraw = $query2->fetch_object();
/*
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
'รายงานยอด'."\n".
'💹 ยิดฝก : '.$current_deposit->count_deposit.' ครั้ง : '.number_format($current_deposit->deposit_today,2).' บ.'."\n".
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


*/


    //$message = 'ยอดรวมวันที่ '.$sumdeposit[0]->date."\n".'จำนวนฝากทั้งหมด : '.$sumdeposit[0]->rows_deposit.' ครั้ง'."\n".'ยอดฝากทั้งหมด : '.number_format($sumdeposit[0]->total_web,2).' บ.'."\n".'ยอดถอนทั้งหมด : 0.00'.' บ.'."\n".'ส่วนต่าง : '.number_format($totalgap,2).' บ.'."\n".'เสียเครดิตไป : '.number_format($sumdeposit[0]->lost_credits,2).' เครดิต'."\n".'ไม่รับโปรจำนวน : '.$sumdeposit[0]->nopro.' ครั้ง'."\n".'รับโปร 99/100 : 0 ครั้ง';  
   // print_r($message);





/*$message = 'จำนวนโปรโมชั่นที่ถอนไปวันนี้ ทั้งหมด : '.$prowdcount.' ครั้ง'."\n".$prowdtext."\n\n";

    $message_data = array(
        'message' => $message
    );

    $result = send_notify_message($line_api, $access_token, $message_data);*/

//$message = '🎰 โปรโมชั่นวันนี้ (ฝาก/ถอน)'."\n".$protext;





/*-------------line noti----------------------*/
$profitcol =  '';
$sumprofit = $current_deposit->deposit_today-$current_withdraw->withdraw_today;
if($sumprofit>0){
  $profitcol="#1DB446";
  $sumprofit='+'.number_format($sumprofit,2);
}else{
  $profitcol="#ff0000";
  $sumprofit=number_format($sumprofit,2);
}


  $flexDataJson = '{
      "type": "flex",
      "altText": "สรุปยอด",
      "contents": {
        
  "type": "bubble",
  "body": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "ยอดเงินในบัญชี '.$baldepositbank->bank_name.'",
        "weight": "bold",
        "color": "#1DB446",
        "size": "sm"
      },
      {
        "type": "text",
        "text": "'.number_format($baldepositbank->balance,2).'",
        "weight": "bold",
        "size": "xxl",
        "margin": "md"
      },
      {
        "type": "text",
        "text": "คงเหลือเมื่อวาน '.number_format($yesterdaybal->deposit1_bal,2).'",
        "size": "xs",
        "color": "#aaaaaa",
        "wrap": true
      },
      {
        "type": "separator",
        "margin": "xxl"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "xxl",
        "spacing": "sm",
        "contents": [
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "ยอดฝากวันนี้",
                "size": "sm",
                "color": "#555555",
                "flex": 0
              },
              {
                "type": "text",
                "text": "'.number_format($current_deposit->deposit_today,2).' / '.number_format($current_deposit->count_deposit).' ครั้ง",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "ยอดถอนวันนี้",
                "size": "sm",
                "color": "#555555",
                "flex": 0
              },
              {
                "type": "text",
                "text": "'.number_format($current_withdraw->withdraw_today,2).' / '.number_format($current_withdraw->count_withdraw).' ครั้ง",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "กำไร/ขาดทุนวันนี้",
                "size": "sm",
                "color": "#555555",
                "flex": 0
              },
              {
                "type": "text",
                "text": "'.$sumprofit.'",
                "size": "sm",
                "color": "'.$profitcol.'",
                "align": "end"
              }
            ]
          },
          {
            "type": "separator",
            "margin": "xxl"
          },
          {
            "type": "box",
            "layout": "horizontal",
            "margin": "sm",
            "contents": [
              {
                "type": "text",
                "text": "'.$baldepositbank->bank_name.'",
                "size": "sm",
                "color": "#555555"
              },
              {
                "type": "text",
                "text": "'.number_format($current_deposit_scb->deposit_today,2).'",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "'.$baldeposittrue->bank_name.'",
                "size": "sm",
                "color": "#555555"
              },
              {
                "type": "text",
                "text": "'.number_format($current_deposit_true->deposit_today,2).'",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "แอดเครดิตมือ",
                "size": "sm",
                "color": "#555555"
              },
              {
                "type": "text",
                "text": "'.number_format($current_deposit_admin->deposit_today,2).'",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          }
        ]
      },
      {
        "type": "separator",
        "margin": "xxl"
      },
      {
        "type": "box",
        "layout": "horizontal",
        "margin": "md",
        "contents": [
          {
            "type": "text",
            "text": "วันที่ '.date("d/m/Y").'",
            "size": "xs",
            "color": "#aaaaaa",
            "flex": 0
          },
          {
            "type": "text",
            "text": "เวลา '.date("H:i:s").'",
            "color": "#aaaaaa",
            "size": "xs",
            "align": "end"
          }
        ]
      }
    ]
  }

      }
    }';

    print_r($flexDataJson);

  $flexDataJsonDeCode = json_decode($flexDataJson,true);
  $datas['url'] = "https://api.line.me/v2/bot/message/push";
  $datas['token'] = "C/rgUjipM6BezapK62jSPaZvrPKxy5XVlt0zJKJKoYY8hNJ8WH6fP2J/5+OT6cd9wll5ahFNRXWoYv4WxN1XxYy2sYJG7mk3ovfeWNBpLAu8ABYxvtON7XwxGBx3jaZFCuBAXtyrk3DRwvo8tbr7ZgdB04t89/1O/w1cDnyilFU=";
  $messages['to'] = "C516328f2fb2eead9039d55d352b90cb5";
  $messages['messages'][] = $flexDataJsonDeCode;


  $encodeJson = json_encode($messages);


  $status = sentMessage($encodeJson,$datas);

    print_r($status);    
  
?>


