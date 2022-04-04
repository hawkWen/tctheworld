<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
	header('Content-Type: application/json');
	include "../function/database.php";
	//check_user
	session_start();
	if(empty($_SESSION['user'])){
	  echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
	  exit();
	}
	if($_SESSION['rank'] !=  "admin"){
	  echo request("error","ผิดพลาด","no admin","");
	  exit();
	}
	$Query = query("UPDATE `setting` SET `idline` = ? , `titleweb` = ? , `logo` = ? ,`background_headers` = ? ,`text_headers1` = ? ,`text_headers2` = ? , `background_login` = ? , `txtstatus_register` = ?, `credit_register` = ? WHERE `setting`.`id` = ?",array($_POST['idline'],$_POST['titleweb'],$_POST['logo'],$_POST['background_headers'],$_POST['text_headers1'],$_POST['text_headers2'],$_POST['background_login'],$_POST['txtstatus_register'],$_POST['credit_register'],$_POST['txt_id']));
	$Data = $Query->fetch();
	echo request("success","สำเร็จ","","./?page=m_setting");
	//echo json_encode(array('status' => '1','message'=> 'successfully'));
?>