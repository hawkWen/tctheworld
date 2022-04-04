<?php
	//var_dump($_POST);
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
//error_reporting(0);
session_start();
include "../function/database.php";
if(empty($_SESSION['user'])){
	$arr = array("status"=>"error");
	echo json_encode($arr);
exit();
}else{
	$username = $_POST['username'];
	$password_old = $_POST['password_old'];
	$password_new = $_POST['password_new'];
	$password_new_confirm = $_POST['password_new_confirm'];
	$check = query("SELECT * FROM user WHERE user = ?",array($username));
	$data_check = $check->fetch();
	if($password_old == $data_check["pass"] && $password_new == $password_new_confirm) {
	 /*update*/
	 $addpoint = query("UPDATE user set pass = ? WHERE user = ?",array($password_new_confirm,$username));
     echo "success";
     exit();
	}else{
	 echo "nosuccess";
	 exit();
	}

}
?>