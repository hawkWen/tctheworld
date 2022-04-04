<?php
/*
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$type = $_GET['g'];
if($type == 'SAGaming'){
	$url = 'http://103.82.249.73/api/Sagaming/Server/sa-gaming';
}elseif($type == 'Venus'){
	$url = 'http://103.82.249.29/venus/Client/ve-gaming';
}elseif($type == 'Dreamgaming'){
	$url = 'http://103.82.249.29/dg/dg';
}elseif($type == 'Sexy'){
	$url = 'http://103.82.249.29/sexy/Client/se-gaming';
}elseif($type == 'Allbet'){
	$url = 'http://103.82.249.30/allbet-gaming-api/Server/allbet-gaming/baccarat';
}elseif($type == 'Gclub'){
	$url = 'http://103.82.249.168/Server/gclub-casino/baccarat';
}

$ch = curl_init();
curl_setopt_array($ch, array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_TIMEOUT => 60,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36",
	CURLOPT_URL => $url
));
$response = curl_exec($ch);
echo $response;
*/
?>