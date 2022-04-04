<?php
/* อนุญาติให้เข้าถึงแบบคอสแบบฟอม */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

date_default_timezone_set("Asia/Bangkok");

/*
Username: ncfdzkjn
Password: RsHq+z8sI5U)37
Control Panel URL: http://serv.thank.cloud:2222/
*/

// prepare database connection variables
$db_host = 'localhost';
$db_name = 'octotest';
$db_user = 'octobet';
$db_pass = '4Ko6my9013!';

// connect
try {
    // If you change db server system, change this too!
    $engine = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
    //echo "Connected to database";
}
catch (PDOException $e) {
    echo $e->getMessage();
}

/*
/*remote ip phpmyadmin xampp*/
/*
$host = '174.138.54.123';
$db   = 'formula';
$user = 'mega_bb';
$pass = '@@wdQDYzsvdnxU2JRj';
$port = "3306";
$charset = 'utf8mb4';
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {
     $pdo = new PDO($dsn, $user, $pass, $options);

} catch (PDOException $e) {
     throw new PDOException($e->getMessage(), (int)$e->getCode());
}
*/

function query($sql,$array=array()){
    global $engine;
    $q = $engine->prepare($sql);
    $q->execute($array);
    return $q;
}

function request($status,$title,$info,$href){
header('Content-Type: application/json');
$json = array(
"status"=>$status,
"title"=>$title,
"info"=>$info,
"href"=>$href,
"time"=>time()
);
return @json_encode($json, JSON_UNESCAPED_UNICODE );
}
/////////Check_Web/////////
$Presenttime = strtotime('now');
date_default_timezone_set('Asia/Bangkok');
$ts1 = strtotime("08-01-2022 09:09:00");
//if($Presenttime > $ts1){
//echo "หมดอายุ";
//exit();
//}
/////////API_KEY/////////
$GLOBALS['sa_genkey'] = "https://sa.api25.net/api/Sagaming/gen_key_cache.php";
$GLOBALS['dg_genkey'] = "https://dg.api25.net/dg/gen_key_cache.php";
$GLOBALS['sexy_genkey'] = "https://sexy.api25.net/sexy/gen_key_cache.php";
$GLOBALS['venus_genkey'] = "https://venus.api25.net/venus/gen_key_cache.php";
$GLOBALS['wm_genkey'] = "https://wm.api25.net/gen_key_cache.php";
$GLOBALS['asia_genkey'] = "https://ag.api25.net/gen_key_cache.php";
$GLOBALS['bggaming_genkey'] = "https://bg.api25.net/biggaming/gen_key_cache.php";
$GLOBALS['ebet_genkey'] = "https://ebet.api25.net/gen_key_cache.php";

/////////SETTING_WEB/////////
$url_img_slot = 'https://service789.com/aislot/';
//$url_base_casino = 'http://103.82.249.32/all/';

$root = '';
if(!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])){
    $root .= $_SERVER['HTTP_X_FORWARDED_PROTO'].'://';
    //echo $root;
    $web_url = ''; //มีssl ถ้าไม่มี /all ให้เว้นว่าง
}else{
    $root .= !empty($_SERVER['HTTPS']) ? "https://" : "http://";
    //echo $root;
    $web_url = 'http://103.82.249.32/all/'; //ไว้ทดสอบถ้ามีโฟลเดอร์แต่ไม่ได้ติดตั้งssl ==> http://103.82.249.32/all
}
//exit();

class RUN 
{
	function Hook($url,$data)
	{
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //https
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
	}
    function oil_ssl($url)
    {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_SSL_VERIFYPEER => false, //https Addon 14/08/64
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36",
            CURLOPT_URL => $url
        ));
        $response = curl_exec($ch);
        return $response;
    }
}


class oilhackzone
{
    /*ถอดรหัส*/
    function decodestring($string,$key="oilhackzoneoilhackzoneoilhackzone",$j=0) {
        $string = base64_decode($string);
        $key = sha1($key);
        $hash = "";
        $strLen = strlen($string);
        $keyLen = strlen($key);
        for ($i = 0; $i < $strLen; $i+=2) {
            $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
            if ($j == $keyLen) { $j = 0; }
            $ordKey = ord(substr($key,$j,1));
            $j++;
            $hash .= chr($ordStr - $ordKey);
        }
        return $hash;
    }
    function use_decode($string,$use=1){
        if($use ==1) return $this->decodestring($string);
        else return $string;    
    }
    function curl_post($url,$data){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //https
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
?>
<?php
    //include 'encryption/api_casino_encode_2.php';
?>