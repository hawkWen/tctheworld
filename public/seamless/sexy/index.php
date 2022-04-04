<?php

echo 'test';
exit();
session_start();
define('base_dir', __DIR__);
require_once base_dir . "/../inc/database.php";
require_once base_dir . "/../inc/function.php";
require_once base_dir . '/ae-function.php';

$cert_key = $_REQUEST['key'] ?? $_POST['key'] ?? $_GET['key'] ?? NULL;
$message  = $_REQUEST['message'] ?? $_POST['message'] ?? $_GET['message'] ?? NULL;

$ae_cfg = getAESiteCfg(66, 1);

if (empty($cert_key) || empty($message)) {
  echo json_encode(['status' => 9999, 'desc' => 'Invalid argument']);
  exit();
}

if (trim($cert_key) !== trim($ae_cfg['ae_client_api_secret_key'])) {
  echo json_encode(['status' => 1027, 'desc' => 'Invalid Certificate']);
  exit();
}

$arr_msg = json_decode($message, true);

$table_name = 'ae';

if ($arr_msg['action'] !== 'getBalance') {   // xx_api_log
  $sql = "INSERT INTO " . $table_name . "_api_log (action,msg,arr) VALUES ('" . $arr_msg['action'] . "','" . $message . "','" . count($arr_msg['txns']) . "')";
  $mysqli->query($sql);
}

switch ($arr_msg['action']) {
  case 'bet':
    placeBet($arr_msg);
    break;

  case 'cancelBet':
    cancelBet($arr_msg);
    break;

  case 'adjustBet':
    // adjustBet();
    echo json_encode([
      'status'    => '0000'
    ]);
    break;

  case 'voidBet':
    voidBet($arr_msg);
    break;

  case 'unvoidBet':
    unvoidBet($arr_msg);
    break;

  case 'refund':
    refundBet($arr_msg);
    break;

  case 'settle':
    settleBet($arr_msg['txns']);
    // echo json_encode([
    //   'status'    => '0000'
    // ]);
    break;

  case 'unsettle':
    unsettleBet($arr_msg['txns']);
    break;

  case 'voidSettle':
    voidSettle($arr_msg['txns']);
    break;

  case 'unvoidSettle':
    unvoidSettle($arr_msg);
    break;

  case 'getBalance':
    getBalance($arr_msg['userId']);
    break;

  case 'betNSettle':
    betNSettle($arr_msg['txns']);
    break;

  case 'cancelBetNSettle':
    cancelBetNSettle($arr_msg['txns']);
    break;

  case 'freeSpin':
    echo json_encode([
      'status'    => '0000'
    ]);
    break;

  default:
    # code...
    break;
}
// echo json_encode([
//   'status'    => '0000'
// ]);
// echo json_encode([
//   'status'    => '0000',
//   'desc'      => ''
// ]);
