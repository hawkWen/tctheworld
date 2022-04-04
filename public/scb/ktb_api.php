<?php

//"https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id=1640616017&redirect_uri=https://www.krungthaiconnext.ktb.co.th/KTB-Line-Balance/authen?tabName=currentBalance&state=gAqqrlqeay&scope=openid+profile" รับ token
require 'config.php';

$line_api = 'https://notify-api.line.me/api/notify';
$access_token = 'UUFSVSYMuFpimwWvRFoV5e5fej0UMuSgVHcG2PO4us6';


date_default_timezone_set("Asia/Bangkok");
$year=date("Y");
$month=date("m");

$date_today=date("d");
$startDate= $year.$month.'01';
$endDate= $year.$month.'30';

$accountTokenNo="A202106278df207e1611a4121a138beca9cc9fc3c";

$userTokenId="9jibDtdJGTpqY0xJPfVFrozL73xfM+2Y9d3/mvzdvLVDVdNhVLKPfNzt3dDMdDv2IIfpRHz+UXtuaCavAQIl4I9gc4ws3IgW4goGZTwIoSVlVzko9OsNdM833BPRUpM9SV9igSITfCkPdN9doJ0XKg17ewMA6Hdclk0FJ9CNUdRFA+9zeGa5GXny7/h5gM0mfuE5RBGM6ldhlOV6ioNyqBE1sa4QnZYdxBgsHLFzbmeY6TFqfO5fg1luidd+0d+6PID2LR65tT19BMXPkKNYyXCwCtuJslj/6grfOz8PzNwIwTBne6i0s3Gg6VecWYdSdOKNPDXJ0ZSn1XNJUSn9TZSc45WnHJh+wrf3KSGKgkUZ4TLNyMegtw0Yj84IWsB9v4+t5ByMMmb16h9Ys4HChvoOXjWNqmORxnUjH/3s7gp1kVdidtp14FvMjzve9fqYAuScL4QkajTWMPJOWNb6XP10JsM4P2PpkD3/h17J320WZfLuwcRAUUTcxBCUK/fS62yu3Hg8yXRBs4ByLjnltfPhNgojwDSZ7/E8Ff/M8FL9k7bug6ZaeBQxTZmEehkg6ECNsuMYQwbhWDY9nUnSZ2D4z88hE5RL6oJLBAR8f2m6fmUKZ9i/Lc4jtIbO92pKG2T7KBdk5pZAPKXYTkAOHxeigYifU2DVTjU7LDCMEiJ3nRjXZjM6VSDT7kWnwXRLFFkJGj947QloI7Z85RPE5fUBGxl4XxjdJuMsed7nio6QXpASMQnCeS6NwH4t+BXuDYDXPZ+m/IqjnizHsXr/1P2YFDWY82b9++nhxUIkGKsFOJmV2zcuhtdKK3cX319CA6ewkeOQCQ8isVGGF6CXdrPFEJAHxUMGw9lQDtmDW3s79hYlyyAA+1QrG8wEALn1bPYoJKtf+6Mx9qADBO38X340pliqPTs49NtbnfmIjtgKw2MNs2wyIvw9Vv186eQrCoQSEJZ8eXdYgnBjjQyGDa3aygn7kJiNwnOuyl/tBEnqtuH9sw3aGCPilvSYPTrxghhM15/8hI1FWc0oMB3UxjLnVeoJO9AvNS3OfC2APxVyLAXeJ9rqRLKjIgMzIQaPKrc49LdAIbk3WRMnE3JcsQ==";

function code($value){
  if ($value=="014") {
    return 5;
  }
  if ($value=="034") {
    return 16;
  }
  if ($value=="025") {
    return 6;
  }
  if ($value=="002") {
    return 2;
  }
  if ($value=="022") {
    return 8;
  }
  if ($value=="017") {
    return "ธนาคารซิตี้แบงก์";
  }
  if ($value=="032") {
    return "ธนาคารดอยช์แบงก์";
  }
  if ($value=="033") {
    return 19;
  }
  if ($value=="030") {
    return 18;
  }
  if ($value=="031") {
    return "ธนาคารฮ่องกงและเซี่ยงไฮ้";
  }
  if ($value=="070") {
    return 14;
  }

  if ($value=="066") {
    return 20;
  }


  if ($value=="004") {
    return 1;
  }

  if ($value=="069") {
    return 7;
  }

  if ($value=="TR") {
    return 3;
  }

  if ($value=="073") {
    return 13;
  }

  if ($value=="039") {
    return "ธนาคารมิซูโฮ";
  }

  if ($value=="020") {
    return "ธนาคารสแตนดาร์ดชาร์เตอร์ด";
  }

  if ($value=="018") {
    return "ธนาคารซูมิโตโม";
  }

  if ($value=="065") {
    return 4;
  }

  if ($value=="071") {
    return 12;
  }

  if ($value=="011") {
    return 4;
  }

 


  if ($value=="067") {
    return 9;
  }

  if ($value=="024") {
    return 11;
  }


}



$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.krungthaiconnext.ktb.co.th/KTB-Line-Balance/getTransactionHistory",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>'{"userTokenId":"9jibDtdJGTpqY0xJPfVFrozL73xfM+2Y9d3/mvzdvLVDVdNhVLKPfNzt3dDMdDv2IIfpRHz+UXtuaCavAQIl4I9gc4ws3IgW4goGZTwIoSVlVzko9OsNdM833BPRUpM9SV9igSITfCkPdN9doJ0XKg17ewMA6Hdclk0FJ9CNUdRFA+9zeGa5GXny7/h5gM0mfuE5RBGM6ldhlOV6ioNyqBE1sa4QnZYdxBgsHLFzbmeY6TFqfO5fg1luidd+0d+6PID2LR65tT19BMXPkKNYyXCwCtuJslj/6grfOz8PzNwIwTBne6i0s3Gg6VecWYdSdOKNPDXJ0ZSn1XNJUSn9TZSc45WnHJh+wrf3KSGKgkUZ4TLNyMegtw0Yj84IWsB9v4+t5ByMMmb16h9Ys4HChvoOXjWNqmORxnUjH/3s7gp1kVdidtp14FvMjzve9fqYAuScL4QkajTWMPJOWNb6XP10JsM4P2PpkD3/h17J320WZfLuwcRAUUTcxBCUK/fS62yu3Hg8yXRBs4ByLjnltfPhNgojwDSZ7/E8Ff/M8FL9k7bug6ZaeBQxTZmEehkg6ECNsuMYQwbhWDY9nUnSZ2D4z88hE5RL6oJLBAR8f2m6fmUKZ9i/Lc4jtIbO92pKG2T7KBdk5pZAPKXYTkAOHxeigYifU2DVTjU7LDCMEiJ3nRjXZjM6VSDT7kWnwXRLFFkJGj947QloI7Z85RPE5fUBGxl4XxjdJuMsed7nio6QXpASMQnCeS6NwH4t+BXuDYDXPZ+m/IqjnizHsXr/1P2YFDWY82b9++nhxUIkGKsFOJmV2zcuhtdKK3cX319CA6ewkeOQCQ8isVGGF6CXdrPFEJAHxUMGw9lQDtmDW3s79hYlyyAA+1QrG8wEALn1bPYoJKtf+6Mx9qADBO38X340pliqPTs49NtbnfmIjtgKw2MNs2wyIvw9Vv186eQrCoQSEJZ8eXdYgnBjjQyGDa3aygn7kJiNwnOuyl/tBEnqtuH9sw3aGCPilvSYPTrxghhM15/8hI1FWc0oMB3UxjLnVeoJO9AvNS3OfC2APxVyLAXeJ9rqRLKjIgMzIQaPKrc49LdAIbk3WRMnE3JcsQ==","accountTokenNo":"A202106278df207e1611a4121a138beca9cc9fc3c","startDate":"'.$startDate.'","endDate":"'.$endDate.'","uid":0}',
  CURLOPT_HTTPHEADER => array(
    "Connection:  keep-alive",
    "Accept:  */*",
    "lineToken: 9jibDtdJGTpqY0xJPfVFrozL73xfM+2Y9d3/mvzdvLVDVdNhVLKPfNzt3dDMdDv2IIfpRHz+UXtuaCavAQIl4I9gc4ws3IgW4goGZTwIoSVlVzko9OsNdM833BPRUpM9SV9igSITfCkPdN9doJ0XKg17ewMA6Hdclk0FJ9CNUdRFA+9zeGa5GXny7/h5gM0mfuE5RBGM6ldhlOV6ioNyqBE1sa4QnZYdxBgsHLFzbmeY6TFqfO5fg1luidd+0d+6PID2LR65tT19BMXPkKNYyXCwCtuJslj/6grfOz8PzNwIwTBne6i0s3Gg6VecWYdSdOKNPDXJ0ZSn1XNJUSn9TZSc45WnHJh+wrf3KSGKgkUZ4TLNyMegtw0Yj84IWsB9v4+t5ByMMmb16h9Ys4HChvoOXjWNqmORxnUjH/3s7gp1kVdidtp14FvMjzve9fqYAuScL4QkajTWMPJOWNb6XP10JsM4P2PpkD3/h17J320WZfLuwcRAUUTcxBCUK/fS62yu3Hg8yXRBs4ByLjnltfPhNgojwDSZ7/E8Ff/M8FL9k7bug6ZaeBQxTZmEehkg6ECNsuMYQwbhWDY9nUnSZ2D4z88hE5RL6oJLBAR8f2m6fmUKZ9i/Lc4jtIbO92pKG2T7KBdk5pZAPKXYTkAOHxeigYifU2DVTjU7LDCMEiJ3nRjXZjM6VSDT7kWnwXRLFFkJGj947QloI7Z85RPE5fUBGxl4XxjdJuMsed7nio6QXpASMQnCeS6NwH4t+BXuDYDXPZ+m/IqjnizHsXr/1P2YFDWY82b9++nhxUIkGKsFOJmV2zcuhtdKK3cX319CA6ewkeOQCQ8isVGGF6CXdrPFEJAHxUMGw9lQDtmDW3s79hYlyyAA+1QrG8wEALn1bPYoJKtf+6Mx9qADBO38X340pliqPTs49NtbnfmIjtgKw2MNs2wyIvw9Vv186eQrCoQSEJZ8eXdYgnBjjQyGDa3aygn7kJiNwnOuyl/tBEnqtuH9sw3aGCPilvSYPTrxghhM15/8hI1FWc0oMB3UxjLnVeoJO9AvNS3OfC2APxVyLAXeJ9rqRLKjIgMzIQaPKrc49LdAIbk3WRMnE3JcsQ==",
    "X-Requested-With:  XMLHttpRequest",
    "User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Mobile Safari/537.36",
    "Content-Type:  application/json",
    "Origin:  https://www.krungthaiconnext.ktb.co.th",
    "Sec-Fetch-Site:  same-origin",
    "Sec-Fetch-Mode:  cors",
    "Sec-Fetch-Dest:  empty",
    "Referer:  https://www.krungthaiconnext.ktb.co.th/KTB-Line-Balance/depositDetail",
    "Accept-Language:  th-TH,th;q=0.9,en;q=0.8,vi;q=0.7';",
  ),
));

$response = curl_exec($curl);

curl_close($curl);



$data = json_decode($response,true);


$json = [];
$master=[];
$total_balance=[];

$balance=$data['data'][0]['endingBalance'];

array_push($total_balance, array("balance" => $balance ));


$i=0;

foreach ($data['data'] as  $value) {


echo '<pre>';
  print_r($value);
echo '</pre>';
$transAmt=$value['transAmt']; //ยอดฝาก
  $transDate=$value['transDate']; //วันที
  $transTime=$value['transTime'];  //เวลา
$transCmt=$value['transCmt']; //เลขบันชี
$transRefId=$value['transRefId']; 

$transCodeDescTh=$value['transCodeDescTh'];

$transCodeDescLongTh=$value['transCodeDescLongTh'];




preg_match_all('/.(.*?)(?=-)|TR/', $transCmt, $output_array);
$bank_name=code($output_array[0][0]);




preg_match_all('/(?<=\-).+|(?<=fr )\d{10}/', $transCmt, $output_array);
$bank_number=$output_array[0][0];


$master_date=date("Y-m-d", strtotime($transTime) );

if ($i<51) {
  array_push($json, array(
 "no" => $i,
 "transAmt" => $transAmt, 
 "transDate" => $master_date, 
 "transTime" => $transTime, 
 "transCmt" => $bank_number,  
 "bank_name" => $bank_name,
 "transRefId" => $transRefId,
 "transtype" => $transCodeDescTh,
 "trandesc" => $transCodeDescLongTh
));
}
$i++;

}

array_push($master, array(
  "total_balance" => $total_balance,
  "Transaction" => $json

));

//echo json_encode($master)

 
  // echo json_encode($response);
    $query = $mysqli->query("select * from site_settings where `key` = 'dp_deposit_below'");
    $dp_deposit_below = $query->fetch_object();

    $query = $mysqli->query("select * from site_settings where `key` = 'dp_multiple_withdraw'");
    $dp_multiple_withdraw = $query->fetch_object();

foreach($master[0]['Transaction'] as $key => $value)
{
echo '<pre>';
  print_r($value);
echo '</pre>';
        $userid = 0;
        $status = 'wait';
        $deposit_hold = 0;

        $username = '';

        $amount = str_replace(",","",$value['transAmt']);
        $date_time = $value['transDate'].' '.$value['transTime'];
        $bank_code = $value['bank_name'];


        $message = '';

        $origin = new DateTime("now");
        $target = new DateTime($date_time);



        $interval = date_diff($origin, $target);
        $timemindiff = (int)$interval->format('%r%h%i');

  // echo '<br>'.$date_time.'diff->'.$timemindiff;
      // print_r($origin);
       
        $account_number = $value['transCmt'];

        if(strpos($account_number,"~")){

        $account_number =  explode("~", $account_number);

        $account_number = $account_number[0];

        }

      ///  echo  $account_number;

        if($value['transtype']=='โอนเงินเข้า')
        {
          $queryx = $mysqli->query("select * from deposit where trans_id = '".$value['transRefId']."'");

         // echo "select * from deposit where bankweb_id = 6 and trans_id = '".$value['txHash']."'";
          $check_depositdup = $queryx->num_rows;

     
          if($check_depositdup==0){
                    
                $query = $mysqli->query("select id,username,balance,bonus from tb_users where bank = '".$bank_code."' and account_number = '".$account_number."'");
               
                    $check_user = $query->num_rows;

                    $current_user = $query->fetch_object();
                               
                    if($check_user==1){

                        $userid = $current_user->id;
                        $username = $current_user->username;
                        if($timemindiff>-5){
                          $status = 'confirmed';
                              if($current_user->balance > 5){
                                      $deposit_hold = 1;
                                      $status = 'wait';
                                      $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, ".$current_user->balance.", 0.00, ".$current_user->balance.", 'รายการฝาก KTB AUTO รอทำรายการเนื่องจากเครดิตมีมากกว่า 5', 'deposit', 'wait', 0, '')");


                                }else{



                                    if($amount>$dp_deposit_below->value){
                                      
                                      $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."',max_withdraw='9999999' WHERE id=".$userid);
                                    }else{
                                      $mysqli->query("UPDATE tb_users SET balance=balance+'".$amount."',max_withdraw='".($amount*$dp_multiple_withdraw->value)."' WHERE id=".$userid);
                                    }


                                    $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, ".$current_user->balance.", ".$amount.", ".($current_user->balance+$amount).", 'รายการฝาก KTB AUTO', 'deposit', 'success', 0, '')");

                                }
                      }else{
                              $status = 'wait';
                              $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$userid."','".$username."', CURRENT_TIMESTAMP, ".$current_user->balance.", 0.00, ".$current_user->balance.", 'รายการฝาก KTB AUTO รอตรวจสอบเนื่องจากเวลาฝากต่างเกิน 5 นาที', 'deposit', 'wait', 0, '')");
                      }
                      
                          

                    $message = '[KTB]'."\n\n".'วันที่ '.$date_time."\n".'ธนาคาร : '.$bank_code."\n".'เลขบัญชี : '.$account_number."\n".' ยอด : '.$amount."\n".' username :'.$current_user->username;

                    }else{
                      $message = '[KTB]'."\n".'วันที่ '.$date_time."\n".'ธนาคาร : '.$bank_code."\n".'เลขบัญชี : '.$account_number."\n".' ยอด : '.$amount."\n".' username : ไม่พบยูส';
                    }


                    $mysqli->query("INSERT INTO deposit(user_id, amount, status, bankweb_id, trans_id, ac_number, channel, details, date_time, deposit_mode, deposit_hold) VALUES ('".$userid."','".$amount."','".$status."','11','".$value['transRefId']."','".$account_number."','KTB AUTO','".$value['trandesc']."','".$date_time."','auto',".$deposit_hold.")");

                    


                      $message_data = array('message' => $message);
                      send_notify_message($line_api, $access_token, $message_data);

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
