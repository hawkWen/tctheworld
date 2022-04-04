<?php
require_once("KasikornBank.class.php");
$kbank = new KasikornBank(null,null,null,"cookie.txt");

$kbank->ImportCredentials($_POST["credentials"]);

$SubmitOTP = $kbank->bankTransferSubmitOTP (json_decode($_POST["transfer"],true),$_POST["otp"]);
//$SubmitOTP = $kbank->promptpaySubmitOTP (json_decode($_POST["transfer"],true),$_POST["otp"]);

header('Content-Type: application/json; charset=utf-8');
echo json_encode(array(
	"SubmitOTP" => $SubmitOTP,
));