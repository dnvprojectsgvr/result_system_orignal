<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stream Add</title>
</head>
<body>
<form name="p" method="post">
<div><label for="stname">Stream Name&nbsp;</label><input type="text" name="stname" id="stname" placeholder="Stream Name" maxlength="45" onKeyPress="return lettersOnly(event)" required><span id="stnerr"></span></div>
<div><input type="submit" name="Submit" value="Submit">&nbsp;<input type="reset" name="Reset" value="Reset"></div>
</form>
<br>
</body>
</html>
<?php
if($_POST)
{
$stname=$_POST['stname'];
include('db_conn.php');
mysql_query("insert into stream_details(stream_name) values('$stname')")or die("error in stream_id");
echo "Stream Added";
}
?>