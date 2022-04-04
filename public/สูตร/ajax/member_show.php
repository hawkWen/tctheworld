<?php
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

$request = 1;
if(isset($_POST['request'])){
   $request = $_POST['request'];
}

// DataTable data
if($request == 1){
   ## Read value
   $draw = $_POST['draw'];
   $row = $_POST['start'];
   $rowperpage = $_POST['length']; // Rows display per page
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $searchValue = $_POST['search']['value']; // Search value


   ## Search 
   $searchQuery = " ";
   if($searchValue != ''){
      $searchQuery = " and (user like '%".$searchValue."%' or 
         email like '%".$searchValue."%') ";
   }

   $sel = query("select count(*) as allcount from user");
   $records = $sel->fetch();
   $totalRecords = $records['allcount'];

   $sel = query("select count(*) as allcount from user WHERE 1 ".$searchQuery);
   $records = $sel->fetch();


   $totalRecordwithFilter = $records['allcount'];

   ## Fetch records
   $empQuery = query("select * from user WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage);
   $data = array();

   while ($row = $empQuery->fetch()) {

     // Update Button
     $updateButton = "<button class='btn btn-sm btn-info updateUser' data-id='".$row['id']."' data-toggle='modal' data-target='#updateModal' >แก้ไข</button>";

     // Delete Button
     $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row['id']."'>ลบ</button>";

     $action = $updateButton." ".$deleteButton;

     $data[] = array(
       "id" => $row['id'], 
       "user" => $row['user'],
       "email" => $row['email'],
       "line" => $row['line'],
       "phone" => $row['phone'],
       "credit" => $row['credit'],
       "rank" => $row['rank'],
       "action" => $action
     );
   }

   ## Response
   $response = array(
     "draw" => intval($draw),
     "iTotalRecords" => $totalRecords,
     "iTotalDisplayRecords" => $totalRecordwithFilter,
     "aaData" => $data
   );
   echo json_encode($response);
   exit;
}

// Fetch user details
if($request == 2){
   $id = 0;

   if(isset($_POST['id'])){
      $id = $_POST['id'];
   }

   $record = query("SELECT * FROM user WHERE id=".$id);
   $response = array();
   $row_count = $record->rowCount();
   if ($row_count > 0){
      $row = $record->fetch();
      $response = array(
       "id" => $row['id'], 
       "user" => $row['user'],
       "email" => $row['email'],
       "line" => $row['line'],
       "phone" => $row['phone'],
       "credit" => $row['credit'],
       "rank" => $row['rank'],
      );
      echo json_encode( array("status" => 1,"data" => $response) );
      exit;
   }else{
      echo json_encode( array("status" => 0) );
      exit;
   }
}

//Delete User
if($request == 4){
   $id = 0;

   if(isset($_POST['id'])){
      $id = $_POST['id'];
   }

   // Check id
   $record = query("SELECT id FROM user WHERE id=".$id);
    if ($record->fetchColumn() > 0){
      query("DELETE FROM user WHERE id=".$id);
      echo 1;
      exit;
   }else{
      echo 0;
      exit;
   }
}