<?php
    // Database configuration
    $host = "localhost"; // MySQL hostname
    $dbUserName = "octobet"; // MySQL database username
    $dbPwd = "4Ko6my9013!"; // MySQL database password
    $dbName = "octobet"; // The name of the database
	$table = "squidgame"; // The name of the table

    $tableFilterID = 'squidgame'; // Filter ID
	$tableFilterUsers = "filter_users"; // The name of the filter table (users)
	$tableFilterScores = "filter_scores"; // The name of the filter table (scores)

    // Start connection to database server
    $conn = mysqli_connect($host, $dbUserName, $dbPwd);
	mysqli_set_charset($conn, 'utf8');

    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    // make connection to database
	$db_selected = mysqli_select_db($conn, $dbName);
    if (!$db_selected) {
        die ('Can\'t use database'.$dbName.' : ' . mysqli_connect_error());
    }	
	//mysql_close($link);
?>