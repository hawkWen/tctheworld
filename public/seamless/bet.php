<?php
require 'config.php';
// Read the input stream
$body = file_get_contents("php://input");
 
// Decode the JSON object
$object = json_decode($body, true);

 $moradok_access_token = 'YWRtaW5AbW9yYWRvazg4LmNvbTpoV0Y2dG4tc0NNTXAtYjN6VURuLVVaUTh3';
$bet_db_api = 'http://play.moradok88.com/sximoapi?module=bet';
//print_r($object['username']);

if($object['username']!='')
{

    if(strpos($object['username'],"bonus"))
    {
        $query = $mysqli->query("select id,bonus from tb_users where bonususername = '".$object['username']."'");
        $user_balance_first = $query->fetch_object();

        $update_balance=0;
        $update_balance = $user_balance_first->bonus-floatval(abs($object['amount']));
        if($update_balance>=0)
        {


            
             /* $query = $mysqli->query("select roundId from bettransections where type = 'BET' and user_id = '".$user_balance_first->id."' and roundId = '".$object['roundId']."'");
              $checknumrows = $query->num_rows;
              $checkduplicate = $query->fetch_object();*/

             /* if($checknumrows==0){*/


                      $querypro = $mysqli->query("select game_type from promotions_current_user where user_id = '".$user_balance_first->id."'");
                      $selectpromotion = $querypro->fetch_object();

                      if((abs($object['amount'])>49&&$selectpromotion->game_type=='SLOT')||($object['category']=='FISHING'&&$selectpromotion->game_type=='SLOT'))
                      {
    


                            $message_data = array(
                                    'status' => array(
                                      'code' => 800,
                                      'message' => 'Balance insufficient'
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
                                  exit();

                        

                       }else{


                            //$mysqli->query("INSERT INTO bettransections(user_id, username, agent, `type`, amount, product, category, gameName, roundId, refId, `timestamp`, bal_after, bal_before) VALUES ('".$user_balance_first->id."','".$object['username']."','".$object['agent']."','".$object['type']."','".$object['amount']."','".$object['product']."','".$object['category']."','".$object['gameName']."','".$object['roundId']."','".$object['refId']."','".$object['timestamp']."','".$user_balance_first->bonus."','".$update_balance."')");

               

                              $mysqli->query("UPDATE tb_users SET bonus = '".$update_balance."' WHERE id = '".$user_balance_first->id."'");
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
                                  echo json_encode($message_data);

                       } 
                 
                  
                      
                       /* 

                }else{

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

            $message_data = array(
              'status' => array(
                'code' => 800,
                'message' => 'Balance insufficient'
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

        }


    }else{
      $query = $mysqli->query("select id,balance from tb_users where gameusername = '".$object['username']."'");

      $user_balance_first = $query->fetch_object();

      $update_balance=0;
        $update_balance = $user_balance_first->balance-floatval(abs($object['amount']));
        if($update_balance>=0)
        {


            
  /*            $query = $mysqli->query("select roundId from bettransections where type = 'BET' and user_id = '".$user_balance_first->id."' and roundId = '".$object['roundId']."'");
              $checknumrows = $query->num_rows;
              $checkduplicate = $query->fetch_object();

              if($checknumrows==0){*/


                    if($object['gameName']=='Baccarat'||$object['gameName']=='DragonTiger'){
    


                            $message_data = array(
                                    'status' => array(
                                      'code' => 800,
                                      'message' => 'Balance insufficient'
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
                                  exit();

                        

                    }else{

                       
                 
                  
                     // $mysqli->query("INSERT INTO bettransections(user_id, username, agent, `type`, amount, product, category, gameName, roundId, refId, `timestamp`, bal_after, bal_before) VALUES ('".$user_balance_first->id."','".$object['username']."','".$object['agent']."','".$object['type']."','".$object['amount']."','".$object['product']."','".$object['category']."','".$object['gameName']."','".$object['roundId']."','".$object['refId']."','".$object['timestamp']."','".$user_balance_first->balance."','".$update_balance."')");

               

                      $mysqli->query("UPDATE tb_users SET balance = '".$update_balance."' WHERE id = '".$user_balance_first->id."'");
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
                          echo json_encode($message_data);
                    }

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

        }else{  

            $message_data = array(
              'status' => array(
                'code' => 800,
                'message' => 'Balance insufficient'
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

        }
    }
    



   
    //$wallet_api = 'http://play.moradok88.com/sximoapi/'.$user_balance_first->id.'?module=balance'&&$object['amount']<floatval(abs(50))
        
}

function send_bet_db_api($bet_db_api,$moradok_access_token, $bet_trans_data){
   $headers = array('Method: POST', 'Content-type: application/json', 'Authorization: Basic '.$moradok_access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $bet_db_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $bet_trans_data);
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
/*function update_wallet_api($wallet_api,$moradok_access_token, $update_wallet_data){
   $headers = array('Method: PUT', 'Content-type: application/json', 'Authorization: Basic '.$moradok_access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $wallet_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $update_wallet_data);
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