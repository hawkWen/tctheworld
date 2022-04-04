<?php

require $_SERVER['DOCUMENT_ROOT'].'/seamless/config.php';
require 'pg-function.php';

//$config = getPGSiteCfg(66, 1);

define('base_dir', __DIR__);
header("Content-type: application/json; charset=utf-8");

$req_data_ori = $_REQUEST ?? $_POST ?? $_GET ?? NULL;
$req_data = $req_data_ori;

// echo json_encode($req_data_ori);
// // echo $_REQUEST;
// exit();

//$req_data = pg_trx_record('VerifySession', $req_data);
//var_dump('aaa');
//var_dump($req_data);
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $req_data = pg_trx_record('VerifySession', $_POST);
// } else {
//     $req_data = pg_trx_record('VerifySession', $_GET);
// }

$currency = 'THB';
$error1034 = false;
$error_message = '';
$arr = array();
//$req_data['operator_token']='e922fdab0cb7385f7cf8bd5b34046a61';
//$req_data['operator_player_session']='0623789382';
//$req_data['secret_key']='1736767573f9efb4547af0297e3b835c';
// Validation required parameters
$skipOPS = false;

    $validate_req = validateRequest($req_data, $config);

    if ($validate_req['error'] != null) {
        echo json_encode($validate_req);
        $mysqli->close();
        exit();
    }

    $validate_operator_player_session = validateOperatorPlayerSession($req_data,$mysqli,$skipOPS);
   
    if ($validate_operator_player_session['error'] != null) {
        echo json_encode($validate_operator_player_session);
        $mysqli->close();
        exit();
    }else{

    // $req_data_ori = pg_trx_record('VerifySession', $req_data_ori);

        $arr = array(
            'data' => array(
                'player_name' => $validate_operator_player_session['player_name'],
                'nickname' => $validate_operator_player_session['nickname'],
                'currency' =>  $currency,
                'reminder_time' => round(microtime(true) * 1000)
            ),
            'error' => null
        );
    }

$mysqli->close();
echo json_encode($arr);
