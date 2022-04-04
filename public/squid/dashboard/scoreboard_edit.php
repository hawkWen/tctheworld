<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

if($_SESSION['admin_type']!='super'){
	$_SESSION['failure'] = "You don't have permission to perform this action";
	header('location: scoreboard.php');
	exit;
}

// Sanitize if you want
$score_id = filter_input(INPUT_GET, 'score_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
//Handle update request 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $score_id = filter_input(INPUT_GET, 'score_id', FILTER_VALIDATE_INT);

    $data_to_update = filter_input_array(INPUT_POST);
    
    $db->where('id',$score_id);
	$stat = $db->update($table_scoreboards[$_SESSION['table_index']]['table'], $data_to_update);
	$db->where('id',$score_id);
	$details = $db->getOne($table_scoreboards[$_SESSION['table_index']]['table']);
	
    if($stat)
    {
        $_SESSION['success'] = "User score <strong>".$details['email']."</strong> updated successfully!";
        header('location: scoreboard.php');
        exit();
    }
}



if($edit)
{
    $db->where('id', $score_id);
    $scoreboard= $db->getOne($table_scoreboards[$_SESSION['table_index']]['table']);

}

require_once 'includes/header.php';
?>

<main>
	<div class="container-fluid">
		<h1 class="mt-4">Edit Score</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="scoreboard.php">Scoreboard</a></li>
			<li class="breadcrumb-item active">Edit Score</li>
		</ol>
		
		<div class="card mb-4">
			<div class="card-header">
				<span class="fa fa-user-edit fa-fw"></span> User Score Details
			</div>
			<div class="card-body">
				 <?php
				include('./includes/flash_messages.php')
				?>
				<form class="" action="" method="post" enctype="multipart/form-data" id="scoreboard_form">
					<?php  include_once('./includes/forms/scoreboard_form.php'); ?>
				</form>
			</div>
		</div>
	</div>
</main>

<?php include_once 'includes/footer.php'; ?>