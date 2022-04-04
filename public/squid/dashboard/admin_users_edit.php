<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

if($_SESSION['admin_type']!='super'){
	$_SESSION['failure'] = "You don't have permission to perform this action";
	header('location: admin_users.php');
	exit;
}

$admin_user_id=  filter_input(INPUT_GET, 'admin_user_id');
//Serve POST request.  
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    // Sanitize input post if we want
    $data_to_update = filter_input_array(INPUT_POST);
    $admin_user_id=  filter_input(INPUT_GET, 'admin_user_id',FILTER_VALIDATE_INT);
	
    //Encrypting the password
    if (empty($data_to_update['passwd'])){
		unset($data_to_update['passwd']);		
	}else{
		$data_to_update['passwd']=md5($data_to_update['passwd']);	
	}
    
    $db->where('id',$admin_user_id);
    $stat = $db->update ($table_admin, $data_to_update);
	$db->where('id',$admin_user_id);
	$details = $db->getOne($table_admin);
    
    if($stat)
    {
        $_SESSION['success'] = "Admin user <strong>".$details['user_name']."</strong> has been updated successfully";
		header('location: admin_users.php');
		exit();
    }
    else
    {
        $_SESSION['failure'] = "Failed to update Admin user";
    }
    
}


$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
//Select where clause
$db->where('id', $admin_user_id);

$admin_account = $db->getOne($table_admin);



// Set values to $row

// import header
require_once 'includes/header.php';
?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Edit Admin User</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="members.php">Admin Users</a></li>
			<li class="breadcrumb-item active">Edit Admin User</li>
		</ol>
		
		<div class="card mb-4">
			<div class="card-header">
				<span class="fa fa-user-edit fa-fw"></span> Admin User Details
			</div>
			<div class="card-body">
				 <?php
				include('./includes/flash_messages.php')
				?>
				<form class="" action="" method="post" enctype="multipart/form-data" id="admin_users_form">
					<?php  include_once('./includes/forms/admin_users_form.php'); ?>
				</form>
			</div>
		</div>
	</div>
</main>

<?php include_once 'includes/footer.php'; ?>