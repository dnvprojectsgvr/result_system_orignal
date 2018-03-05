<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stream Add</title>
</head>
<body>
<form name="p" method="post">
<div><label for="couname">Course Name&nbsp;</label><input type="text" name="couname" id="couname" placeholder="Course Name" maxlength="45" onKeyPress="return lettersOnly(event)" required><span id="counerr"></span></div>
<div><label for="stname">Stream Name&nbsp;</label>
<?php
include('db_conn.php');
$query=mysql_query("SELECT id,stream_name FROM stream_details");
if(mysql_num_rows($query)){
$select= '<select name="stname">';
while($rs=mysql_fetch_array($query)){
      $select.='<option value="'.$rs['id'].'">'.$rs['stream_name'].'</option>';
  }
}
$select.='</select>';
echo $select;
?>
<span id="stnerr"></span></div>
<div><input type="submit" name="Submit" value="Submit">&nbsp;<input type="reset" name="Reset" value="Reset"></div>
</form>
<br>
</body>
</html>
<?php
if($_POST)
{
$couname=$_POST['couname'];
$stname=$_POST['stname'];
include('db_conn.php');
mysql_query("insert into course_details(course_name,stream_id) values('$couname','$stname')")or die("error in course_id");
echo "Course Added";
}
?>