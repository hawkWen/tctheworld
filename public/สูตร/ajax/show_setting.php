<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
session_start();
include "../function/database.php";
header('Content-Type: application/json');
$resultArray = array();
$Query = query("SELECT * FROM setting WHERE id = ?",array('1'));
	while($oil = $Query->fetch()){
		array_push($resultArray,$oil);
	}
	//var_dump($resultArray);
	echo json_encode($resultArray);

?>