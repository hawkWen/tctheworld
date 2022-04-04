<?php 

require 'config.php';
	/*Get Data From POST Http Request*/
	$datas = file_get_contents('php://input');
	/*Decode Json From LINE Data Body*/
	$deCode = json_decode($datas,true);
	file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

$rep = '';

/*$repjson = file_get_contents('https://graphicbuffet.co.th/wp-json/wp/v2/pages?search=งาน&_embed&per_page=10');

		$repjsonarr = json_decode($repjson,true);
		$i =1;
		foreach ($repjsonarr as $value) {
				$rep .= $i.' - '.$value['title']['rendered'].'\n'.urldecode($value['link'].'\n');
				$i++;
		}
		//echo '<pre>';
		print_r($rep);
		//echo '</pre>';*/
	$message = '';
	$replyToken = $deCode['events'][0]['replyToken'];
	
	$title = '';
	$message = $deCode['events'][0]['message']['text'];

$datas = [];

			$query2 = $mysqli->query("SELECT *  FROM bank_web where `use` = 'depositbank'");

			         $baldepositbank = $query2->fetch_object();

			$query2 = $mysqli->query("SELECT *  FROM bank_web where `use` = 'truewallet'");

			         $baldeposittrue = $query2->fetch_object();

			$query2 = $mysqli->query("SELECT *  FROM stat_daily where `date` = '".date("Y-m-d",strtotime("-1 days"))."'");

			         $yesterdaybal = $query2->fetch_object();


			    $query2 = $mysqli->query("SELECT count(*) as count_current_users FROM tb_users where date(last_login) = curdate()");
			    $current_users = $query2->fetch_object();

			    $query2 = $mysqli->query("SELECT count(*) as count_create_users FROM tb_users where date(created_at) = curdate()");
			    $create_users = $query2->fetch_object();

			    $current_users=$current_users->count_current_users-$create_users->count_create_users;
			    $create_users=$create_users->count_create_users;
			    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today,count(*) as count_deposit FROM deposit where status = 'confirmed' and DATE(date_time) = CURDATE()");
			    $current_deposit = $query2->fetch_object();

			    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status = 'confirmed' and DATE(date_time) = CURDATE() and bankweb_id = ".$baldepositbank->id);
			    $current_deposit_scb = $query2->fetch_object();

			    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status = 'confirmed' and DATE(date_time) = CURDATE() and bankweb_id = ".$baldeposittrue->id);
			    $current_deposit_true = $query2->fetch_object();

			    $query2 = $mysqli->query("SELECT ROUND(sum(amount),2) as deposit_today FROM deposit where status = 'confirmed' and DATE(date_time) = CURDATE() and bankweb_id = 5");
			    $current_deposit_admin = $query2->fetch_object();

			   


					$datas = '{
  "type": "bubble",
  "hero": {
    "type": "image",
    "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png",
    "size": "full",
    "aspectRatio": "20:13",
    "aspectMode": "cover",
    "action": {
      "type": "uri",
      "uri": "http://linecorp.com/"
    }
  },
  "body": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "Brown Cafe",
        "weight": "bold",
        "size": "xl"
      },
      {
        "type": "box",
        "layout": "baseline",
        "margin": "md",
        "contents": [
          {
            "type": "icon",
            "size": "sm",
            "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
          },
          {
            "type": "icon",
            "size": "sm",
            "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
          },
          {
            "type": "icon",
            "size": "sm",
            "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
          },
          {
            "type": "icon",
            "size": "sm",
            "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
          },
          {
            "type": "icon",
            "size": "sm",
            "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gray_star_28.png"
          },
          {
            "type": "text",
            "text": "4.0",
            "size": "sm",
            "color": "#999999",
            "margin": "md",
            "flex": 0
          }
        ]
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "lg",
        "spacing": "sm",
        "contents": [
          {
            "type": "box",
            "layout": "baseline",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "Place",
                "color": "#aaaaaa",
                "size": "sm",
                "flex": 1
              },
              {
                "type": "text",
                "text": "Miraina Tower, 4-1-6 Shinjuku, Tokyo",
                "wrap": true,
                "color": "#666666",
                "size": "sm",
                "flex": 5
              }
            ]
          },
          {
            "type": "box",
            "layout": "baseline",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "Time",
                "color": "#aaaaaa",
                "size": "sm",
                "flex": 1
              },
              {
                "type": "text",
                "text": "10:00 - 23:00",
                "wrap": true,
                "color": "#666666",
                "size": "sm",
                "flex": 5
              }
            ]
          }
        ]
      }
    ]
  },
  "footer": {
    "type": "box",
    "layout": "vertical",
    "spacing": "sm",
    "contents": [
      {
        "type": "button",
        "style": "link",
        "height": "sm",
        "action": {
          "type": "uri",
          "label": "CALL",
          "uri": "https://linecorp.com"
        }
      },
      {
        "type": "button",
        "style": "link",
        "height": "sm",
        "action": {
          "type": "uri",
          "label": "WEBSITE",
          "uri": "https://linecorp.com"
        }
      },
      {
        "type": "spacer",
        "size": "sm"
      }
    ],
    "flex": 0
  }
}';






	$messages = [];
	$messages['replyToken'] = $replyToken;
	$messages['messages'][] = getFormatTextMessage($datas);
	
	$encodeJson = json_encode($messages);

	$LINEDatas['url'] = "https://api.line.me/v2/bot/message/reply";
    $LINEDatas['token'] = "M3kVw5x/+SV63C1MnSiI2GGp7MUidWHuLfHrAXYMRIFqOxGSXuGe26GG83pBdKl0Ub+pIROW56nmD+zG/OIm/8rflqV00D5nOBNAp5Xh1y9QXhFuS+d7Aky91e1zrZcLNhL+z1M87b97PDJUnlP20AdB04t89/1O/w1cDnyilFU=";
  	$results = sentMessage($encodeJson,$LINEDatas);	

	/*Return HTTP Request 200*/
	http_response_code(200);
	function getFormatTextMessage($text)
	{
		$datas = [];
		$datas['type'] = 'flex';
		$datas['text'] = $text;
		return $datas;
	}

	function sentMessage($encodeJson,$datas)
	{
		$datasReturn = [];
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $datas['url'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $encodeJson,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Bearer ".$datas['token'],
		    "cache-control: no-cache",
		    "content-type: application/json; charset=UTF-8",
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		    $datasReturn['result'] = 'E';
		    $datasReturn['message'] = $err;
		} else {
		    if($response == "{}"){
			$datasReturn['result'] = 'S';
			$datasReturn['message'] = 'Success';
		    }else{
			$datasReturn['result'] = 'E';
			$datasReturn['message'] = $response;
		    }
		}
		return $datasReturn;
	}
?>