<!doctype html>
<html>
<head>
<title>Forget Password</title>
<script src="forget_password.js"></script>
</head>
<body>
<form name="p" method="post" onsubmit="return ch();">
<div><label for="userid">USERID&nbsp;</label><input type="text" name="userid" onBlur="logu()" maxlength="30" required autofocus><span id="uierr"></span></div>
<div><label for="secr">Security Question&nbsp;</label><select name="secr" onBlur="sec()">
	<option value="Default">Select Security Question</option>
	<option selected="" value="favourite teacher">What Is Your Favourite Teacher Name&#63;</option>
	<option value="mother name">What Is Your Mother Name&#63;</option>
	<option value="childhood friend">What Is Your Childhood Friend Name&#63;</option>
	<option value="favourite food">What Is Your Favourite Food&#63;</option></select><span id="secerr"></span></div>
<div><label for="seca">Security Answer</label><input type="text" name="seca" placeholder="eg:-ram" onBlur="secan()" maxlength="60" required><span id="secaerr"></span></div>
<div><label for="pwd">Password&nbsp;</label><input type="password" name="pwd" placeholder="eg:-Ram@47863" maxlength="255" onBlur="pass()" required><span id="pwderr"></span></div>
<div><label for="pwde">Cofirm Password&nbsp;</label><input type="password" name="pwde" placeholder="eg:-Ram@47863" maxlength="255" onBlur="pass1()" required><span id="pwdeerr"></span></div>
<div><input type="submit" name="Submit" value="Submit">&nbsp;<input type="reset" value="Reset"></div>
</form>
<br>
<a href="index.php">login</a>
<br>
<br>
<span id="pwdserr"></span>
</body>
</html>
<?php
if($_POST)
{
$uid=$_POST['userid'];
$uidl=strtolower($uid);
$secq=$_POST['secr'];
$seca=$_POST['seca'];
$secal=strtolower($seca);
$pass=$_POST['pwd'];
include('db_conn.php');
$result = mysql_query("SELECT user_id,security_ques,security_ans FROM users_details WHERE user_id='$uidl'")or die("error in query");
$row=mysql_fetch_row($result);
if(($row[0]==$uidl) && ($row[1]==$secq) && ($row[2]==$secal))
{
	$respass = mysql_query("update users_details set password='$pass' where user_id='$uidl'")or die("error in password query");
	echo "Changed Password And You will be redirected to login page within 5 seconds";
	header("refresh:5;url=index.php");
}
else
{
	echo "Wrong Details";
}
}
?>