<?php
define( 'BLOCK_LOAD', true );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );

//$photo=$_GET["photo"];
     //$photo = 'https://moradok88.com/slips/images-1.jpeg';
/*-------------line noti----------------------*/
    $line_api = 'https://notify-api.line.me/api/notify';
    $access_token = 'pVEMDgwigdHylh0kx1BBJs3NNfyg47Ip2bLkgf3XvBD';
  //  $slip = $_POST['slip'];
      //text max 1,000 charecter
  //  $image_thumbnail_url = 'https://moradok88.com/slips/images-1.jpeg';  // max size 240x240px JPEG
   // $image_fullsize_url = $photo; //max size 1024x1024px JPEG
    //$imageFile = 'images-1.jpeg';
 //   $imageFile = new CurlFile('/home1/moradk88/public_html/slips/'.$slip);
   // $sticker_package_id = '';  // Package ID sticker
   // $sticker_id = '';    // ID sticker


    $sumdeposit = $wpdb->get_results("SELECT DATE_FORMAT(date, '%d-%m-%Y') as date,total_web,lost_credits,nopro,rows_deposit FROM `deposit_summary` limit 1");

    $totalgap = $sumdeposit[0]->total_web;


$message = 'ยอดรวมวันที่ '.$sumdeposit[0]->date.' เวลา '.date('h:i')."\n".
'จำนวนครั้งที่ฝาก : '.$sumdeposit[0]->rows_deposit.' ครั้ง'."\n".
'จำนวนครั้งที่ถอน : x ครั้ง'."\n".
'ยอดฝาก : '.number_format($sumdeposit[0]->total_web,2).' บาท'."\n".
'ยอดถอน : 0.00 บาท'."\n".
'กำไรสุทธิ : '.number_format($totalgap,2).' บาท'."\n".
'เสียเครดิตไป : '.number_format($sumdeposit[0]->lost_credits,2).' เครดิต'."\n\n".

'ไม่รับโปรจำนวน : '.$sumdeposit[0]->nopro.' ครั้ง'."\n".
'รับโปร 99/300 : 0 ครั้ง'."\n".
'รับโปร 10/100 : 0 ครั้ง'."\n".
'รับโปรอื่น : 0 ครั้ง'."\n";

    //$message = 'ยอดรวมวันที่ '.$sumdeposit[0]->date."\n".'จำนวนฝากทั้งหมด : '.$sumdeposit[0]->rows_deposit.' ครั้ง'."\n".'ยอดฝากทั้งหมด : '.number_format($sumdeposit[0]->total_web,2).' บาท'."\n".'ยอดถอนทั้งหมด : 0.00'.' บาท'."\n".'ส่วนต่าง : '.number_format($totalgap,2).' บาท'."\n".'เสียเครดิตไป : '.number_format($sumdeposit[0]->lost_credits,2).' เครดิต'."\n".'ไม่รับโปรจำนวน : '.$sumdeposit[0]->nopro.' ครั้ง'."\n".'รับโปร 99/100 : 0 ครั้ง';  
   // print_r($message);
    $message_data = array(
        'message' => $message
    );

    $result = send_notify_message($line_api, $access_token, $message_data);

    print_r($result);
/*-------------line noti----------------------*/



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