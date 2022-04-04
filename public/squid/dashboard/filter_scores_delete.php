<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: filter_scores.php');
        exit;

	}
    $score_id = $del_id;
    $db->where('id', $score_id);
	$details = $db->getOne($table_filter_scores);
	$db->where('id', $score_id);
    $status = $db->delete($table_filter_scores);
    
    if ($status) 
    {
        $_SESSION['info'] = "Filter <strong>".$details['game']."</strong> deleted successfully!";
        header('location: filter_scores.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete filter";
    	header('location: filter_scores.php');
        exit;

    }
    
}