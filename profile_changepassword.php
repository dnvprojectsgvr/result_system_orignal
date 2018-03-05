<!doctype html>
<html>
<head>
<title>Profile ChangePassword</title>
<script src="profile_change_password.js"></script>
</head>
<body>
<?php
include('db_conn.php');
session_start();
if(isset($_SESSION['studentid']))
{
	$uidl =$_SESSION['studentid'];
	echo "<a href='student_profile.php'>Profile Page</a>";
}
elseif (isset($_SESSION['facultyid'])) 
{
	$uidl =$_SESSION['facultyid'];
	echo "<a href='faculty_profile.php'>Profile Page</a>";
}
?>
<form name="p" method="post">
<div><label for="oldpwd">Old Password&nbsp;</label><input type="password" name="oldpwd" placeholder="eg:-ram@47863" onBlur="opass()" required><span id="opwderr"></span></div>
<div><label for="pwd">Password&nbsp;</label><input type="password" name="pwd" placeholder="eg:-ram@47863" onBlur="pass()" required><span id="pwderr"></span></div>
<div><label for="pwde">Cofirm Password&nbsp;</label><input type="password" name="pwde" placeholder="eg:-ram@47863" onBlur="pass1()" required><span id="pwdeerr"></span></div>
<div><input type="submit">&nbsp;&nbsp;<input type="reset"></div>
</form>
</body>
</html>
<?php
if($_POST)
{
$opass=$_POST['oldpwd'];
$pass=$_POST['pwd'];
$result = mysql_query("SELECT password FROM users_details WHERE user_id='$uidl'")or die("error in query");
$row=mysql_fetch_array($result);
if($row[0]==$opass)
{
	$respass = mysql_query("update users_details set password='$pass' where user_id='$uidl'")or die("error in password query");
	echo "Password Updated";
	header("Location:student_profile.php");
}
else
{
	echo "Old Password is incorrect";
}
}
?>