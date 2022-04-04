<?php
require_once("KasikornBank.class.php");
$kbank = new KasikornBank("tctheworld", "4Ko6my9013!","0","cookie.txt"); //ชื่อผู้ใช้,รหัสผ่าน,ProfileID ปกติใช้ 0,cookie file path
$login = $kbank->Login();
if ($login) {
    $Account = $kbank->getBankAccount();
    $acc = $Account["ownAccountList"]["0"];

    $AccountSummary = $kbank->getAccountSummary();

    $Statement = $kbank->getTransactionList($acc["accountNo"],$acc["accountType"]);

	$Transaction=array();
	foreach ($Statement["recentTransactionList"] as $ts) {
		$tx = $kbank->getTransactionDetail($acc["accountNo"],$ts);
		array_push($Transaction,$tx);
	}
	
    $refreshSession = $kbank->Session_refresh();

    header('Content-Type: application/json; charset=utf-8');
    $a = array(
        "Login" => $login,
        "refreshSession" => $refreshSession,
        "Account" => $Account,
        "AccountSummary" => $AccountSummary,
        "Statement" => $Statement,
		"Transaction" => $Transaction,
    );
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}