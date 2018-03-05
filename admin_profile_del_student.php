<?php
include('db_conn.php');
//$sid =$_REQUEST['studentid'];
$userid_del = $_POST['userid_del'];
$sid=$userid_del;
//$del2="delete FROM student_details WHERE student_id = '$sid'";
$del1="delete FROM users_details WHERE user_id = '$sid'";
	// mysql_query($del2) or die("Delete Student id Error"); 
	mysql_query($del1) or die("Delete user id Error"); 
	echo "Deleted student data";	
	header("Location: student_details.php");			
?>