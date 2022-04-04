<?php 

define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER','dashboard');


require_once BASE_PATH.'/lib/MysqliDb.php';

$servername = "bf-db-do-user-9769521-0.b.db.ondigitalocean.com:25060";
$username = "doadmin";
$password = "gw5fan9q0mj1ya6c";
$dbname = "bf13new";

//tables
$table_admin = 'admin_accounts';
$table_filter_users = 'filter_users';
$table_filter_scores = 'filter_scores';

$table_scoreboards = array(
    array(
        'id' => 'squidgame',
        'name' => 'Betflik13 Squid Game',
        'table' => 'squidgame',
        'score' => 'point'
    )
);

//session app
$session_app = 'scoreboardadmin';

// create connection object
$db = new MysqliDb($servername,$username,$password,$dbname);