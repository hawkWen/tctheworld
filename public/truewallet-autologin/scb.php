<?php

  require "getotp/readsms.php";


      $sms = new ReadSMS('o.NqIKskIomrvDuVMi1HFBu7qqIU73jcnh');
    
        $iden = $sms->DevicesList()["devices"][0]["iden"];
        $data = ($sms->GetSCBTransections($iden));

        echo '<pre>';
        print_r($data);
        echo '</pre>';
/*
        $line_api = 'https://notify-api.line.me/api/notify';
        $access_token = 'UUFSVSYMuFpimwWvRFoV5e5fej0UMuSgVHcG2PO4us6';
        $scb_trans_data = array();
        $moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';

        $scb_db_api = 'http://play.moradok88.com/sximoapi?module=scbtrans';
           // $slip = $_POST['slip'];
        $deposit_api = 'http://play.moradok88.com/sximoapi?module=deposit';


        $scb_lastid = $wpdb->get_results("select id,id_ref from scb_trans order by id desc limit 1");
        print_r($scb_lastid);
        if(empty($scb_lastid)||($scb_lastid[0]->id_ref!=$data['id_ref']&&$scb_lastid[0]->id_ref!=0)){
       //   echo '111';
          $scb_trans_data = array(
                              "date_time" => $data['date'].'/'.date('Y').' '.$data['time'],
                              "amount" => $data['amount'],
                              "bank_code" => $data['bank_code'],
                              "account_number" => $data['account_number'],
                              "to_acc" => $data['to_acc'],
                              "id_ref" => $data['id_ref']
                            );

          send_scb_db_api($scb_db_api,$moradok_access_token,json_encode($scb_trans_data));


          $bank_id = $wpdb->get_results("select bank_id from banks where bankcode = '".$data['bank_code']."'");

        //  print_r($bank_id);

        $acid = $wpdb->get_results("select a.user_id from pg_usermeta a inner join pg_usermeta b on a.user_id = b.user_id
WHERE (a.meta_key = 'bank_number' and a.meta_value like '%".$data['account_number']."%') and (b.meta_key = 'bank_n' and b.meta_value = '".$bank_id[0]->bank_id."')");


       // print_r($acid);

             $aid = 0;
             $status = 'wait';
             if($acid[0]->user_id!=''){
                $aid = $acid[0]->user_id;
                $status = 'confirmed';
               // echo "UPDATE tb_users SET balance=balance+'".$data['amount']."' WHERE id=".$aid;
                $wpdb->query($wpdb->prepare("UPDATE tb_users SET balance=balance+'".$data['amount']."' WHERE id=".$aid));
             }else{
                $aid = '';
                $status = 'wait';
             }

                          $scb_last_trans_id = $wpdb->get_results("select id from scb_trans order by id desc limit 1");
                 

                           $deposit_data = array(
                              'user_id' => $aid,
                              'amount' => $data['amount'],
                              'bankweb_id' => 3,
                              'trans_id' => $scb_last_trans_id[0]->id,
                              'date_time' => $data['date'].'/'.date('Y').' '.$data['time'],
                              'ac_number' => $data['account_number'],
                              'details' => $data['bank_code'],
                              'channel' => 'SCB',
                              'status' => $status,
                              'given_credit' => $data['amount']
                            );

                           send_scb_db_api($deposit_api,$moradok_access_token,json_encode($deposit_data));

                           $message = '[SCB]'."\n\n".'มีลูกค้าโอนมา '.$data['date'].'/'.date('Y').' '.$data['time']."\n\n".'ธนาคาร : '.$data['bank_code']."\n\n".'เลขบัญชี : '.$data['account_number']."\n\n".' ยอดเงิน : '.$data['amount']."\n\n".'เข้าบัญชี '.$data['to_acc'];
                           $message_data = array(
                            'message' => $message
                          );
                          send_notify_message($line_api, $access_token, $message_data);
  }
                       


                       */


function send_scb_db_api($scb_db_api,$moradok_access_token, $scb_trans_data){
   $headers = array('Method: POST', 'Content-type: application/json', 'Authorization: Basic '.$moradok_access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $scb_db_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $scb_trans_data);
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
/*
  $sql_access_token = $wpdb->get_results("select * from access_token where token_id = 1");
  //print_r($sql_access_token);
  $access_token = $sql_access_token[0]->access_token;
  $otp = $sql_access_token[0]->otp;
  $refotp = $sql_access_token[0]->otp_ref;

  if($otp==0){
     $tw = new TrueWalletClass("nnicha585@gmail.com", "attapong9665");//Login
     $loginOtp = $tw->RequestLoginOTP();

    // print_r($loginOtp);
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
        $tw = new TrueWalletClass("nnicha585@gmail.com", "attapong9665");//Login
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

      $tw = new TrueWalletClass("nnicha585@gmail.com", "attapong9665");//Login
      $tw->setAccessToken($access_token);
      $data = $tw->GetTransaction();
     /* echo "<pre>";
      print_r($data);
      echo "</pre>";*/
   /*   if($data['code']=='MAS-401'){
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
                   
                       $acid = $wpdb->get_results("select id from tb_users where phone like '%".$kkphone."%'");
                       $true_lastid = $wpdb->get_results("select id from truewallet_trans order by id desc limit 1");
                        
                       if($acid[0]->id!=''){
                          $acid = $acid[0]->id;
                       }else{
                          $acid = '';
                       }
                       $deposit_data = array(
                          'user_id' => $acid,
                          'amount' => $kkamount,
                          'bankweb_id' => 2,
                          'trans_id' => $true_lastid[0]->id,
                          'date_time' => $kk[$key]['date_time'],
                          'ac_number' => $clientphone,
                          'details' => $kk[$key]['type'],
                          'channel' => 'Truewallet'
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
}*/
?>
