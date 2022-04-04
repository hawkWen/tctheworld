<?php
require_once("KasikornBank.class.php");
$kbank = new KasikornBank("Username", "Password","0","cookie.txt"); //ชื่อผู้ใช้,รหัสผ่าน,ProfileID ปกติใช้ 0,cookie file path
$login = $kbank->Login();
if ($login) {
    $Account = $kbank->getBankAccount();
    $acc = $Account["ownAccountList"]["0"];
	
    //โอนผ่านธนาคาร (ต่างธนาคาร) รหัสธนาคารของบัญชีปลายทาง,เลขบัญชีปลายทาง,จำนวนเงิน,เลขบัญชีต้นทาง,ชื่อบัญชีต้นทาง     (รหัสธนาคาร : https://th.wikipedia.org/wiki/รายชื่อธนาคารในประเทศไทย)
	$transfer = $kbank->bankTransferOrft("014","0000000000","100",$acc["accountNo"],$acc["accountName"]);
    //โอนผ่านธนาคาร (ธนาคารเดียวกัน)
    //$transfer = $kbank->bankTransferOther("014","0000000000","100",$acc["accountNo"],$acc["accountName"]);

    // โอนผ่านพร้อมเพย์ ด้วย บัตรประชาชน เลขบัตรประชาชน,จำนวนเงิน,เลขบัญชีต้นทาง,ชื่อบัญชีต้นทาง
	//$transfer = $kbank->promptpayIDTransfer("000000000000","100",$acc["accountNo"],$acc["accountName"]);

    // โอนผ่านพร้อมเพย์ ด้วย เบอร์โทร เบอร์โทร,จำนวนเงิน,เลขบัญชีต้นทาง,ชื่อบัญชีต้นทาง
	//$transfer = $kbank->promptpayPhoneTransfer("0000000000","100",$acc["accountNo"],$acc["accountName"]);

	$credentials = $kbank->ExportCredentials();  
}
?>
<pre>
<?php print_r($transfer); ?>
</pre>

<form action="verify.php" method="post">
    <label >credentials:</label>
    <input type="text" id="credentials" name="credentials" value='<?php echo $credentials; ?>'><br>
    <label >transfer:</label>
    <input type="text" id="transfer" name="transfer" value='<?php echo json_encode($transfer); ?>'><br>
    <label >otp:</label>
    <input type="text" id="otp" name="otp"><br>
    <input type="submit" value="Submit">
</form>