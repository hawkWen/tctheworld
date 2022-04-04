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

//$Query = query("UPDATE user SET online = ? WHERE user = ?",array(time(),$_SESSION['user']));


//check_genkey
$Query_check = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));
$Data_check = $Query_check->fetch();

if($Data_check["genkey_login"] == $_SESSION["genkey_login"])
{
	echo "0";
}
else
{
	echo "1";
}