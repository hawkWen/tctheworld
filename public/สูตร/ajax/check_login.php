<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
	/* ใช้กับสล๊อตและบอล */
	error_reporting(0);
	include "../function/database.php";
	session_start();
	date_default_timezone_set('Asia/Bangkok');
	$Presenttime = strtotime('now');
	/*
	echo "Presenttime : ".date('d-m-Y H:i:s', $Presenttime); //แสดงค่าเป็นวันเวลาที่แท้จริง;
	echo "<br>";
	*/
	

	$Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));
    $Data = $Query->fetch();

	/*
    var_dump($Data);
    echo "<br>";
	*/

    $ts1 = strtotime($Data['online']);
    /*
    echo "ts1 : ".date('d-m-Y H:i:s', $ts1);
    echo "<br>";
    */
    


	/*
	echo "ts1 : ".$ts1;
	echo "<br>";
	echo "Presenttime : ".$Presenttime;
	echo "<br>";
	*/
	
	
	
	if($ts1 > $Presenttime){
		echo "1";
	}else{
		echo "0";
	}	
	
		




	//ts1 : 1606238400 < Presenttime : 1606321813
?>