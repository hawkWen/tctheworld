<?php
require 'config.php';
  require 'sendMessage.php';



 $query2 = $mysqli->query("SELECT * from ".$prefix."sumprocredit where `date` = '".date("Y-m-d")."'");

 $sumprocredit = $query2->fetch_object();
/*-------------line noti----------------------*/
$sumcredit = 0;
$protext = '';
$countpro = 0;
$sumbal = 0;
$chtext='';
$a=0;
        $query2 = $mysqli->query("SELECT count(*) as sumpromotion,sum(".$prefix."promotions_history_users.deposit_amount) as sumbal,sum(".$prefix."promotions_history_users.value-".$prefix."promotions_history_users.deposit_amount) as sumcredit, promotion_name,promotion_id FROM ".$prefix."promotions_history_users inner join ".$prefix."promotions on ".$prefix."promotions.id = ".$prefix."promotions_history_users.promotion_id 
where status = 'confirmed' and DATE(date_time) = CURDATE()
GROUP by promotion_id
order by promotion_id ASC");
    while ($promotion_all = $query2->fetch_object()) {

            $query1 = $mysqli->query("SELECT count(*) as sumpromotion FROM ".$prefix."withdraw 
            where status = 'confirmed' and DATE(date_time) = CURDATE() and promotion_id = ".$promotion_all->promotion_id);

            $promotion_withdraw = $query1->fetch_object();

            $query11 = $mysqli->query("SELECT sum(amount) as sumpromotion FROM ".$prefix."withdraw 
            where status = 'confirmed' and DATE(date_time) = CURDATE() and promotion_id = ".$promotion_all->promotion_id);

            $promotion_withdraw_amount = $query11->fetch_object();

         
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
                "text": "'.$promotion_all->promotion_name.'",
                "size": "sm",
                "color": "#555555",
                "flex": 6
              },
                {
                "type": "text",
                "text": "'.($promotion_all->sumbal-$promotion_withdraw_amount->sumpromotion).' ฿",
                "size": "sm",
                "color": "#FF31C0",
                "align": "end",
                "flex": 4
              },
              
             
              {
                "type": "text",
                "text": "'.$promotion_all->sumpromotion.'/'.$promotion_withdraw->sumpromotion.'",
                "size": "sm",
                "color": "#111111",
                "align": "end",
                "flex": 3
              }
            ]
          }';
            $a++;
            $countpro = $countpro+$promotion_all->sumpromotion;
            $sumbal = $sumbal+$promotion_all->sumbal;
            $sumcredit = $sumcredit+$promotion_all->sumcredit;
    }

//$noprodep = $current_deposit->deposit_today-$amountpro_deposit->sumamount;



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
        "text": "เครดิตที่ใช้ไป",
        "weight": "bold",
        "color": "#6236FF",
        "size": "sm"
      },
    
      {
        "type": "text",
        "text": "'.number_format($sumcredit,2).'",
        "weight": "bold",
        "margin": "sm"
      },
    

      '.$chtext.',
      {
        "type": "separator",
        "margin": "sm"
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


$status = sentMessage($encodeJson,$datas);

  print_r($status);

?>


