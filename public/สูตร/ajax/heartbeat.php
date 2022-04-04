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
}

$Query = query("UPDATE user SET lobby = 1 WHERE user = ?",array($_SESSION['user']));

// $Query = query("UPDATE user SET lobby = lobby+1 WHERE user = ?",array($_SESSION['user']));
// $Data = $Query->fetch();
// echo $Data;
