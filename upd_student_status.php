<?php
include('db_conn.php');
//$sid =$_REQUEST['studentid'];
$userid_status = $_POST['userid_status'];
$sid=$userid_status;
$result = mysql_query("select status from users_details where user_id='$sid'");
$test = mysql_fetch_array($result);
$status_achg="active";
$status_dchg="deactive";
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$status=$test['status'] ;
		
if($status=="active")
{
	mysql_query("UPDATE users_details SET status ='$status_dchg' WHERE user_id = '$sid'")
				or die(mysql_error()); 
	echo "Deactive Saved!";
	
	header("Location: student_details.php");			
}
else
{
	mysql_query("UPDATE users_details SET status ='$status_achg' WHERE user_id = '$sid'")
				or die(mysql_error()); 
	echo "active Saved!";
	
	header("Location: student_details.php");
}
?>