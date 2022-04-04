<?php

require_once __DIR__ . '/../inc/database.php';
require_once __DIR__ . '/../inc/function.php';
require_once __DIR__ . '/pg-function.php';

$trx_id = $_REQUEST['trx_id'] ?? $_POST['trx_id'] ?? $_GET['trx_id'] ?? NULL;

header("Content-type: application/json; charset=utf-8");

if ($trx_id == NULL) {
  echo json_encode([
    'code' => 404,
    'msg' => "Invalid arguments"
  ]);
}

$sql = "SELECT * FROM pg_trx WHERE action='TransferIn' OR action='TransferOut' ORDER BY id DESC";
$result = $mysqli->query($sql);
foreach ($result as $row) {
  $arr_data = json_decode($row['data'], true);
  if (trim($trx_id) == trim($arr_data['transaction_id'])) {
    echo json_encode($row);
    break;
  }
}
