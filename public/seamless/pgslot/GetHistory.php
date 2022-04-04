<?php
// session_start();
require_once __DIR__ . '/../../config/dbmodel.php';
require_once __DIR__ . '/../../config/function.php';

$site = include(__DIR__ . '/../../config/site.php');
$pg = include(__DIR__ . '/../../config/pg.php');

// $get_history_url = $pg['PgSoftAPIDomain'] . $pg['get_bet_history_url'];
$get_history_url = "http://ep.myserver.local/providers/pg/gethistory-test.php";
// echo $get_history_url;
// exit();

$row_version = 1;
$unix_timestamp = round(microtime(true) * 1000);

$sql = "SELECT * FROM bet_history_pg ORDER BY unix_timestamp  DESC LIMIT 1";
$query_result = $mysqli->query($sql);
$num_rows = $query_result->num_rows;

if ($num_rows !== 0) {
    $row_result = $query_result->fetch_assoc;
    $row_version = $row_result['unix_timestamp'];
}

$data_array = array(
"operator_token" => $pg['operator_token'],
"secret_key" => $pg['secret_key'],
"count" => 5000,
"bet_type" => 1,
"row_version" => $row_version,
"hands_status" => 0
);

$result = callAPI("POST",$get_history_url,$data_array);
$data = json_decode($result,true);

// echo $result;
$arr_count = count($data['data']);
if ($arr_count <= 0) {
    echo "No data return";
    exit();
}

// for ($i=0 ; $i < $arr_count ; $i++ ) {
    // echo $data['data'][$i]['betId'];
// }

$sql = "INSERT INTO bet_history_pg (provider_code,data_json,unix_timestamp) VALUES ('pgs','" . $result . "','" . $unix_timestamp . "')";
$date = new DateTime("@$unix_timestamp");
// echo $sql;
$mysqli->begin_transaction();
try {
    if ($mysqli->query($sql) == TRUE) {
        $mysqli->commit();
        echo "\n\rSuccess!!!!  " . $date->format('U = Y-m-d H:i:s');
    } else {
        echo $mysqli->error;
    }
} catch (Exception $e) {
    $mysqli->rollback();
    echo "\n\rError!!!!  ";
}
