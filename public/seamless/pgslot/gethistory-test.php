<?php

// echo  'URL  =>  ' . $_POST['operator_token'];
// console_log("aaaa ". $_POST['operator_token']);
// exit();
// echo 'SSSSS : ' . $_SERVER['REQUEST_METHOD'];
// exit();

 echo json_encode(
['data' => 
[
[
    'betId' => 35677059,
    'parentBetId' => 35677059,
    'playerName' => 'player1',
    'currency' => 'CNY',
    'gameId' => 19,
    'platform' => 2,
    'betType' => 1,
    'transactionType' => 1,
    'betAmount' => 3000,
    'winAmount' => 0,
    'jackpotContributionAmount' => 0,
    'jackpotWinAmount' => 0,
    'balanceBefore' => 88081189.2,
    'balanceAfter' => 88078189.2,
    'handsStatus' => 1,
    'rowVersion' => 1529546511407,
    'betTime' => 1529546613715,
    'betEndTime' => 1529546613715
 ],
 [  'betId' => 35677061,
    'parentBetId' => 35677059,
    'playerName' => 'player1',
    'currency' => 'CNY',
    'gameId' => 19,
    'platform' => 2,
    'betType' => 1,
    'transactionType' => 1,
    'betAmount' => 1000,
    'winAmount' => 0,
    'jackpotContributionAmount' => 0,
    'jackpotWinAmount' => 0,
    'balanceBefore' => 88078189.2,
    'balanceAfter' => 88077189.2,
    'handsStatus' => 1,
    'rowVersion' => 1529546556399,
    'betTime' => 1529546647867,
    'betEndTime' => 1529546647867     
],
[
    'betId' => 35677065,
    'parentBetId' => 35677059,
    'playerName' => 'player1',
    'currency' => 'CNY',
    'gameId' => 19,
    'platform' => 2,
    'betType' => 1,
    'transactionType' => 1,
    'betAmount' => 0,
    'winAmount' => 0,
    'jackpotContributionAmount' => 0,
    'jackpotWinAmount' => 0,
    'balanceBefore' => 88077189.2,
    'balanceAfter' => 88077189.2,
    'handsStatus' => 1,
    'rowVersion' => 1529546556399,
    'betTime' => 1529546647867,
    'betEndTime' => 1529546647867
]
],
    'error' => null,
    'operator_token' => $_POST['operator_token'],
    'secret_key' => $_POST['secret_key'],
    'count' => $_POST['count'],
    'bet_type' => $_POST['bet_type'],
    'row_version' => $_POST['row_version'],
    'hands_status' => $_POST['hands_status']
 ]);
// exit();
 ?>
