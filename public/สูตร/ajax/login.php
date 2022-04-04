<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */

/* ใช้สำหรับคอสแพทฟอมเรียกคุกกี้มาเก็บไว้สำหรับใช้ iframe ไม่สามารถใช้กับหน้าไม่ระบุตัวตนได้ */
/*
header("Access-Control-Allow-Origin: *");
session_set_cookie_params([
            'lifetime' => time() + 86400,
            'path' => '/',
            'domain' => '.xn--12cm4bi0dd1c2a0c2ch1q.com',
            'secure' => true,
            'httponly' => false,
            'samesite' => 'NONE'
        ]);
*/
session_start();

include "../checkr/index.php";
include "../function/database.php";

if(empty($_POST['user'])){
echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
exit();
}

if(empty($_POST['pass'])){
echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
exit();
}




///////////////////////////////
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$oil = generateRandomString();
///////////////////////////////
$updatekey = query("UPDATE user SET genkey_login = ? WHERE user = ?",array($oil,

$_POST['user']));



$Query = query("SELECT * FROM user WHERE user = ? AND pass = ?",array($_POST

['user'],$_POST['pass']));
$Data = $Query->fetch();
if(!$Data)
{
echo request("error","ผิดพลาด","ไม่พบผู้ใช้งานนี้","");
}else{

	//if((time()-$Data['online'])>60){
		date_default_timezone_set('Asia/Bangkok');
		//$timestamp = strtotime('now') + 60*60;

		$timestamp = strtotime('now') + 60*20;

		//$timestamp = strtotime('now') + 180; //test


		$time = date('H:i', $timestamp);
		$update_time = query("UPDATE user SET online = ? WHERE user = 

?",array($time,$_POST['user']));
		//$_SESSION['time_login'] = $time;
		$_SESSION['user'] = $Data['user'];
		$_SESSION['rank'] = $Data['rank'];
		$_SESSION["genkey_login"] = $Data["genkey_login"];
		echo request("success","สำเร็จ","ยินดีต้อนรับคับ ".$_SESSION['user'],"./");
		exit();
	//}else{
		//echo request("error","ผิดพลาด","มีการเข้าสู่ระบบบัญชีนี้อยู่","");
		//exit();
	//}
	

}