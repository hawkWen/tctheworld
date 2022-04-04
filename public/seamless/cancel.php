<?php
require 'config.php';

// Read the input stream
$body = file_get_contents("php://input");
 
// Decode the JSON object
$object = json_decode($body, true);


//print_r($object['username']);

if($object['username']!=''){

  if(strpos($object['username'],"bonus")){

    $query = $mysqli->query("select id,bonus from tb_users where bonususername = '".$object['username']."'");
    $user_balance_first = $query->fetch_object();

    $moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';
    $cancel_db_api = 'http://play.moradok88.com/sximoapi?module=cancel';
    $update_balance=0;
    $update_balance = $user_balance_first->bonus;

        /*    $query = $mysqli->query("select roundId from bettransections where type = 'CANCEL' and user_id = '".$user_balance_first->id."'  and roundId = '".$object['roundId']."'");
            $checknumrows = $query->num_rows;
            $checkduplicate = $query->fetch_object();
   // if($checkduplicate['data']=='success'){
    if($checknumrows==0){*/
      
      
               // $mysqli->query("INSERT INTO bettransections(user_id, username, agent, `type`, amount, product, category, gameName, roundId, refId, `timestamp`, bal_after, bal_before) VALUES ('".$user_balance_first->id."','".$object['username']."','".$object['agent']."','".$object['type']."','".$object['amount']."','".$object['product']."','".$object['category']."','".$object['gameName']."','".$object['roundId']."','".$object['refId']."','".$object['timestamp']."','".$user_balance_first->bonus."','".$update_balance."')");

                //$user_balance = $wpdb->get_results("select balance from tb_users where id = ".$user_balance_first->id);
               // $mysqli->query("UPDATE tb_users SET balance = '".$update_balance."' WHERE id = '".$user_balance_first->id."'");
                
                $message_data = array(
                  'status' => array(
                    'code' => 0,
                    'message' => 'Success'
                  ),
                  'data' => array(
                    'username' => $object['username'],
                    'wallet' => 
                      array(
                          'balance' => floatval($update_balance),
                          'lastUpdate' => $object['timestamp']
                      ),
                    'balance' =>
                      array(
                          'before' => floatval($user_balance_first->bonus),
                          'after' => floatval($update_balance)
                      ),
                    'refId' => $object['refId']

                  )
                );
            /*-------------line noti----------------------*/
            echo json_encode($message_data);
       /*}else{

            $message_data = array(
              'status' => array(
                'code' => 806,
                'message' => 'Duplicate Round Id'
              ),
              'data' => array(
                'username' => $object['username'],
                'wallet' => 
                  array(
                      'balance' => floatval($user_balance_first->bonus),
                      'lastUpdate' => $object['timestamp']
                  ),
                'balance' =>
                  array(
                      'before' => floatval($user_balance_first->bonus),
                      'after' => floatval($user_balance_first->bonus)
                  ),
                'refId' => $object['refId']

              )
            );
            echo json_encode($message_data);

        }*/


  }else{
        $query = $mysqli->query("select id,balance from tb_users where gameusername = '".$object['username']."'");
    $user_balance_first = $query->fetch_object();

    $moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';
    $cancel_db_api = 'http://play.moradok88.com/sximoapi?module=cancel';
    $update_balance=0;
    $update_balance = $user_balance_first->balance;

           /* $query = $mysqli->query("select roundId from bettransections where type = 'CANCEL' and user_id = '".$user_balance_first->id."'  and roundId = '".$object['roundId']."'");
            $checknumrows = $query->num_rows;
            $checkduplicate = $query->fetch_object();
   // if($checkduplicate['data']=='success'){
    if($checknumrows==0){*/
      
      
               // $mysqli->query("INSERT INTO bettransections(user_id, username, agent, `type`, amount, product, category, gameName, roundId, refId, `timestamp`, bal_after, bal_before) VALUES ('".$user_balance_first->id."','".$object['username']."','".$object['agent']."','".$object['type']."','".$object['amount']."','".$object['product']."','".$object['category']."','".$object['gameName']."','".$object['roundId']."','".$object['refId']."','".$object['timestamp']."','".$user_balance_first->balance."','".$update_balance."')");

                //$user_balance = $wpdb->get_results("select balance from tb_users where id = ".$user_balance_first->id);
               // $mysqli->query("UPDATE tb_users SET balance = '".$update_balance."' WHERE id = '".$user_balance_first->id."'");
                
                $message_data = array(
                  'status' => array(
                    'code' => 0,
                    'message' => 'Success'
                  ),
                  'data' => array(
                    'username' => $object['username'],
                    'wallet' => 
                      array(
                          'balance' => floatval($update_balance),
                          'lastUpdate' => $object['timestamp']
                      ),
                    'balance' =>
                      array(
                          'before' => floatval($user_balance_first->balance),
                          'after' => floatval($update_balance)
                      ),
                    'refId' => $object['refId']

                  )
                );
            /*-------------line noti----------------------*/
            echo json_encode($message_data);
    /*   }else{

            $message_data = array(
              'status' => array(
                'code' => 806,
                'message' => 'Duplicate Round Id'
              ),
              'data' => array(
                'username' => $object['username'],
                'wallet' => 
                  array(
                      'balance' => floatval($user_balance_first->balance),
                      'lastUpdate' => $object['timestamp']
                  ),
                'balance' =>
                  array(
                      'before' => floatval($user_balance_first->balance),
                      'after' => floatval($user_balance_first->balance)
                  ),
                'refId' => $object['refId']

              )
            );
            echo json_encode($message_data);

        }*/
  }
}

function send_cancel_db_api($cancel_db_api,$moradok_access_token, $cancel_trans_data){
   $headers = array('Method: POST', 'Content-type: application/json', 'Authorization: Basic '.$moradok_access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $cancel_db_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $cancel_trans_data);
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