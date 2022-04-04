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
		echo "ok";
}

