<!-- <a href="profile_admin.php">Profile Page</a> -->
<?php
include('db_conn.php');

$result=mysql_query("SELECT  ud.`status`,sd.`gender`,sd.`full_name`,sd.`student_id` FROM `users_details` ud,`student_details` sd WHERE ud.`user_id`=sd.`student_id`");
echo "<table border='1'>";
echo "<tr align='center'>";	
echo "<td><font color='black'>"."Student Name"."</font></td>";
echo "<td><font color='black'>"."Gender"."</font></td>";
		// echo "<td><font color='black'>"."Semester"."</font></td>";
echo "<td><font color='black'>"."Student Id"."</font></td>";
echo "<td><font color='black'>"."Edit"."</font></td>";
echo "<td><font color='black'>"."Status"."</font></td>";
echo "<td><font color='black'>"."Delete"."</font></td>";
echo "</tr>";
while($test = mysql_fetch_array($result))
{
	$sid = $test['student_id'];	
	echo "<tr align='center'>";	
	echo"<td><font color='black'>" .$test['full_name']."</font></td>";
	echo"<td><font color='black'>" .$test['gender']."</font></td>";
	// echo"<td><font color='black'>". $test['semester']. "</font></td>";
	echo"<td><font color='black'>". $test['student_id']. "</font></td>";
	// echo"<td> <a href ='admin_profile_edit_student.php?student_id=$sid'>Edit</a>";
	// echo"<td> <a href ='admin_student_delete.php?userid=$sid'>Delete</a>";
?>
<html>
<head>
<title>Profile Page</title>
</head>
<body>
<form name="a" method="post" action="admin_profile_edit_student.php">
	<input type="hidden" name="varname" value="<?php echo $sid ?>">
    <?php echo '<td><input name="sub1" type="submit" value="Edit"></td>';?>
</form>
<form name="b" method="post" action="upd_student_status.php">
	<input type="hidden" name="userid_status" value="<?php echo $sid ?>">
    <?php echo '<td><input name="sub2" type="submit" value="'.$test['status'].'"></td>';?>
</form>
<form name="c" method="post" action="admin_profile_del_student.php">
	<input type="hidden" name="userid_del" value="<?php echo $sid ?>">
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