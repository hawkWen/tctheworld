<?php

function checkPlatform($v_platform)
{
  if ($v_platform == 'SEXYBCRT') {
    return 'aec';
  }
  if ($v_platform == 'KINGMAKER') {
    return 'kmc';
  }
  if ($v_platform == 'RT') {
    return 'rts';
  }
  if ($v_platform == 'JILI') {
    return 'jls';
  }
}


function placeBet($message)
{
  global $mysqli;

  $errCode = '0000'; // Success
  $errMsg = 'success';

  $txns = $message['txns'][0];

  $sql_insert  = "INSERT INTO ae_trx (member_no,platform_tx_id,user_id,currency,platform,game_type,game_code,";
  $sql_insert .= "game_name,bet_type,before_bet_amount,bet_amount,bet_time,round_id,status,game_info) VALUES ";

  $member_info = get_member_info($txns['userId']);
  $wallet_amount_before = 0;
  $wallet_amount_after = 0;
  $bet_amnt = (float) $txns['betAmount'];
  $bal_remain = 0;
  $sum_bet_amount = 0;

  if ($member_info == null) {
    $errCode = '1012';    // User account doesn’t exist
    $errMsg = 'Account is not exists';
    echo json_encode([
      'status'    => $errCode,
      'desc'      => $errMsg
    ]);
  } else {
    $arr_txns = $message['txns'];
    $bal_remain = $member_info['main_wallet'];

    for ($i = 0; $i < count($arr_txns); $i++) {
      $sum_bet_amount += $arr_txns[$i]['betAmount'];
    }

    if (($sum_bet_amount > $bal_remain) || ($bal_remain <= 0)) {
      echo json_encode([
        'status'    => '1018',
        'balance'   => $bal_remain,
        'balanceTs' => getDatetimeAE(), // Example "2020-05-25T14:04:06.115+08:00"
        'desc'      => 'Not Enough Balance'
      ]);
      exit();
    }

    $wallet_amount_before = (float) $member_info['main_wallet'];

    for ($i = 0; $i < count($arr_txns); $i++) {
      $txns = $arr_txns[$i];

      if (isCancelB4Bet($txns) == 1) {
        update_ae_trx_status($txns, 2);
        $errCode = '0000';
        $errMsg = 'Cancel before PlaceBet';
      } else {
        $sql  = "(" . $member_info['member_no'] . ",'" . $txns['platformTxId'] . "','" . $txns['userId'] . "','" . $txns['currency'] . "','";
        $sql .= $txns['platform'] . "','" . $txns['gameType'] . "','" . $txns['gameCode'] . "','" . $txns['gameName'] . "','";
        $sql .= $txns['betType'] . "'," . $wallet_amount_before . "," . $txns['betAmount'] . ",'" . $txns['betTime'] . "','" . $txns['roundId'] . "',1";
        if (empty($txns['gameInfo'])) {
          $sql .= ",'')";
        } else {
          $sql .= ",'" . json_encode($txns['gameInfo']) . "')";
        }
        if ($mysqli->query($sql_insert . $sql) === TRUE) {
          $bal_remain = adjustMemberWallet($member_info['member_no'], $txns['betAmount'], 2);
        } else {
          $errCode = '9999';  // General error
          $errMsg  = 'Fail';
        }
        $wallet_amount_before -= $txns['betAmount'];
      }
    }

    echo json_encode([
      'status'    => $errCode,
      'balance'   => $bal_remain,
      'balanceTs' => getDatetimeAE(), // Example "2020-05-25T14:04:06.115+08:00"
      'desc'      => $errMsg
    ]);
  }
}

function cancelBet($message)  //Use 'platform' and 'platofmrTxId' to verify record existed
{
  global $mysqli;

  $errCode = '0000';
  $cancel_amount = 0;
  $bal_remain = 0;

  for ($i = 0; $i < count($message['txns']); $i++) {
    $txns = $message['txns'][$i];
    $errMsg  = '';
    $bal_remain = 0;
    $res = get_ae_trx($txns);
    if ($res['error_code'] == 0) {
      update_ae_trx_status($txns, 2);
      $cancel_amount += $res['bet_amount'];
    } else {
      // $sql = "INSERT INTO ae_trx (member_no,platform,platform_tx_id,status) VALUES (" . $txns['userId'] . ",'" . $txns['platform'] . "','" . $txns['platformTxId'] . "',15)";
      // $mysqli->query($sql);
      $errMsg = 'CancelBet without PlaceBet';
      $res['member_no'] = get_member_no($txns['userId']);
    }
  }

  $bal_remain = adjustMemberWallet($res['member_no'], $cancel_amount, 1);

  // echo json_encode($txns);
  echo json_encode([
    'status'    => $errCode,
    'balance'   => $bal_remain,
    'balanceTs' => getDatetimeAE(), // Example "2020-05-25T14:04:06.115+08:00"
    'desc'      => $errMsg
  ]);
}

function adjustBet()
{
}

function voidBet($message)
{
  for ($i = 0; $i < count($message['txns']); $i++) {
    $txns = $message['txns'][$i];
    $errCode = '0000';
    $errMsg  = '';
    $result = get_ae_trx($txns);
    $bal_remain = 0;
    if ($result['error_code'] === 0) {
      update_ae_trx_status($txns, 4);
      $bal_remain = adjustMemberWallet($result['member_no'], $result['bet_amount'], 1);
    } else {
      $errCode = '1012';    // User account doesn’t exist
      $errMsg = 'Account is not exists';
    }
    echo json_encode([
      'status'    => $errCode,
      'balance'   => $bal_remain,
      'balanceTs' => getDatetimeAE(), // Example "2020-05-25T14:04:06.115+08:00"
      'desc'      => $errMsg
    ]);
  }
}

function unvoidBet($message)
{
  for ($i = 0; $i < count($message['txns']); $i++) {
    $txns = $message['txns'][$i];
    $errCode = '0000';
    $errMsg  = '';
    $result = get_ae_trx($txns);
    $bal_remain = 0;
    if ($result['error_code'] === 0) {
      update_ae_trx_status($txns, 5);
      $bal_remain = adjustMemberWallet($result['member_no'], $result['bet_amount'], 2);
    } else {
      $errCode = '1012';    // User account doesn’t exist
      $errMsg = 'Account is not exists';
    }
    echo json_encode([
      'status'    => $errCode,
      'desc'      => $errMsg
    ]);
  }
}

function refundBet($message)
{
  global $mysqli;
  for ($i = 0; $i < count($message['txns']); $i++) {
    $txns = $message['txns'][$i];
    $arrRefund = array();
    $platform_tx_id_list = " WHERE platform_tx_id=";
    for ($i = 0; $i < count($txns); $i++) {
      $platform_tx_id_list .= "'" . $txns[$i]['refundPlatformTxId'] . "' OR platformTxId=";
      $arrRefund[$i]['userId'] = $txns[$i]['userId'];
      $arrRefund[$i]['refundAmount'] = ((float) $txns[$i]['betAmount']) + ((float) $txns[$i]['winAmount']);
    }
    $platform_tx_id_list = substr($platform_tx_id_list, 0, -16);

    $sql = "UPDATE ae_trx SET status=6 " . $platform_tx_id_list;
    $mysqli->query($sql);

    for ($i = 0; $i < count($arrRefund); $i++) {
      $bal_remain = adjustMemberWallet(get_member_no($arrRefund[$i]['userId']), (float) $arrRefund[$i]['refundAmount'], 1);
    }

    echo json_encode([
      'status'    => '0000',
      'desc'      => ''
    ]);
  }
}

function settleBetRT($platform, $txns)
{

  if ($txns['winAmount'] > 0) {
    $member_no = get_member_no($txns['userId']);
    $bal_remain = adjustMemberWallet($member_no, ($txns['winAmount']), 1);  // Adjust wallt
    $platform = checkPlatform($txns['platform']);
    $gameType = 1;  // Casino
    if ($platform == 'rts') {
      $gameType = 2; // Slot
    }
    adjustMemberTurnover($member_no, $txns['turnover'], $platform, $gameType); // Adjust turnover
    adjustAFF($member_no, $txns['turnover'], 1);  // Admust AFF turnover
  }
}


function settleBet($message)
{
  // global $mysqli;
  // echo json_encode([
  //   'status'    => '0000'
  // ]);
  for ($i = 0; $i < count($message); $i++) {

    $txns = $message[$i];
    // if ($txns['platform'] == 'RT') {
    //   settleBetRT('RT', $txns);
    //   continue;
    // } else {
    $result = get_ae_trx($txns);
    $bal_remain = 0;
    $turnover = 0;
    if ($result['error_code'] === 0 && $result['status'] != 7) {
      update_ae_trx_status($txns, 7);
      $member_no = $result['member_no'];
      $result['status'] = 7;
      if (($txns['winAmount']) == 0) {
        // Customer lost
      } else {
        $bal_remain = adjustMemberWallet($member_no, ($txns['winAmount']), 1);  // Adjust wallt
        update_ae_trx_winAmount($txns);
      }
      if ($txns['betAmount'] == $txns['winAmount']) {
      } else {
        // if ($result['status'])
        $platform = checkPlatform($txns['platform']);
        $gameType = 1;  // Casino
        if ($platform == 'rts' || $platform == 'jls') {
          $gameType = 2; // Slot
        }

        adjustMemberTurnover($member_no, $txns['turnover'], $platform, $gameType); // Adjust turnover
        adjustAFF($member_no, $txns['turnover'], 1);  // Admust AFF turnover
      }
    } else {
      // User account doesn’t exist
      // echo json_encode([
      //   'status'    => '1012',
      //   'desc'      => 'Account is not exists'
      // ]);
      // exit();
    }
    // }
  }
  echo json_encode([
    'status'    => '0000'
  ]);
}

function unsettleBet($message)
{
  for ($i = 0; $i < count($message); $i++) {
    $txns = $message[$i];
    $errCode = '0000';
    $errMsg  = '';
    $result = get_ae_trx($txns);
    $bal_remain = 0;
    $platform = checkPlatform($txns['platform']);

    if (($result['error_code'] === 0) && ($result['status'] == 7)) {
      update_ae_trx_status($txns, 8);
      if ($result['win_amount'] > $result['bet_amount']) { // Settle Customer WIN so Unsetlle change to LOST
        $bal_remain = adjustMemberWallet($result['member_no'], ((float) $result['win_amount']), 2);
        adjustMemberTurnover($result['member_no'], ((float) $result['betAmount']) * (-1), $platform, 1);
        adjustAFF($result['member_no'], $result['betAmount'], 2);
      }
      if ($result['win_amount'] < $result['bet_amount']) { // Settle Customer LOST so Unsetlle change to WIN
        $bal_remain = adjustMemberWallet($result['member_no'], ((float) $result['win_amount']), 1);
        adjustMemberTurnover($result['member_no'], ((float) $result['betAmount']), $platform, 1);
        adjustAFF($result['member_no'], $result['betAmount'], 1);
      }
      if ($result['win_amount'] == $result['bet_amount']) { // Settle Customer DRAW/VOID/Tie

      }
    } else {
      $errCode = '1012';    // User account doesn’t exist
      $errMsg = 'Account is not exists';
    }
    echo json_encode([
      'status'    => $errCode,
      'desc'      => $errMsg
    ]);
  }
}

function voidSettle($message)
{
  for ($i = 0; $i < count($message); $i++) {
    $txns = $message[$i];
    $errCode = '0000';
    $errMsg  = '';
    $result = get_ae_trx($txns);
    $bal_remain = 0;

    $platform = checkPlatform($txns['platform']);

    if (($result['error_code'] === 0) && (($result['status'] == 7) || ($result['status'] == 8))) {
      update_ae_trx_status($txns, 9, (int) $txns['voidType']);
      if ($result['win_amount'] > $result['bet_amount']) { // Settle Customer WIN then void
        $bal_remain = adjustMemberWallet($result['member_no'], ((float) $result['win_amount']) - ((float) $result['bet_amount']), 2);
        adjustMemberTurnover($result['member_no'], ((float) $result['betAmount']) * (-1), $platform, 1);
        adjustAFF($result['member_no'], $result['betAmount'], 2);
      }
      if ($result['win_amount'] < $result['bet_amount']) { // Settle Customer LOST then void
        $bal_remain = adjustMemberWallet($result['member_no'], ((float) $result['bet_amount']), 1);
        adjustMemberTurnover($result['member_no'], ((float) $result['betAmount']) * (-1), $platform, 1);
        adjustAFF($result['member_no'], $result['betAmount'] * (-1), 1);
      }
      if ($result['win_amount'] == $result['bet_amount']) { // Settle Customer DRAW/VOID/Tie

      }
    } else {
      $errCode = '1012';    // User account doesn’t exist
      $errMsg = 'Account is not exists';
    }
    echo json_encode([
      'status'    => $errCode,
      'desc'      => $errMsg
    ]);
  }
}

function unvoidSettle($message)
{
  for ($i = 0; $i < count($message['txns']); $i++) {
    $txns = $message['txns'][$i];
    $errCode = '0000';
    $errMsg  = '';
    $result = get_ae_trx($txns);
    $bal_remain = 0;
    if (($result['error_code'] === 0) && ($result['status'] == 9)) {
      update_ae_trx_status($txns, 10, (int) $txns['voidType']);
      if (((float) $txns['winAmount']) == 0) {
        // Customer lost
        $bal_remain = adjustMemberWallet($result['member_no'], ((float) $txns['betAmount']), 2);
      } else {
        $bal_remain = adjustMemberWallet($result['member_no'], ((float) $txns['winAmount']), 2);
      }
      // update_ae_trx_winAmount(0);
      $platform = checkPlatform($txns['platform']);

      adjustMemberTurnover(get_member_no($txns['userId']), ((float) $txns['turnover']), $platform, 1);
    } else {
      $errCode = '1012';    // User account doesn’t exist
      $errMsg = 'Account is not exists';
    }
    echo json_encode([
      'status'    => $errCode,
      'desc'      => $errMsg
    ]);
  }
}

function getBalance($user_id)
{
  // global $mysqli;
  $member_wallet = get_member_info($user_id);
  if ($member_wallet !== NULL) {
    echo json_encode([
      'status'    => '0000',
      'userId'    => $user_id,
      'balance'   => $member_wallet['main_wallet'],
      'balanceTs' => getDatetimeAE() // Example "2020-05-25T14:04:06.115+08:00"
    ]);
  } else {
    echo json_encode([
      'status'    => '1002',
      'userId'    => $user_id,
      'balance'   => 0,
      'balanceTs' => getDatetimeAE(), // Example "2020-05-25T14:04:06.115+08:00"
      'desc'      => 'Account is not exists'
    ]);
  }
}

function betNSettle($message) // For Slot and Fishing only
{
  global $mysqli;

  for ($i = 0; $i < count($message); $i++) {

    $txns = $message[$i];
    $memberInfo = getMembers($txns['userId']);
    if (!isset($memberInfo)) {
      echo json_encode([
        'status'    => '1012',
        'desc'      => 'Account is not exists'
      ]);
      exit();
    }

    $member_no = $memberInfo['member_no'];
    $memberWallet = getMemberWallet($member_no);
    if ($memberWallet['main_wallet'] < $txns['betAmount']) {
      echo json_encode([
        'status'    => '1082',
        'desc'      => 'Not Enough Balance'
      ]);
      exit();
    }

    $bal_remain = $memberWallet['main_wallet'];

    $sql = "INSERT INTO ae_trx (member_no,user_id,platform,platform_tx_id,currency,game_type,game_code,game_name,bet_time,before_bet_amount,bet_amount,win_amount,round_id,game_info,void_type,status) VALUES ";
    $sql .= "(" . $member_no . ",'" . $txns['userId'] . "','" . $txns['platform'] . "',";
    $sql .= "'" . $txns['platformTxId'] . "','" . $txns['currency'] . "','" . $txns['gameType'] . "',";
    $sql .= "'" . $txns['gameCode'] . "','" . $txns['gameName'] . "','" . $txns['betTime'] . "',";
    $sql .= $memberWallet['main_wallet'] . ',' . $txns['betAmount'] . "," . $txns['winAmount'] . ",'" . $txns['roundId'] . "','" . json_encode($txns) . "',0,12)";

    $mysqli->query($sql);

    $newBalance = $bal_remain - $txns['betAmount'] + $txns['winAmount'];

    if ($txns['betAmount'] != $txns['winAmount']) {
      $mysqli->query("UPDATE member_wallet SET main_wallet=" . $newBalance . " WHERE member_no=" . $member_no);
    }

    $platform = checkPlatform($txns['platform']);
    $gameType = 1;  // Casino
    if ($platform == 'rts' || $platform == 'jls') {
      $gameType = 2; // Slot
    }

    adjustMemberTurnover($member_no, $txns['turnover'], $platform, $gameType); // Adjust turnover
    adjustAFF($member_no, $txns['turnover'], 1);  // Adjust AFF turnover

    echo json_encode([
      'status'    => '0000',
      'balance'   => $newBalance,
      'balanceTs' => getDatetimeAE() // Example "2020-05-25T14:04:06.115+08:00"
    ]);
  }
}

function cancelBetNSettle($message)  // For Slot and Fishing only
{
  global $mysqli;

  for ($i = 0; $i < count($message); $i++) {

    $txns = $message[$i];
    $memberInfo = getMembers($txns['userId']);
    if (!isset($memberInfo)) {
      echo json_encode([
        'status'    => '1012',
        'desc'      => 'Account is not exists'
      ]);
      exit();
    }

    $member_no = $memberInfo['member_no'];
    $memberWallet = getMemberWallet($member_no);

    $bal_remain = $memberWallet['main_wallet'];

    $sql = "INSERT INTO ae_trx (member_no,user_id,platform,platform_tx_id,currency,game_type,game_code,game_name,bet_time,before_bet_amount,bet_amount,win_amount,round_id,game_info,void_type,status) VALUES ";
    $sql .= "(" . $member_no . ",'" . $txns['userId'] . "','" . $txns['platform'] . "',";
    $sql .= "'" . $txns['platformTxId'] . "','" . $txns['currency'] . "','" . $txns['gameType'] . "',";
    $sql .= "'" . $txns['gameCode'] . "','" . $txns['gameName'] . "','" . $txns['betTime'] . "',";
    $sql .= $memberWallet['main_wallet'] . ',' . $txns['betAmount'] . "," . $txns['winAmount'] . ",'" . $txns['roundId'] . "','" . json_encode($txns) . "',0,12)";

    $mysqli->query($sql);

    $res = $mysqli->query("SELECT * FROM ae_trx WHERE platform_tx_id='" . $txns['platformTxId'] . "' AND platform='" . $txns['platform'] . "'");
    if ($res->num_rows > 0) {
      $res = $res->fetch_assoc();
    } else {
      echo json_encode([
        'status'    => '0000',
        'balance'   => $bal_remain,
        'balanceTs' => getDatetimeAE() // Example "2020-05-25T14:04:06.115+08:00"
      ]);
      exit();
    }

    // $winAmount = $res['win_amount'];
    // $betAmount = $txns['betAmount'];
    $newBalance = 0;

    if ($res['win_amount'] == $txns['betAmount']) {
      $newBalance = $bal_remain;
    } elseif ($res['win_amount'] > $txns['betAmount']) {
      $newBalance = $bal_remain - ($res['win_amount'] - $txns['betAmount']);
    } else {
      $newBalance = $bal_remain + ($txns['betAmount'] - $res['win_amount']);
    }

    if ($txns['betAmount'] != $txns['winAmount']) {
      $mysqli->query("UPDATE member_wallet SET main_wallet=" . $newBalance . " WHERE member_no=" . $member_no);
    }

    $platform = checkPlatform($txns['platform']);
    $gameType = 1;  // Casino
    if ($platform == 'rts' || $platform == 'jls') {
      $gameType = 2; // Slot
    }

    adjustMemberTurnover($member_no, ($txns['betAmount'] * (-1)), $platform, $gameType); // Adjust turnover
    adjustAFF($member_no, $txns['betAmount'], 2);  // Adjust AFF turnover

    echo json_encode([
      'status'    => '0000',
      'balance'   => $newBalance,
      'balanceTs' => getDatetimeAE() // Example "2020-05-25T14:04:06.115+08:00"
    ]);
  }
}

function freeSpin() // For Slot only
{
}

function isCancelB4Bet($txns)
{
  global $mysqli;
  $sql = "SELECT * FROM ae_trx WHRER user_id='" . trim($txns['userId']) . "' AND '" . trim($txns['platform']) . "' AND '" . trim($txns['platformTxId']) . "' AND status=15";
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0) {
    return 1;
  } else {
    return 0;
  }
}

function checkGameType($gameType)
{
  // $gameType 
  // 1 = Casino/Live
  // 2 = Slot
  // 3 = Fishing
  // 4 = SportsBook

  switch ($gameType) {
    case 'LIVE':
      $gameType = 1;
      break;

    case 'SLOT':
      $gameType = 2;
      break;

    default:
      # code...
      break;
  }
  return $gameType;
}
