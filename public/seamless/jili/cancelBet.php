<?php
require $_SERVER['DOCUMENT_ROOT'].'/seamless/config.php';
//require 'jili-function.php';

header("Content-type: application/json; charset=utf-8");

// $reqData = $_REQUEST ?? $_POST ?? $_GET ?? NULL;
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

$token = '';

if (array_key_exists('token', $reqData)) {
  if (!isset($reqData['token']) || strlen($reqData['token']) <= 0) {
    echo json_encode([
      "errorCode" => 5,
      "message" => "Invalid parameters [reqId]"
    ]);
    $mysqli->close();
    exit();
  }
  $token = $reqData['token'];
}

$reqID = $reqData['reqId'];

$sql = "SELECT * FROM jilibetpayout WHERE bettype='CANCEL' AND round=" . $reqData['round'];
$res = $mysqli->query($sql);
if ($res->num_rows > 0) {
  echo json_encode([
    "errorCode" => 1,
    "message" => "Already canceled"
  ]);
  $mysqli->close();
  exit();
}

$sql = "SELECT * FROM jilibetpayout WHERE round=" . $reqData['round'];
$res = $mysqli->query($sql);
if ($res->num_rows <= 0) {
  echo json_encode([
    "errorCode" => 2,
    "message" => "Round not found"
  ]);
  $mysqli->close();
  exit();
}

$res = $res->fetch_assoc();
$userId = $res['userId'];
$specialBet = 0;
$query = $mysqli->query("select * from tb_users where hash = '".$token."'");
$balance = 0;
$username = '';
$bonus_mode = 0;
 $requserid = '';
if($query)
{

                if ($query->num_rows > 0) {

                        $user_data = $query->fetch_object();
                        

                        if($user_data->bonus_mode==0){
                          $balance = $user_data->balance;
                          $username = $user_data->gameusername;
                          $bonus_mode = 0;
                        }else{
                          $balance = $user_data->bonus;
                          $username = $user_data->bonususername;
                          $bonus_mode = 1;
                        }


                          

                       

                    
                          $betAmount = $reqData['betAmount'];
                          $winloseAmount = $reqData['winloseAmount'];
                          $refundAmount = 0;
                          $balRemain = 0;


                           $update_balance = floatval($balance);
                       /*   if($bonus_mode==1){
                            $mysqli->query("UPDATE tb_users SET bonus = '".$update_balance."' WHERE id = '".$user_data->id."'");
                          
                          }else{
                            $mysqli->query("UPDATE tb_users SET balance = '".$update_balance."' WHERE id = '".$user_data->id."'");
            
                          }*/

                          

                          // Convert unix time to DateTime
                          date_default_timezone_set("Asia/Bangkok");
                         // $dtTemp = gmdate("Y-m-d H:i:s", $reqData['wagersTime']);
                          $now = new DateTime();
                          $now->add(new DateInterval("PT7H"));  // Adding 7 hrs.
                          $dateTime = $now->format("Y-m-d H:i:s");

                          $date = new DateTime();
                          $txId = $date->getTimestamp();


                          if(!empty($reqData['userId'])){


                          $requserid = $reqData['userId'];

                          }

                          
                      
                          $sql = "INSERT INTO jilibetpayout (bettype,reqId,token,currency,game,round,wagersTime,betAmount,winloseAmount,balancebefore,currentbalance,isFreeRound,userId,jsondata,txId) VALUES ";
                          $sql .= "('CANCEL','" . $reqID . "','" . $token . "','THB'," . $reqData['game'] . "," . $reqData['round'] . ",'".$txId."'," . $betAmount . "," . $winloseAmount . "," . $balance . "," . $update_balance . ",0,'". $user_data->id ."','" . json_encode($reqData) . "','".$txId."')";

                          if (!$mysqli->query($sql)) {
                              echo("Error description: " . $mysqli->error);
                            }


                         // userTO($user_data->id,'cancel','jl',$betAmount,$winloseAmount,$mysqli);

                         
                        

                         //  game_histories($user_data->id,$username,$reqData['game'],'jl',$reqData['round'],$betAmount,$winloseAmount,$balance,$update_balance,'cancel',$specialBet,$mysqli);

                          $arr = array(
                            "errorCode" => 0,
                            "message" => "success",
                            "username" => $username,
                            "currency" => "THB",
                            "balance" => (float)$update_balance,
                            "txId" => $txId
                          );
                          $mysqli->close();

                          echo json_encode($arr);




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






