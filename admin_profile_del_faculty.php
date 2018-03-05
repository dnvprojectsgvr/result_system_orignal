<?php
include('db_conn.php');
//$sid =$_REQUEST['studentid'];
$userid_del = $_POST['userid_del'];
$fid=$userid_del;
//$del2="delete FROM faculty_details WHERE student_id = '$fid'";
$del1="delete FROM users_details WHERE user_id = '$fid'";
	// mysql_query($del2) or die("Delete faculty id Error"); 
	mysql_query($del1) or die("Delete user id Error"); 
	echo "Deleted faculty data";	
	header("Location: faculty_details.php");
?>