<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
//header('Content-Type: application/json');
error_reporting(0);
session_start();
include "../function/database.php";

if(empty($_SESSION['user'])){
	echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
	exit();
}
else
{
	$Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));	
	$Data = $Query->fetch();
}


$Query1 = query("SELECT id , user , room , date , result , count(*) as number FROM statisctic_gclub WHERE room = ? AND date = ? AND user = ? AND result != 'cancel' AND result != 'wait' AND result != 'tle1' GROUP BY result ORDER BY id DESC",array($_GET['room'],date("d-m-Y"),$_SESSION['user']));


$oil_lostwin = array();
$oil_number = array();
while($Data1 = $Query1->fetch())
{
	$oil_number[] = $Data1['number'];
	$oil_lostwin[] = $Data1['result'];
	//echo $Data1["result"];
	//echo $Data1["number"];
}
$values = array(
    array('WinLose', 'Number'),
    array($oil_lostwin[1], intval($oil_number[1])),
    array($oil_lostwin[0], intval($oil_number[0])),
);
echo json_encode($values);
exit();
?>