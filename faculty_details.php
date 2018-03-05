<!-- <a href="profile_admin.php">Profile Page</a> -->
<?php
include('db_conn.php');

$result=mysql_query("SELECT  ud.`status`,fd.`gender`,fd.`full_name`,fd.`faculty_id` FROM `users_details` ud,`faculty_details` fd WHERE ud.`user_id`=fd.`faculty_id`");
echo "<table border='1'>";
echo "<tr align='center'>";	
echo "<td><font color='black'>"."Faculty Name"."</font></td>";
echo "<td><font color='black'>"."Gender"."</font></td>";
echo "<td><font color='black'>"."Faculty Id"."</font></td>";
echo "<td><font color='black'>"."Edit"."</font></td>";
echo "<td><font color='black'>"."Status"."</font></td>";
echo "<td><font color='black'>"."Delete"."</font></td>";
echo "</tr>";
while($test = mysql_fetch_array($result))
{
	$fid = $test['faculty_id'];	
	echo "<tr align='center'>";	
	echo"<td><font color='black'>" .$test['full_name']."</font></td>";
	echo"<td><font color='black'>" .$test['gender']."</font></td>";
	echo"<td><font color='black'>". $test['faculty_id']. "</font></td>";
?>
<html>
<head>
<title>Profile Page</title>
</head>
<body>
<form name="a" method="post" action="admin_profile_edit_faculty.php">
	<input type="hidden" name="varname" value="<?php echo $fid ?>">
    <?php echo '<td><input name="sub1" type="submit" value="Edit"></td>';?>
</form>
<form name="b" method="post" action="upd_faculty_status.php">
	<input type="hidden" name="userid_status" value="<?php echo $fid ?>">
    <?php echo '<td><input name="sub2" type="submit" value="'.$test['status'].'"></td>';?>
</form>
<form name="c" method="post" action="admin_profile_del_faculty.php">
	<input type="hidden" name="userid_del" value="<?php echo $fid ?>">
    <?php echo '<td><input name="sub3" type="submit" value="Delete"></td>';?>
</form>
</body>
</html>
<?php
	//echo"<td><a href ='upd_student_status.php?studentid=$sid'>". $test['status']. "</td></a>";
	echo "</tr>";
}
echo "</table>";
?>