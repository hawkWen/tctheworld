<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
	/* ใช้กับสล๊อตและบอล */
    session_start();
    include "../function/database.php";
	$Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));
	$Data = $Query->fetch();
	if(!$Data)
	{
	echo request("error","ผิดพลาด","ไม่พบผู้ใช้งานนี้","");
	}else{
			date_default_timezone_set('Asia/Bangkok');
			//$timestamp = strtotime('now') + 60*60;
			$timestamp = strtotime('now') + 60*20;
			//$timestamp = strtotime('now') + 180; //test
			$time = date('H:i', $timestamp);
			$update_time = query("UPDATE user SET online = ? WHERE user = ?",array($time,$_SESSION['user']));
			echo "ok";
			exit();
	}
?>

