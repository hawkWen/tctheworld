<?php
include '../function/database.php';
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); //add
$type = $_GET['g'];
if($type == 'joker'){
	$url = $url_img_slot.'api/joker.php';
}elseif($type == 'joker_seach'){
	$url = $url_img_slot.'api/joker_seach.php';
}elseif($type == 'ufa'){
	$url = $url_img_slot.'api/ufa.php';
}elseif($type == 'ufa_seach'){
	$url = $url_img_slot.'api/ufa_seach.php';
}elseif($type == 'slotxo'){
	$url = $url_img_slot.'api/slotxo.php';
}elseif($type == 'slotxo_seach'){
	$url = $url_img_slot.'api/slotxo_seach.php';
}elseif($type == 'pgslot'){
	$url = $url_img_slot.'api/PGSlot.php';
}elseif($type == 'pgslot_seach'){
	$url = $url_img_slot.'api/PGSlot_seach.php';
}elseif($type == 'spadegaming'){
	$url = $url_img_slot.'api/SpadeGaming.php';
}elseif($type == 'spadegaming_seach'){
	$url = $url_img_slot.'api/SpadeGaming_seach.php';
}elseif($type == 'sagameslot'){
	$url = $url_img_slot.'api/sagameslot.php';
}elseif($type == 'sagameslot_seach'){
	$url = $url_img_slot.'api/sagameslot_seach.php';
}elseif($type == 'pragmatic'){
	$url = $url_img_slot.'api/Pragmatic.php';
}elseif($type == 'pragmatic_seach'){
	$url = $url_img_slot.'api/Pragmatic_seach.php';
}elseif($type == 'iconic-gaming'){
	$url = $url_img_slot.'api/iconic-gaming.php';
}elseif($type == 'iconic-gaming_seach'){
	$url = $url_img_slot.'api/iconic-gaming_seach.php';
}elseif($type == 'Mafia'){
	$url = $url_img_slot.'api/Mafia.php';
}elseif($type == 'Mafia_seach'){
	$url = $url_img_slot.'api/Mafia_seach.php';
}elseif($type == 'cq9'){
	$url = $url_img_slot.'api/cq9.php';
}elseif($type == 'cq9_seach'){
	$url = $url_img_slot.'api/cq9_seach.php';
}elseif($type == 'fc'){
	$url = $url_img_slot.'api/fc.php';
}elseif($type == 'fc_seach'){
	$url = $url_img_slot.'api/fc_seach.php';
}elseif($type == 'jdb'){
	$url = $url_img_slot.'api/jdb.php';
}elseif($type == 'jdb_seach'){
	$url = $url_img_slot.'api/jdb_seach.php';
}elseif($type == 'jili'){
	$url = $url_img_slot.'api/jili.php';
}elseif($type == 'jili_seach'){
	$url = $url_img_slot.'api/jili_seach.php';
}elseif($type == 'Askmebet'){
	$url = $url_img_slot.'api/Askmebet.php';
}elseif($type == 'Askmebet_seach'){
	$url = $url_img_slot.'api/Askmebet_seach.php';
}elseif($type == 'Live22'){
	$url = $url_img_slot.'api/Live22.php';
}elseif($type == 'Live22_seach'){
	$url = $url_img_slot.'api/Live22_seach.php';
}elseif($type == 'RedTiger'){
	$url = $url_img_slot.'api/RedTiger.php';
}elseif($type == 'RedTiger_seach'){
	$url = $url_img_slot.'api/RedTiger_seach.php';
}elseif($type == 'ITP'){ //close
	$url = $url_img_slot.'api/ITP.php';
}elseif($type == 'ITP_seach'){ //close
	$url = $url_img_slot.'api/ITP_seach.php';
}elseif($type == 'AE'){
	$url = $url_img_slot.'api/AE.php';
}elseif($type == 'AE_seach'){
	$url = $url_img_slot.'api/AE_seach.php';
}elseif($type == 'BNG'){
	$url = $url_img_slot.'api/BNG.php';
}elseif($type == 'BNG_seach'){
	$url = $url_img_slot.'api/BNG_seach.php';
}elseif($type == 'PNG'){
	$url = $url_img_slot.'api/PNG.php';
}elseif($type == 'PNG_seach'){
	$url = $url_img_slot.'api/PNG_seach.php';
}elseif($type == 'GF'){
	$url = $url_img_slot.'api/GF.php';
}elseif($type == 'GF_seach'){
	$url = $url_img_slot.'api/GF_seach.php';
}elseif($type == 'HB'){
	$url = $url_img_slot.'api/HB.php';
}elseif($type == 'HB_seach'){
	$url = $url_img_slot.'api/HB_seach.php';
}elseif($type == 'KINGMAKER'){
	$url = $url_img_slot.'api/KINGMAKER.php';
}elseif($type == 'KINGMAKER_seach'){
	$url = $url_img_slot.'api/KINGMAKER_seach.php';
}elseif($type == 'XE88'){
	$url = $url_img_slot.'api/XE88.php';
}elseif($type == 'XE88_seach'){
	$url = $url_img_slot.'api/XE88_seach.php';
}elseif($type == 'AUG'){
	$url = $url_img_slot.'api/AUG.php';
}elseif($type == 'AUG_seach'){
	$url = $url_img_slot.'api/AUG_seach.php';
}
$ch = curl_init();
curl_setopt_array($ch, array(
	CURLOPT_INTERFACE => $_SERVER["SERVER_ADDR"], /* bypass_cloudflare */
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_SSL_VERIFYPEER => false, //https
	CURLOPT_TIMEOUT => 60,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36",
	CURLOPT_URL => $url
));
$response = curl_exec($ch);
echo $response;