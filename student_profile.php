<!-- WELCOME  STUDENT<br> -->
<?php
session_start();
include 'db_conn.php';
if(isset($_SESSION['studentid']))
{
	$uidl=$_SESSION['studentid'];
	$res=mysql_query("select * from student_details where student_id='$uidl'")or die("query error");
	$row=mysql_fetch_row($res);
	$full_nameu=strtoupper($row[4]);
	echo "WELCOME :".$full_nameu."<br>";
	$father_nameu=strtoupper($row[5]);
	echo "Father Name:".$father_nameu."<br>";
	$genderc=ucfirst($row[6]);
	echo "Gender:".$genderc."<br>";
	echo "Mobile No:".$row[7]."<br>";
	echo "Email Id:".$row[8]."<br>";
	echo "Administation Year:".$row[9]."<br>";
	echo "Roll No:".$row[10]."<br>";
	$courseu=strtoupper($row[11]);
	echo "Course:".$courseu."<br>";
	$dobf=date("d-m-Y", strtotime($row[12]));
	echo "Date Of Birth:".$dobf."<br>";
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
	<a href="profile_edit_student.php">Profile Edit</a>
	<a href="profile_changepassword.php">Profile ChangePassword</a>
    <a href="logout.php"> LOGOUT </a>
 </form>
</body>
</html>