<?php

require $_SERVER['DOCUMENT_ROOT'].'/seamless/config.php';
//require 'jili-function.php';

header("Content-type: application/json; charset=utf-8");


$reqData = file_get_contents('php://input');
$reqData = json_decode($reqData, true);

if (($reqData === NULL) || (count($reqData) === 0)) {
  echo json_encode([
    "errorCode" => 5,
    "message" => "Invalid parameters"
  ]);
  exit();
}

if (!isset($reqData['reqId']) || strlen($reqData['reqId']) <= 0) {
  echo json_encode([
    "errorCode" => 5,
    "message" => "Invalid parameters [reqId]"
  ]);
  exit();
} else {
}

if (!isset($reqData['token']) || strlen($reqData['token']) <= 0) {
  echo json_encode([
    "errorCode" => 5,
    "message" => "Invalid parameters [reqId]"
  ]);
  exit();
}

$reqID = $reqData['reqId'];
$token = $reqData['token'];


$query = $mysqli->query("select * from tb_users where hash = '".$token."'");

          if($query){

                if ($query->num_rows > 0) {

                    $user_data = $query->fetch_object();
                    $balance = 0;
                    $username = '';

                    if($user_data->bonus_mode==0){
                      $balance = $user_data->balance;
                      $username = $user_data->gameusername;
                    }else{
                      $balance = $user_data->bonus;
                      $username = $user_data->bonususername;
                    }
                    $mysqli->close();
                    echo json_encode([
                      "errorCode" => 0,
                      "message" => "success",
                      "username" => $username,
                      "currency" => "THB",
                      "balance" => $balance,
                      "token" => $token
                    ]);

                }else{
                    echo json_encode([
                      "errorCode" => 4,
                      "message" => "Token does not exist"
                    ]);
                    $mysqli->close();
                    exit();
                }

          }else{
                    echo json_encode([
                      "errorCode" => 5,
                      "message" => "Internal server error"
                    ]);
                    $mysqli->close();
                    exit();
       }



/*$sql = "INSERT INTO jili_trx (req_type,member_no,req_id,token,wagers_time,balance,data) VALUES ";
$sql .= "(2," . $members['member_no'] . ",'" . $reqID . "','" . $token . "','" . date('Y-m-d H:i:s') . "'," . $memberWallet['main_wallet'] . ",'" . json_encode($reqData) . "')";
$mysqli->query($sql);*/


