<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
  /*
  แก้เบอร์โทรไม่มีเลข 0 [Excel]
  1.เปิด Excel
  2.เลือกทั้งแถวแนวตั้ง C
  3.กดคลิกขวา เลือก จัดรูปแบบเซลล์
  4.ไปที่กำหนดเอง ชนิด เปลี่ยนเป็น ==> 0##########
  */
include "../function/database.php";
error_reporting(0);
session_start();
if(empty($_SESSION['user'])){
  echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
  exit();
}
if($_SESSION['rank'] !=  "admin"){
  echo request("error","ผิดพลาด","no admin","");
  exit();
}
?>
<?php
$filename = "member.xls";
header('Content-type: application/xls');
header('Content-Disposition: attachment; filename='.$filename);
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table>
  <tr>
    <td>ลำดับ</td>
    <td>ชื่อ</td>
    <td>เบอร์โทร</td>
    <td>ไลน์</td>
  </tr>
  <?php
  $Query = query("SELECT * FROM user");
  while($row = $Query->fetch()){
	  $id = $row['id'];
	  $user = $row['user'];
	  $phone = $row['phone'];
    $line = $row['line'];
	  echo '<tr>
				<td>'.$id.'</td>
				<td>'.$user.'</td>
				<td>'.$phone.'</td>
        <td>'.$line.'</td>
			</tr>';
  }
  ?>
</table>
</body>
</html>