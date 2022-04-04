<?php
require 'config.php';
  require 'sendMessage.php';

//$photo=$_GET["photo"];
     //$photo = 'https://moradok88.com/slips/images-1.jpeg';
/*-------------line noti----------------------*/

  //  $slip = $_POST['slip'];
      //text max 1,000 charecter
  //  $image_thumbnail_url = 'https://moradok88.com/slips/images-1.jpeg';  // max size 240x240px JPEG
   // $image_fullsize_url = $photo; //max size 1024x1024px JPEG
    //$imageFile = 'images-1.jpeg';
 //   $imageFile = new CurlFile('/home1/moradk88/public_html/slips/'.$slip);
   // $sticker_package_id = '';  // Package ID sticker
   // $sticker_id = '';    // ID sticker

$query2 = $mysqli->query("SELECT channel.channel_name as channel_name,count(*) as count_create_users FROM ".$prefix."tb_users inner join channel on ".$prefix."tb_users.channel = channel.channel_id where date(created_at) = curdate() group by channel");


$query3 = $mysqli->query("select d.user_id,sum(d.amount) as amount, count(d.deposit_id) as time from ".$prefix."deposit d inner join ".$prefix."tb_users tu  on tu.id = d.user_id 
where date(tu.created_at) = CURDATE() and status = 'confirmed' group by d.user_id ");

$realdep = $query3->num_rows;
$time = 0;
$amount = 0;
$countuser = 0;
while ($current_usersdep = $query3->fetch_object()) {
  $time = $time+$current_usersdep->time;
  $amount = $amount+$current_usersdep->amount;
  $countuser++;
}

    $chtext='';
    $a=0;
     while ($chanel_users = $query2->fetch_object()) {

            if($a>0)
            {
                $chtext .= ',';
            }
        $chtext .= '{
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "'.$chanel_users->channel_name.'",
                "size": "sm",
                "color": "#555555",
                "flex": 0
              },
              {
                "type": "text",
                "text": "'.$chanel_users->count_create_users.' คน",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          }';
            $a++;

    }

    $query2 = $mysqli->query("SELECT * from ".$prefix."tb_users where date(`last_login`) = curdate()");
    $current_users = $query2->num_rows;



    $query2 = $mysqli->query("SELECT count(*) as count_create_users FROM ".$prefix."tb_users where date(created_at) = curdate()");
    $create_users = $query2->fetch_object();


    $create_users=$create_users->count_create_users;

    $query2 = $mysqli->query("select count(*) as `usernum`,sum(num) as num,sum(amount) as amount from ".$prefix."depositafterregis");
    $depositafterregis = $query2->fetch_object();

    if(date('H:i')=="23:59"){


       

              $query2 = $mysqli->query("SELECT *  FROM ".$prefix."bank_web where `use` = 'depositbank'");

         $baldepositbank = $query2->fetch_object();
        $mysqli->query("INSERT INTO ".$prefix."stat_daily (`date`, deposit_num, deposit_amount, withdraw_num, withdraw_amount, nopro_deposit_amount, nopro_withdraw_num, nopro_withdraw_amount, pro_deposit_num, pro_deposit_amount, pro_withdraw_num, pro_withdraw_amount, credit_deposit_amount, credit_withdraw_amount, newuser, olduser,balance_remain) VALUES('".date("Y-m-d")."', ".$current_deposit->count_deposit.", ".$current_deposit->deposit_today.", ".$current_withdraw->count_withdraw.", ".$current_withdraw->withdraw_today.", ".$noprodep.", ".$noprowdcount.", ".$amountnopro_withdraw->sumamount.", ".$countpro.", ".$amountpro_deposit->sumamount.", ".$prowdcount.", ".$amountpro_withdraw->sumamount.", ".$creditall.", ".$current_withdraw->withdraw_credit.", ".$create_users.", ".$current_users.",".$baldepositbank->balance.")");

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
        "text": "จำนวนสมาชิกเข้าใช้งาน",
        "weight": "bold",
        "color": "#1DB446",
        "size": "sm"
      },
      {
        "type": "text",
        "text": "'.$current_users.' คน",
        "weight": "bold",
        "size": "xxl",
        "margin": "md"
      },
      {
        "type": "separator",
        "margin": "xs"
      },
      {
        "type": "text",
        "text": "สมาชิกใหม่ '.$create_users.' คน ฝาก '.$countuser.' คน '.$time.' ครั้ง รวม '.number_format($amount,2).' บาท",
        "size": "xs",
        "color": "#aaaaaa",
        "margin": "xs",
        "wrap": true
      },
      {
        "type": "separator",
        "margin": "xs"
      },
      {
        "type": "text",
        "text": "สมาชิกฝากครั้งแรก '.$depositafterregis->usernum.' คน จำนวน '.$depositafterregis->num.' ครั้ง รวม '.number_format($depositafterregis->amount,2).' บาท",
        "size": "xs",
        "color": "#aaaaaa",
         "margin": "xs",
        "wrap": true
      },
      {
        "type": "separator",
        "margin": "xs"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "xxl",
        "spacing": "sm",
        "contents": [
            '.$chtext.'
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
  },
  "styles": {
    "footer": {
      "separator": true
    }
  }
}

     
    }';



$flexDataJsonDeCode = json_decode($flexDataJson,true); 
  $datas['url'] = "https://api.line.me/v2/bot/message/push";
  $datas['token'] = "M3kVw5x/+SV63C1MnSiI2GGp7MUidWHuLfHrAXYMRIFqOxGSXuGe26GG83pBdKl0Ub+pIROW56nmD+zG/OIm/8rflqV00D5nOBNAp5Xh1y9QXhFuS+d7Aky91e1zrZcLNhL+z1M87b97PDJUnlP20AdB04t89/1O/w1cDnyilFU=";
  $messages['to'] = "Ce4949faedef2bea96d416a43263bd07f";
  $messages['messages'][] = $flexDataJsonDeCode;
  $encodeJson = json_encode($messages);


  sentMessage($encodeJson,$datas);
  
?>


