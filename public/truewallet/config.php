<?php 

$db_host        = '192.168.168.40';
$db_user        = 'dba';
$db_pass        = '4Ko6my9013!';
$db_database    = 'onlyfun88'; 
$db_port        = '3306';

$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_database,$db_port);

$mysqli->query("SET time_zone = '+7:00'");

define('TIMEZONE', 'Asia/Bangkok');
date_default_timezone_set(TIMEZONE);

?>