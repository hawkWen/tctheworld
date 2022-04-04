<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');

if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{
	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: admin_users.php');
        exit;

	}
    $member_id = $del_id;
    $db->where('id', $member_id);
	$details = $db->getOne($table_admin);
	$db->where('id', $member_id);
    $status = $db->delete($table_admin);
    
    if ($status) 
    {
        $_SESSION['info'] = "Admin account <strong>".$details['user_name']."</strong> deleted successfully!";
        header('location: admin_users.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete admin account";
    	header('location: admin_users.php');
        exit;

    }
    
}