<?php
require $_SERVER['DOCUMENT_ROOT'].'/seamless/config.php';

require $_SERVER['DOCUMENT_ROOT'].'/seamless/pgslot/pg-function.php';

define('base_dir', __DIR__);
header("Content-type: application/json; charset=utf-8");

$req_data_ori = $_REQUEST ?? $_POST ?? $_GET ?? NULL;
$req_data = $req_data_ori;


// secret_key, operator_token, operator_player_session, player_name
$currency = 'THB';
$errorCode = null;
$errorMsg = '';
$bal_remain = 0;
$update_balance=0;
//$config = getPGSiteCfg(66, 1);
$skipOPS = 0;
// Validation required parameters
$validate_req = validateRequest($req_data, $config);
if ($validate_req['error'] != null) {
    echo json_encode($validate_req);
    $mysqli->close();
    exit();
}

if (empty($req_data['player_name'])) {
    echo json_encode([
        'data' => null,
        'error' => array(
            'code' => 3004,
            'message' => "Player does not exist"
        )
    ]);
    $mysqli->close();
    exit();
}



$skipOPS = 0;

    if (!empty($req_data['is_validate_bet'])&&strtolower($req_data['is_validate_bet'])=='true'||!empty($req_data['is_adjustment'])&&strtolower($req_data['is_adjustment'])=='true') {

       $skipOPS = 1;
        
    }


if (($currency != $req_data['currency_code'])) {
    echo json_encode([
        'data' => null,
        'error' => array(
            'code' => 1034,
            'message' => "Invalid currency_code"
        )
    ]);
    $mysqli->close();
    exit();
}





    $validate_operator_player_session = validateOperatorPlayerSession($req_data,$mysqli,$skipOPS);
    if ($validate_operator_player_session['error'] != null) {
        echo json_encode($validate_operator_player_session);
        $mysqli->close();
        exit();
    }
    else
    {


        $querytx = $mysqli->query("select * from pgbetpayout where transaction_id = '".$req_data['transaction_id']."'");

        if($querytx)
        {

            if($querytx->num_rows > 0) {

                $tranfer_data = $querytx->fetch_object();
                $mysqli->close();
                echo json_encode([
                        'data' => array(
                            'currency_code' => $currency,
                            'balance_amount' => number_format($tranfer_data->balance_amount,2,'.',''),
                            'updated_time' => $req_data['updated_time']
                        ),
                        'error' => $errorCode
                    ]);

            }else{


                $platform = 'N/A';
                if(!empty($req_data['platform']))
                {
                    $platform = $req_data['platform'];
                }
                $wallet_type = 'C';
                if(!empty($req_data['wallet_type']))
                {
                    $wallet_type = $req_data['wallet_type'];
                }
                $is_validate_bet = 0;
                if(!empty($req_data['is_validate_bet']))
                {
                    $is_validate_bet = $req_data['is_validate_bet'];
                }
                $is_adjustment = 0;
                if(!empty($req_data['is_adjustment']))
                {
                    $is_adjustment = $req_data['is_adjustment'];
                }
                $is_parent_zero_stake = 0;
                if(!empty($req_data['is_parent_zero_stake']))
                {
                    $is_adjustment = $req_data['is_parent_zero_stake'];
                }
                $is_feature = 0;
                if(!empty($req_data['is_feature']))
                {
                    $is_feature = $req_data['is_feature'];
                }
                $is_feature_buy = 0;
                if(!empty($req_data['is_feature_buy']))
                {
                    $is_feature_buy = $req_data['is_feature_buy'];
                }
                $is_wager = 0;
                if(!empty($req_data['is_wager']))
                {
                    $is_wager = $req_data['is_wager'];
                }
                $is_end_round = 0;
                if(!empty($req_data['is_end_round']))
                {
                    $is_end_round = $req_data['is_end_round'];
                }

           
                $bal_remain = $validate_operator_player_session['balance'];
                
        

                $update_balance = $bal_remain+floatval($req_data['transfer_amount']);
                if($validate_operator_player_session['wallet']==0){
                    $mysqli->query("UPDATE tb_users SET balance = '".$update_balance."' WHERE id = '".$validate_operator_player_session['user_id']."'");
                }else{
                    $mysqli->query("UPDATE tb_users SET bonus = '".$update_balance."' WHERE id = '".$validate_operator_player_session['user_id']."'");
                }

                $mysqli->query("INSERT INTO pgbetpayout (bet_id,player_name,game_id,parent_bet_id,currency_code,platform,transfer_amount,transaction_id,wallet_type,create_time,updated_time,is_validate_bet,is_adjustment,is_parent_zero_stake,is_feature,is_feature_buy,is_wager,is_end_round,user_id,transactiontype,balance_amount) VALUES ('".$req_data['bet_id']."', '".$req_data['player_name']."', '".$req_data['game_id']."', '".$req_data['parent_bet_id']."', 'THB', '".$platform."', '".$req_data['transfer_amount']."', '".$req_data['transaction_id']."', '".$wallet_type."', '".$req_data['create_time']."', '".$req_data['updated_time']."', ".$is_validate_bet.", ".$is_adjustment.", ".$is_adjustment.", ".$is_feature.", ".$is_feature_buy.", ".$is_wager.", ".$is_end_round.",".$validate_operator_player_session['user_id'].",'PAYOUT','".number_format($update_balance,2,'.','')."')");


                       // userTO($validate_operator_player_session['user_id'],'PAYOUT','pg',0,$req_data['transfer_amount'],$mysqli);

                       

                       /* if(!empty($req_data['is_adjustment'])){
                                    game_histories($validate_operator_player_session['user_id'],$req_data['player_name'],$req_data['game_id'],'pg',$req_data['bet_id'],0,$req_data['transfer_amount'],$bal_remain,$update_balance,'adjust',$is_feature,$mysqli);
                                }else{
                                    game_histories($validate_operator_player_session['user_id'],$req_data['player_name'],$req_data['game_id'],'pg',$req_data['bet_id'],0,$req_data['transfer_amount'],$bal_remain,$update_balance,'payout',$is_feature,$mysqli);
                                }*/
                        $mysqli->close();
                            echo json_encode([
                                'data' => array(
                                    'currency_code' => $currency,
                                    'balance_amount' => number_format($update_balance,2,'.',''),
                                    'updated_time' => $req_data['updated_time']
                                ),
                                'error' => $errorCode
                            ]);
            }
        }else{
            echo json_encode([
                        'data' => null,
                        'error' => array(
                            'code' => 3033,
                            'message' => "Bet failed"
                        )
                    ]);
            $mysqli->close();
                    exit();
        }
    }

/*$validatePlayerName = validatePlayerName($req_data);
if ($validatePlayerName['error']['code'] == 1305) {
    $arrReturn = array(
        'data' => null,
        'error' => array(
            'code' => 1034,
            'message' => 'Invalid request'
        )
    );
    echo json_encode($arrReturn);
    exit();
}*/

//$member_wallet = getMemberWallet($req_data['player_name']);


/*if (isTrxDuplicate($req_data['transaction_id'], 'TransferIn')) {  // Check transaction_id duplicate
    echo json_encode([
        'data' => array(
            'currency_code' => $currency,
            'balance_amount' => $member_wallet['main_wallet'],
            'updated_time' => $req_data['updated_time']
        ),
        'error' => $errorCode
    ]);
    exit();
} else {*/


//}
