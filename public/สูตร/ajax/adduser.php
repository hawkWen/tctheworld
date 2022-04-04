<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
session_start();
include "../function/database.php";



if (empty($_POST['user'])) {
echo request("error","ผิดพลาด","ไม่สามารถสมัครสมาชิกได้","");
exit();
}

// checkuser
if (strlen($_POST['user']) < 4) {
echo request("error","username ต้องมากกว่า 4 ตัวอักษร","ไม่สามารถสมัครสมาชิกได้","");
exit();
}

if (empty($_POST['pass'])) {
echo request("error","ผิดพลาด","ไม่สามารถสมัครสมาชิกได้","");
exit();
}

if($_POST['pass']!=$_POST['repass']){
echo request("error","ผิดพลาด","รหัสผ่านไม่ตรงกัน","");
exit();
}

if (empty($_POST['credit'])) {
echo request("error","ผิดพลาด","ไม่สามารถสมัครสมาชิกได้","");
exit();
}

if (empty($_POST['txtrank_register'])) {
echo request("error","ผิดพลาด","ไม่สามารถสมัครสมาชิกได้","");
exit();
}

$Check = query("SELECT * FROM user WHERE user = ?",array($_POST['user']));
if($Check->fetch()){
echo request("error","ผิดพลาด","มีผู้ใช้นี้แล้วคับ","");
exit();
}



$Query = query("INSERT INTO user (`user`,`pass`,`email`,`credit`,`ip`,`reg`,`lobby`,`online`,`rank`) VALUES (?,?,?,?,?,?,?,?,?)",array($_POST['user'],$_POST['pass'],'adduser@adduser',$_POST['credit'],'0',time(),'0','0',$_POST['txtrank_register']));
echo request("success","สำเร็จ","สมัครสมาชิกแล้ว","./");
exit();