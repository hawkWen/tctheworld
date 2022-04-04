<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

if($_SESSION['admin_type']!='super'){
	$_SESSION['failure'] = "You don't have permission to perform this action";
	header('location: admin_users.php');
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$data_to_store = filter_input_array(INPUT_POST);
	
    //Password should be md5 encrypted
    $data_to_store['passwd'] = md5($data_to_store['passwd']);
    $last_id = $db->insert ($table_admin, $data_to_store);
	
    if($last_id)
    {
    	$_SESSION['success'] = "Admin user added successfully!";
    	header('location: admin_users.php');
    	exit();
    }  
    
}

$edit = false;


require_once 'includes/header.php';
?>

<main>
	<div class="container-fluid">
		<h1 class="mt-4">Add Admin User</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="members.php">Admin Accounts</a></li>
			<li class="breadcrumb-item active">Add Admin User</li>
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