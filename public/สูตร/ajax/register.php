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
// checkpass
if (strlen($_POST['pass']) < 6) {
echo request("error","pass ต้องมากกว่า 6 ตัวอักษร","ไม่สามารถสมัครสมาชิกได้","");
exit();
}

// checkrepass
if (strlen($_POST['repass']) < 6) {
echo request("error","repass ต้องมากกว่า 6 ตัวอักษร","ไม่สามารถสมัครสมาชิกได้","");
exit();
}
if($_POST['pass']!=$_POST['repass']){
echo request("error","ผิดพลาด","รหัสผ่านไม่ตรงกัน","");
exit();
}


if (empty($_POST['line'])) {
echo request("error","ผิดพลาด","ไม่สามารถสมัครสมาชิกได้","");
exit();
}
if (strlen($_POST['line']) < 3) {
echo request("error","รูปแบบ line ของคุณไม่ถูกต้อง","ไม่สามารถสมัครสมาชิกได้","");
exit();
}



// checkphone
$phone = $_POST['phone'];
if (strlen($phone) < 10) {
echo request("error","phone ต้องมากกว่า 10 ตัว","ไม่สามารถสมัครสมาชิกได้","");
exit();
}
if(!preg_match("/^[0-9]{10}$/", $phone)) {
echo request("error","ต้องเป็นตัวเลขเท่านั้น","ไม่สามารถสมัครสมาชิกได้","");
exit();
}
$array = str_split($phone);
if($array[1] != "6" and $array[1] != "8" and $array[1] != "9") {
echo request("error","รูปแบบเบอร์โทรไม่ถูกต้อง","ไม่สามารถสมัครสมาชิกได้","");
exit();
}



// if (empty($_POST['email'])) {
// echo request("error","ผิดพลาด","ไม่สามารถสมัครสมาชิกได้","");
// exit();
// }

// checkmail
// if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
// echo request("error","ผิดพลาด","รูปแบบเมลไม่ถูกต้อง","");
// exit();
// }


$Check = query("SELECT * FROM user WHERE user = ?",array($_POST['user']));
if($Check->fetch()){
echo request("error","ผิดพลาด","มีผู้ใช้นี้แล้วคับ","");
exit();
}


$Query_setting = query("SELECT * FROM setting WHERE id = ?",array('1'));
$Acc_setting = $Query_setting->fetch();

$Query = query("INSERT INTO user (`user`,`pass`,`email`,`credit`,`ip`,`reg`,`lobby`,`online`,`rank`,`line`,`phone`) VALUES (?,?,?,?,?,?,?,?,?,?,?)",array($_POST['user'],$_POST['pass'],'register@register',$Acc_setting["credit_register"],'0',time(),'0','0','user',$_POST['line'],$phone));
echo request("success","สำเร็จ","สมัครสมาชิกแล้ว","./");
exit();