<?php 

$db_host        = '192.168.168.40';
$db_user        = 'dba';
$db_pass        = '4Ko6my9013!';
$db_database    = 'onlyfun88'; 
$db_port        = '3306';


$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_database,$db_port);


$db_host2        = '192.168.168.40';
$db_user2        = 'dba';
$db_pass2        = '4Ko6my9013!';
$db_database2    = 'otb_production'; 
$db_port2        = '3306';


$mysqli2 = new mysqli($db_host2,$db_user2,$db_pass2,$db_database2,$db_port2);

$mysqli->query("SET time_zone = '+7:00'");
$mysqli2->query("SET time_zone = '+7:00'");

define('TIMEZONE', 'Asia/Bangkok');
date_default_timezone_set(TIMEZONE);

?>