<?php
require $_SERVER['DOCUMENT_ROOT'].'/seamless/config.php';
// /require 'jili-function.php';

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

if (!isset($reqData['token']) || strlen($reqData['token']) <= 0) {
  echo json_encode([
    "errorCode" => 5,
    "message" => "Invalid parameters [reqId]"
  ]);
  exit();
}

$reqID = $reqData['reqId'];
$token = $reqData['token'];
$specialBet = 0;
$requserid = '';
if ($reqData['betAmount'] == 0 && !empty($reqData['isFreeRound']) && $reqData['isFreeRound'] === true) {
  $specialBet = 1;
  $requserid = $reqData['userId'];
}

$query = $mysqli->query("select * from tb_users where hash = '".$token."'");
$balance = 0;
$username = '';
$bonus_mode = 0;
 
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
                        
                        $sql = "SELECT * FROM jilibetpayout WHERE bettype='BET' and reqId='" . $reqID . "' AND token='" . $token . "'";
                        $res = $mysqli->query($sql);

                        if($res){
                          if ($res->num_rows > 0) {
                            echo json_encode([
                              "errorCode" => 1,
                              "message" => "The bet is already accepted",
                              "username" => $username,
                              "currency" => "THB",
                              "balance" => $balance
                            ]);
                            $mysqli->close();

                            exit();
                          }
                        }
                          $betAmount = $reqData['betAmount'];
                          $winloseAmount = $reqData['winloseAmount'];
                          if ($balance < $betAmount) {
                            echo json_encode([
                              "errorCode" => 2,
                              "message" => "Not enough balance"
                            ]);
                            $mysqli->close();

                            exit();
                          }


                          $update_balance = floatval($balance)-floatval($betAmount)+floatval($winloseAmount);
                          if($bonus_mode==1){
                            $mysqli->query("UPDATE tb_users SET bonus = '".$update_balance."' WHERE id = '".$user_data->id."'");
                          
                          }else{
                            $mysqli->query("UPDATE tb_users SET balance = '".$update_balance."' WHERE id = '".$user_data->id."'");
            
                          }


                          /*$settleAmount = 0; //($betAmount >= $winloseAmount) ? $betAmount - $winloseAmount : $winloseAmount-$betAmount;
                          $balRemain = 0;
                          $turnover = 0;

                          if ($betAmount >= $winloseAmount) {
                            $settleAmount = $betAmount - $winloseAmount;
                            $balRemain = adjustMemberWallet($member_no, $settleAmount, 2);
                            $turnover = $settleAmount;
                          } else {
                            $settleAmount = $winloseAmount - $betAmount;
                            $balRemain = adjustMemberWallet($member_no, $settleAmount, 1);
                            $turnover = $betAmount;
                          }

                          adjustMemberTurnover($member_no, $turnover, 'jls', 2);  //###############
                          adjustAFF($member_no, $turnover, 1);*/

                          // Convert unix time to DateTime
                          date_default_timezone_set("Asia/Bangkok");
                          $dtTemp = gmdate("Y-m-d H:i:s", $reqData['wagersTime']);
                          $now = new DateTime($dtTemp);
                          $now->add(new DateInterval("PT7H"));
                          $dateTime = $now->format("Y-m-d H:i:s");


                          $date = new DateTime();
                          $txId = $date->getTimestamp();

                          
                      
                          $sql = "INSERT INTO jilibetpayout (bettype,reqId,token,currency,game,round,wagersTime,betAmount,winloseAmount,balancebefore,currentbalance,isFreeRound,userId,jsondata,txId) VALUES ";
                          $sql .= "('BET','" . $reqID . "','" . $token . "','THB'," . $reqData['game'] . "," . $reqData['round'] . "," . $reqData['wagersTime'] . "," . $betAmount . "," . $winloseAmount . "," . $balance . "," . $update_balance . ",". $specialBet . ",'". $user_data->id ."','" . json_encode($reqData) . "','".$txId."')";

                          if (!$mysqli->query($sql)) {
                            echo("Error description: " . $mysqli->error);
                          }


                          //userTO($user_data->id,'bet','jl',$betAmount,$winloseAmount,$mysqli);

                         
                          //game_histories($user_data->id,$username,$reqData['game'],'jl',$reqData['round'],$betAmount,$winloseAmount,$balance,$update_balance,'payout',$specialBet,$mysqli);
                          
                         

                          $arr = array(
                            "errorCode" => 0,
                            "message" => "success",
                            "username" => $username,
                            "currency" => "THB",
                            "balance" => (float)$update_balance,
                            "txId" => $txId,
                            "token" => $token
                          );

                          
                          $mysqli->close();


                          echo json_encode($arr);




                      }
                      else
                      {
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

