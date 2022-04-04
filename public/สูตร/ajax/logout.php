<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
session_start();
include "../function/database.php";

if(empty($_SESSION['user'])){
echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
exit();
}else{
$Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));	
$Data = $Query->fetch();
}

$Query = query("UPDATE user SET online = 0 WHERE user = ?",array($Data['user']));
unset($_SESSION['user']);
unset($_SESSION['time_login']);