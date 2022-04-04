<?php
include '../function/database.php';
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$type = $_GET['g'];
$key = $_GET['key'];
$bypass = new RUN();
function ebet(){
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['ebet_genkey'],$post); //ebet
  $response = json_decode($response, true);
  //print_r($response); /* show */
  if($response['status'] == true){
    $decode = $bypass->use_decode($response['data']['en_code']);
   	return json_encode(['status' => true, 'key' => $decode]);
  }else if($response['status'] == false){
    return json_encode(['status' => false, 'key' => 'false']);
  }else{
    return json_encode(['status' => false, 'key' => 'error']);
  }
}
function wm(){
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['wm_genkey'],$post); //wm
  $response = json_decode($response, true);
  //print_r($response); /* show */
  if($response['status'] == true){
    $decode = $bypass->use_decode($response['data']['en_code']);
   	return json_encode(['status' => true, 'key' => $decode]);
  }else if($response['status'] == false){
    return json_encode(['status' => false, 'key' => 'false']);
  }else{
    return json_encode(['status' => false, 'key' => 'error']);
  }
}
function sexy(){
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['sexy_genkey'],$post); //sexy
  $response = json_decode($response, true);
  // print_r($response); /* show */
  if($response['status'] == true){
    $decode = $bypass->use_decode($response['data']['en_code']);
    return json_encode(['status' => true, 'key' => $decode]);
  }else if($response['status'] == false){
    return json_encode(['status' => false, 'key' => 'false']);
  }else{
    return json_encode(['status' => false, 'key' => 'error']);
  }
}
function venus(){
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['venus_genkey'],$post); //venus
  $response = json_decode($response, true);
  //print_r($response); /* show */
  if($response['status'] == true){
    $decode = $bypass->use_decode($response['data']['en_code']);
    return json_encode(['status' => true, 'key' => $decode]);
  }else if($response['status'] == false){
    return json_encode(['status' => false, 'key' => 'false']);
  }else{
    return json_encode(['status' => false, 'key' => 'error']);
  }
}
function dg(){
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['dg_genkey'],$post); //dg
  $response = json_decode($response, true);
  //print_r($response); /* show */
  if($response['status'] == true){
    $decode = $bypass->use_decode($response['data']['en_code']);
    return json_encode(['status' => true, 'key' => $decode]);
  }else if($response['status'] == false){
    return json_encode(['status' => false, 'key' => 'false']);
  }else{
    return json_encode(['status' => false, 'key' => 'error']);
  }
}
function sa(){
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['sa_genkey'],$post); //sa
  $response = json_decode($response, true);
  //print_r($response); /* show */
  if($response['status'] == true){
    $decode = $bypass->use_decode($response['data']['en_code']);
    return json_encode(['status' => true, 'key' => $decode]);
  }else if($response['status'] == false){
    return json_encode(['status' => false, 'key' => 'false']);
  }else{
    return json_encode(['status' => false, 'key' => 'error']);
  }
}
function asia(){
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['asia_genkey'],$post); //asia
  $response = json_decode($response, true);
  //print_r($response); /* show */
  if($response['status'] == true){
    $decode = $bypass->use_decode($response['data']['en_code']);
    return json_encode(['status' => true, 'key' => $decode]);
  }else if($response['status'] == false){
    return json_encode(['status' => false, 'key' => 'false']);
  }else{
    return json_encode(['status' => false, 'key' => 'error']);
  }
}
function bggaming(){
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['bggaming_genkey'],$post); //bggaming
  $response = json_decode($response, true);
  //print_r($response); /* show */
  if($response['status'] == true){
    $decode = $bypass->use_decode($response['data']['en_code']);
    return json_encode(['status' => true, 'key' => $decode]);
  }else if($response['status'] == false){
    return json_encode(['status' => false, 'key' => 'false']);
  }else{
    return json_encode(['status' => false, 'key' => 'error']);
  }
}

$ebet_show = json_decode(ebet(), true);
$wm_show = json_decode(wm(), true);
$sexy_show = json_decode(sexy(), true);
$venus_show = json_decode(venus(), true);
$dg_show = json_decode(dg(), true);
$sa_show = json_decode(sa(), true);
$asia_show = json_decode(asia(), true);
$bggaming_show = json_decode(bggaming(), true);

if($type == 'ebet' && $key == $ebet_show['key'])
{
	$url = 'http://103.82.249.67/ebet/ebet?api_key='.$ebet_show['key'];
	$show = $bypass->oil_ssl($url);
	echo $show;
}
else if($type == 'wm' && $key == $wm_show['key'])
{
	$url = 'https://wm.api25.net/wm/wm?api_key='.$wm_show['key'];
	$show = $bypass->oil_ssl($url);
	echo $show;
}
else if($type == 'sexy' && $key == $sexy_show['key'])
{
  $url = 'https://sexy.api25.net/sexy/Client/se-gaming?api_key='.$sexy_show['key'];
  $show = $bypass->oil_ssl($url);
  echo $show;
}
else if($type == 'venus' && $key == $venus_show['key'])
{
  $url = 'https://venus.api25.net/venus/Client/ve-gaming?api_key='.$venus_show['key'];
  $show = $bypass->oil_ssl($url);
  echo $show;
}
else if($type == 'dg' && $key == $dg_show['key'])
{
  $url = 'https://dg.api25.net/dg/Server/dg?api_key='.$dg_show['key'];
  $show = $bypass->oil_ssl($url);
  echo $show;
}
else if($type == 'sa' && $key == $sa_show['key'])
{
  $url = 'https://sa.api25.net/api/Sagaming/Server/sa-gaming?api_key='.$sa_show['key'];
  $show = $bypass->oil_ssl($url);
  echo $show;
}
else if($type == 'asia' && $key == $asia_show['key'])
{
  $url = 'http://103.82.249.7/asia/asia?api_key='.$asia_show['key'];
  $show = $bypass->oil_ssl($url);
  echo $show;
}
else if($type == 'bggaming' && $key == $bggaming_show['key'])
{
  $url = 'http://103.82.249.27/biggaming/bg/biggaming?api_key='.$bggaming_show['key'];
  $show = $bypass->oil_ssl($url);
  echo $show;
}
?>