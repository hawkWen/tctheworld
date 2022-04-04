<?php 
//require 'config.php';
require_once("KasikornBank.class.php");
$username = 'tctheworld';
$password = '4Ko6my9013!';
$kbank = new KasikornBank($username, $password);

// Check if the session in the cookie is still valid. If not, then login again.
if (!$kbank->CheckSession()) {
	$kbank->Login();
}

print_r($kbank);
//function GetStatement ($account_number, $start_date = null, $end_date = null, $retry_login = true, $retry_token = true)
// Get Today's Statement.
//$kk = $kbank->GetTodayStatement("075-3-94018-9");function GetStatement
date_default_timezone_set("Asia/Bangkok");
echo date("Y-m-d H:i:s");
$kk = $kbank->GetTodayStatement("042-1-93422-3");
    /*[Date/Time] =&gt; 16/11/20 01:50:03
    [Channel] =&gt; Moblie
    [Transaction Type] =&gt; Cheque/Money Transfer NB
    [Withdrawal (THB)] =&gt; 
    [Deposit (THB)] =&gt; 1.00
    [A/C Number] =&gt; xxx-2-65674-x
    [Details] =&gt; K PLUS

print_r($kk[0]['Date/Time']);
echo '<pre>';
print_r($kk);
echo '</pre>';*/
echo '<pre>';
print_r($kk);
echo '</pre>';
  /*  $line_api = 'https://notify-api.line.me/api/notify';
    $access_token = 'UUFSVSYMuFpimwWvRFoV5e5fej0UMuSgVHcG2PO4us6';
    $kbank_trans_data = array();
    $moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';

    $kbank_db_api = 'http://play.moradok88.com/sximoapi?module=kbanktrans';
    $kbank_db_api_today = 'http://play.moradok88.com/sximoapi?module=todaydata';
    $deposit_api = 'http://play.moradok88.com/sximoapi?module=deposit';
   // $slip = $_POST['slip'];

    $todayData  = get_kbank_db_api($kbank_db_api_today,$moradok_access_token);
   // echo '<pre>';print_r($kk);echo '</pre>';
   // echo 'todayData';
    echo '<pre>';print_r($todayData);echo '</pre>';
    $unst = array();
    if(is_array($kk)&&is_array($todayData)){

      foreach ($kk as $key => $value){

     // echo $value['Date/Time']; echo '<br>';
    	   foreach ($todayData['rows'] as $keyp => $valuep){
    		  if($valuep['date']==$value['Date/Time']&&$valuep['ac_number']==$value['A/C Number'])
    		  {   
    			 $unst[$key]=1;
           // echo $kk[$key]['Date/Time'].' '.$kk[$key]['A/C Number'];
      		}
      	}
      }



    //echo $key;

      foreach ($kk as $key => $value) {
      		if($unst[$key]!=1){
              $amountdeposit = str_replace(',','',$kk[$key]['Deposit (THB)']);
    	    	    $kbank_trans_data = array(
    			    	'date' => $kk[$key]['Date/Time'],
    			    	'channel' => $kk[$key]['Channel'],
    			    	'type' => $kk[$key]['Transaction Type'],
    			    	'withdrawal' => str_replace(',','',$kk[$key]['Withdrawal (THB)']),
    			    	'deposit' => $amountdeposit,
    			    	'ac_number' => $kk[$key]['A/C Number'],
    			    	'details' => $kk[$key]['Details']
    			    );

    			   send_kbank_db_api($kbank_db_api,$moradok_access_token,json_encode($kbank_trans_data));

                         

    			   if($value['Withdrawal (THB)']==''){


              $acnum = '';
              
             if($kk[$key]['A/C Number']!=''){
           //  $acnum = 'a';
                   $acnum = str_replace(['x','-'],'',$kk[$key]['A/C Number']);
              }else{
                   $acnum = 'nono';
              }
           //  $acnum = str_replace('-','',$acnum);
             $acid = $wpdb->get_results("select a.user_id from pg_usermeta a inner join pg_usermeta b on a.user_id = b.user_id
WHERE (a.meta_key = 'bank_number' and a.meta_value like '%".$acnum."%') and (b.meta_key = 'bank_n' and b.meta_value = 1)");
             $kbank_lastid = $wpdb->get_results("select id from kbank_trans order by id desc limit 1");
             $aid = 0;
             $status = 'wait';
             if($acid[0]->user_id!=''){
                $aid = $acid[0]->user_id;
                $status = 'confirmed';
                $wpdb->query($wpdb->prepare("UPDATE tb_users SET balance='".$amountdeposit."' WHERE id=".$aid));
             }else{
                $aid = '';
                $status = 'wait';
             }

             $deposit_data = array(
                  'user_id' => $aid,
                  'amount' => $amountdeposit,
                  'bankweb_id' => 1,
                  'trans_id' => $kbank_lastid[0]->id,
                  'date_time' => $kk[$key]['Date/Time'],
                  'ac_number' => $kk[$key]['A/C Number'],
                  'details' => $kk[$key]['Details'],
                  'channel' => $kk[$key]['Channel'],
                  'status' => $status,
                  'given_credit' => $amountdeposit
                  
                );
             send_kbank_db_api($deposit_api,$moradok_access_token,json_encode($deposit_data));




    				   $message = "\n\n".'มีลูกค้าโอนมา '.$kk[$key]['Date/Time']."\n\n".'ช่องทาง : '.$kk[$key]['Channel']." - ".$kk[$key]['Details']."\n\n".' เลขบัญชี : '.$kk[$key]['A/C Number']."\n\n".' ยอดเงิน : '.$kk[$key]['Deposit (THB)'];
    				   $message_data = array(
    						'message' => $message
    					);
    			  	send_notify_message($line_api, $access_token, $message_data);
    				  }
  		//	}
        }
      }

  }

   // $message = "\n\n".'มีลูกค้าโอนมา '.$kk[0]['Date/Time']."\n\n".'ช่องทาง : '.$kk[0]['Channel']." - ".$kk[0]['Details']."\n\n".' เลขบัญชี : '.$kk[0]['A/C Number']."\n\n".' ยอดเงิน : '.$kk[0]['Deposit (THB)'];    //text max 1,000 charecter
 

   // $message_data = array(
   // 	'message' => $message
   // );

    //$result = send_notify_message($line_api, $access_token, $message_data);

    //print_r($result);
/*-------------line noti----------------------*/
function send_kbank_db_api($kbank_db_api,$moradok_access_token, $kbank_trans_data){
   $headers = array('Method: POST', 'Content-type: application/json', 'Authorization: Basic '.$moradok_access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $kbank_db_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $kbank_trans_data);
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

function get_kbank_db_api($kbank_db_api_today,$moradok_access_token){
   $headers = array('Method: GET', 'Authorization: Basic '.$moradok_access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $kbank_db_api_today);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
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