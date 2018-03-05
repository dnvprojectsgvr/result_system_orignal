<a href="faculty_profile.php">Profile Page</a>
<?php
session_start();
include('db_conn.php');
$uidl =$_SESSION['facultyid'];
?>
<html>
<head>
<title>Criteria Add</title>
</head>
<body>
<form name="p" method="post">
<div><label for="crit_nam">Criteria Name&nbsp;</label><input type="text" name="crit_nam" id="crit_nam" placeholder="Criteria Name" maxlength="45" onKeyPress="return lettersOnly(event)" required><span id="critnerr"></span></div>
<div><input type="submit" name="sub" value="Submit">&nbsp;<input type="reset" value="Reset"></div>
</form>
</body>
</html>
<?php
if($_POST)
{
$crit_nam=$_POST['crit_nam'];
include('db_conn.php');
$query="insert into criteria_details (criteria_name) value('$crit_nam')";
mysql_query($query)or die("error in criteria id");
echo "Criteria Added";
}
?>