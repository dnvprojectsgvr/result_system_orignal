<?php
session_start();
include 'db_conn.php';
if(isset($_SESSION['adminid']))
{
	$uidl=strtolower($_SESSION['adminid']);
	$res=mysql_query("select * from admin_reg where adminid='$uidl'")or die("query error");
	$row=mysql_fetch_row($res);
	$full_nameu=strtoupper($row[0]);
	echo "WELCOME :".$full_nameu."<br>";
	echo "<br><br>";
}
else
{
	header('location:index.php');
}
?>
<html>
<head>
<title>Profile Page</title>
</head>
<body>
<form>
	<a href="details_faculty.php">Faculty Details</a>
	<a href="details_student.php">Student Details</a>
	<a href="profile_edit_admin.php">Profile Edit</a>
	<a href="profile_changepassword_admin.php">Profile ChangePassword</a>
    <a href="logout.php"> LOGOUT </a>
 </form>
</body>
</html>