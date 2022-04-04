<?php 

$db_host        = 'localhost';
$db_user        = 'octobet';
$db_pass        = '4Ko6my9013!';
$db_database    = 'octobet'; 
$db_port        = '3306';


$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_database,$db_port);


$config['operator_token'] = '18D792F1-8F8F-4515-9F52-1F4003B2477D';
$config['secret_key'] = '1010E9EB337B4DAB846449D4758A15FA';
?>