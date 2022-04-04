<?php

require $_SERVER['DOCUMENT_ROOT'].'/seamless/config.php';

require $_SERVER['DOCUMENT_ROOT'].'/seamless/pgslot/pg-function.php';

define('base_dir', __DIR__);
header("Content-type: application/json; charset=utf-8");

$req_data_ori = $_REQUEST ?? $_POST ?? $_GET ?? NULL;
$req_data = $req_data_ori;


//$req_data = pg_trx_record('Get', $req_data);

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $req_data = pg_trx_record('Get', $_POST);
// } else {
//     $req_data = pg_trx_record('Get', $_GET);
// }

// secret_key, operator_token, operator_player_session, player_name
$currency = 'THB';
$errorCode = null;
$errorMsg = '';
$bal_remain = 0;
$skipOPS = false;
// Validation required parameters
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

/*$validate_player_name = validatePlayerName($req_data, $config);
if ($validate_player_name['error'] != null) {
    echo json_encode($validate_player_name);
    exit();
}
  $query = $mysqli->query("select balance from tb_users where username = '".$req_data['operator_player_session']."'");
    if($query){
        $user_data = $query->fetch_object();
    if ($query->num_rows > 0) {
            $bal_remain = $user_data->balance;
        }
    }*/


         
                $bal_remain = $validate_operator_player_session['balance'];
                $db_player_name = $validate_operator_player_session['player_name'];

                    if($db_player_name==$req_data['player_name']){
                        $mysqli->close();
                        echo json_encode([
                            'data' => array(
                                'currency_code' => $currency,
                                'balance_amount' => number_format($bal_remain,2,'.',''),
                                'updated_time' => round(microtime(true) * 1000)
                            ),
                            'error' => NULL
                        ]);
                        
                    }else{

                        
                        echo json_encode([
                            'data' => null,
                            'error' => array(
                                'code' => 3005,
                                'message' => "Player wallet does not exist"
                            )
                        ]);
                        $mysqli->close();
                        exit();

                    }


//$bal_remain = getMemberWallet($req_data['player_name'])['main_wallet'];



}
