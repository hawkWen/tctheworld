<?php
require 'config.php';
// Read the input stream
$body = file_get_contents("php://input");
 
// Decode the JSON object
$object = json_decode($body, true);

set_time_limit(30);

if(isset($object['username'])){

  $balance = '';

  if(strpos($object['username'],"bonus")){
    $query = $mysqli->query("select id,bonus from tb_users where bonususername = '".$object['username']."'");

    $user_bonus = $query->fetch_object();

    $balance =  floatval($user_bonus->bonus);

  }else{
    $query = $mysqli->query("select id,balance from tb_users where gameusername = '".$object['username']."'");

    $user_balance = $query->fetch_object();

    $balance =  floatval($user_balance->balance);
  }
  
//  $user_balance = $query->fetch_object();
    

    $message_data = array(
      'status' => array(
	      'code' => 0,
	      'message' => 'Success'
	    ),
      'data' => array(
	      'balance' => $balance
	    )
    );
/*-------------line noti----------------------*/


  
    echo json_encode($message_data);



}



?>