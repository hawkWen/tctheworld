<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
session_start();
include "../function/database.php";

if(empty($_SESSION['user'])){
$arr = array("status"=>"error");
echo json_encode($arr);
exit();
}else{
$Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));	
$Data = $Query->fetch();
// var_dump($Data);
	if($Data['credit'] >= 5){
		$point = query("UPDATE user SET credit = credit-5 WHERE user = ?",array($_SESSION['user']));
		// $arr = array("status"=>"ok");
		// echo json_encode($arr);
		echo "ok";
	}else{
		echo "nopoint";
		// $arr = array("status"=>"nopoint");
		// echo json_encode($arr);
	}

}

