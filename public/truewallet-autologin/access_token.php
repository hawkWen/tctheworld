<?php
define( 'BLOCK_LOAD', true );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
  require "getotp/readsms.php";
  require "twapi/twa.php";

$wpdb = new wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

  

  $sql_access_token = $wpdb->get_results("select * from access_token where token_id = 1");
  echo '<pre> access_token';
  print_r($sql_access_token);
   echo '</pre>';
  $access_token = $sql_access_token[0]->access_token;
  $otp = $sql_access_token[0]->otp;
  $refotp = $sql_access_token[0]->otp_ref;
  exit();

  if($otp==0){
     $tw = new TrueWallet("nnicha585@gmail.com", "nngwhn486");//Login

     $loginOtp = $tw->RequestLoginOTP();
     echo '<pre> login otp';
     print_r($tw);
    print_r($loginOtp);
     echo '</pre>';
     $wpdb->query( $wpdb->prepare("UPDATE access_token SET otp=1,otp_ref='".$loginOtp['data']['otp_reference']."' WHERE token_id=1") );
  }elseif($otp==1){

      $sms = new ReadSMS('o.NqIKskIomrvDuVMi1HFBu7qqIU73jcnh');
      print_r($sms);
        $iden = $sms->DevicesList()["devices"][0]["iden"];
        $data = ($sms->GetTrueWalletOTP($iden));
        print_r($data);
        $ref = $data["ref"];
        $otp = $data["otp_code"];
        print_r($data);

   if($refotp==$ref){
        $tw = new TrueWallet("nnicha585@gmail.com", "nngwhn486");//Login
        $result = $tw->SubmitLoginOTP($otp, "0990968605", $ref);
        echo '<br>';
        echo '<br>';
        print_r($result);
    	  if($result['code']=='MAS-400'){
          $wpdb->query( $wpdb->prepare("UPDATE access_token SET otp= 0 WHERE token_id=1") );
        }else{
          $access_token =0;
          if($result['data']['access_token'] != null){
            $access_token = $result['data']['access_token'];
          }else{
            $access_token = 0;
          }

          $sql_access_token = $wpdb->get_results("select access_token from access_token where token_id = 1");
         // print_r($sql_access_token);
          if($access_token != $sql_access_token[0]->access_token && $access_token != 0){
           // $insert_access_token = "UPDATE access_token SET access_token= '".$access_token."' WHERE token_id=1";
            $wpdb->query( $wpdb->prepare("UPDATE access_token SET access_token= '".$access_token."',otp=2 WHERE token_id=1") );
          }
        }
    }
       
  }elseif($otp==2){
    //  $wpdb->query( $wpdb->prepare("UPDATE otp SET otp= 0 WHERE token_id=1") );

      $tw = new TrueWallet("nnicha585@gmail.com", "nngwhn486");//Login
      $tw->setAccessToken($access_token);
      $data = $tw->GetTransaction();
     /* echo "<pre>";
      print_r($data);
      echo "</pre>";*/
      if($data['code']=='MAS-401'){
          $wpdb->query( $wpdb->prepare("UPDATE access_token SET otp= 0 WHERE token_id=1") );
      }else{

            $line_api = 'https://notify-api.line.me/api/notify';
            $access_token = 'UUFSVSYMuFpimwWvRFoV5e5fej0UMuSgVHcG2PO4us6';
            $kbank_trans_data = array();
            $moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';

            $kbank_db_api = 'http://play.moradok88.com/sximoapi?module=truewallettrans';
            $kbank_db_api_today = 'http://play.moradok88.com/sximoapi?module=truewallettrans';
           // $slip = $_POST['slip'];
            $deposit_api = 'http://play.moradok88.com/sximoapi?module=deposit';

            $todayData  = get_kbank_db_api($kbank_db_api_today,$moradok_access_token);
           // echo '<pre>';print_r($kk);echo '</pre>';
           /// echo '<pre>';print_r($todayData);echo '</pre>';
            $unst = array();
            if(is_array($data)&&is_array($todayData)){

              $kk =$data["data"]["activities"];

              foreach ($kk as $key => $value){

             // echo $value['Date/Time']; echo '<br>';
                 foreach ($todayData['rows'] as $keyp => $valuep){
               if($valuep['amount']==str_replace(['+','-',','],'',$value['amount'])&&$valuep['date']==$value['date_time']&&$valuep['phone']==str_replace('-','',$value['sub_title']))
                  {   
                   $unst[$key]=1;
                   // echo $kk[$key]['Date/Time'].' '.$kk[$key]['A/C Number'];
                  }
                }
              }

            //echo $key;

             foreach ($kk as $key => $value) {
                  if($unst[$key]!=1){
                        $clientphone = str_replace('-','',$kk[$key]['sub_title']);
                        $kkphone = $clientphone;
                        $kkamount = str_replace(['+','-',','],'',$kk[$key]['amount']);
                        $kbank_trans_data = array(
                        'phone' => $kkphone,
                        'name' => $kk[$key]['type'],
                        'date' => $kk[$key]['date_time'],
                        'amount' => $kkamount
                      );

                     send_kbank_db_api($kbank_db_api,$moradok_access_token,json_encode($kbank_trans_data));

                     if($value['type']=='โอนเงิน'||$value['type']=='เติมเงิน Wallet'){


                       $kkphone = ltrim($kkphone, '0');


             $acid = $wpdb->get_results("select a.user_id from pg_usermeta a inner join pg_usermeta b on a.user_id = b.user_id
WHERE a.meta_key = 'mobile_phone' and a.meta_value like '%".$kkphone."%'");
                       $true_lastid = $wpdb->get_results("select id from truewallet_trans order by id desc limit 1");
                       $aid = 0;
                       $status = 'wait';
                       if($acid[0]->user_id!=''){
                          $acid = $acid[0]->user_id;
                          $status = 'confirmed';
                $wpdb->query($wpdb->prepare("UPDATE tb_users SET balance=balance+'".$kkamount."' WHERE id=".$aid));
                       }else{
                          $acid = '';
                          $status = 'wait';
                       }
                       $deposit_data = array(
                          'user_id' => $aid,
                          'amount' => $kkamount,
                          'bankweb_id' => 2,
                          'trans_id' => $true_lastid[0]->id,
                          'date_time' => $kk[$key]['date_time'],
                          'ac_number' => $clientphone,
                          'details' => $kk[$key]['type'],
                          'channel' => 'Truewallet',
                          'status' => $status,
                          'given_credit' => $kkamount
                          
                        );

                       send_kbank_db_api($deposit_api,$moradok_access_token,json_encode($deposit_data));


                       $message = '[truewallet]'."\n\n".'มีลูกค้าโอนมา '.$kk[$key]['date_time']."\n\n".'เบอร์ : '.$kk[$key]['sub_title']."\n\n".' ยอดเงิน : '.$kk[$key]['amount'];
                       $message_data = array(
                        'message' => $message
                      );
                      send_notify_message($line_api, $access_token, $message_data);
                      }
              //  }
                }
              }
            }

      }
        
  }

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
