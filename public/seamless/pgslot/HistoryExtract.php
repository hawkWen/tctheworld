<?php
// session_start();
require_once __DIR__ . '/../../config/dbmodel.php';
require_once __DIR__ . '/../../config/function.php';

$site = include(__DIR__ . '/../../config/site.php');
$pg = include(__DIR__ . '/../../config/pg.php');

$sql = "SELECT * FROM bet_history_pg WHERE extract_status='0' ORDER BY unix_timestamp";
// echo "sql : $sql";

$query_result = $mysqli->query($sql);
$num_rows = $query_result->num_rows;
// echo "num_rows : $num_rows" . "<BR>";
// exit();

if ($num_rows == 0) {
    exit();
}

$id_update_array = array();
$values_array = array();
$columns = "";

foreach ($query_result as $row) {
    $id_update_array[] = $row['id'];
    $array_data = json_decode($row['data_json'],TRUE);
    $array_count = count($array_data['data']);
    if ($array_count > 0) {
        $columns = "(`" . implode("`,`", array_keys($array_data['data'][0])) . "`)";
    }
    for ($i=0; $i < $array_count; $i++) {
        $values_array[]  = "('" . implode("','", array_values($array_data['data'][$i])) . "')";
    }
}
    // echo "<pre>";
    // var_dump($id_update_array);
    // echo "</pre>";

if ($num_rows !== 0) {
    $sql = "INSERT INTO `bet_history_detail_pg` $columns VALUES " . implode(',', $values_array);
    $mysqli->begin_transaction();
    try {
        if ($mysqli->query($sql) == TRUE) {

            $sql = "UPDATE bet_history_pg SET extract_status = (CASE id ";
            // $sql_WHERE = " WHERE id IN (";

            for ($i=0;$i<count($id_update_array);$i++) {
                $sql .= " WHEN " . $id_update_array[$i] . " THEN '1' ";
            }
            $sql .= " END)" . " WHERE id IN (" . implode(",",$id_update_array) . ");";

            if ($mysqli->query($sql) == TRUE) {               
            }

            $mysqli->commit();
            echo "Extract bet history successful!!! " . $date->format('U = Y-m-d H:i:s');
        } else {
            echo $mysqli->error;
        }
    } catch (Exception $e) {
        $mysqli->rollback();
        echo $mysqli->error;
    }
    // echo "<pre>";
    // var_dump($sql);
    // echo "</pre>";
}

?>