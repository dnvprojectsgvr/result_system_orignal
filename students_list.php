<a href="faculty_profile.php">Profile Page</a>
<?php
session_start();
include('db_conn.php');
$uidl =$_SESSION['facultyid'];
// $sql = mysql_query("SELECT cd.id as crit_id,cd.criteria_name as crit_nam,sd.id as sub_id,sd.subjects_name as sub_name,fcd.criteria_marks as crit_marks FROM `faculty_criteria_details` fcd 
// INNER JOIN `criteria_details` cd ON cd.id=fcd.criteria_id
// INNER JOIN `faculty_subjects` fs ON fs.id=fcd.faculty_sub_id and fs.faculty_id='$uidl'
// INNER JOIN `subjects_details` sd ON sd.id=fs.subject_id");
$result=mysql_query("SELECT distinct stud.student_id,stud.full_name,stud.gender,stud.course,stud.roll_no FROM `student_details` stud
INNER JOIN `faculty_subjects` fs
INNER JOIN `subjects_details` sd ON sd.id=fs.subject_id and fs.faculty_id='$uidl'
INNER JOIN `semester_details` semd ON semd.id=sd.semester_id
INNER JOIN `course_details` cod ON cod.id=semd.course_id and stud.course=cod.course_name
INNER JOIN `users_details` ud ON ud.user_id=stud.student_id and ud.status='active'");
echo "<table border='1'>";
echo "<tr align='center'>"; 
echo "<td><font color='black'>"."Student Name"."</font></td>";
echo "<td><font color='black'>"."Gender"."</font></td>";
    // echo "<td><font color='black'>"."Semester"."</font></td>";
echo "<td><font color='black'>"."Student Id"."</font></td>";
echo "<td><font color='black'>"."Course"."</font></td>";
echo "<td><font color='black'>"."Roll No"."</font></td>";
echo "<td><font color='black'>"."Add Marks"."</font></td>";
echo "</tr>";
while($test = mysql_fetch_array($result))
{
  $sid = $test['student_id']; 
  echo "<tr align='center'>"; 
  echo"<td><font color='black'>" .$test['full_name']."</font></td>";
  echo"<td><font color='black'>" .$test['gender']."</font></td>";
  // echo"<td><font color='black'>". $test['semester']. "</font></td>";
  echo"<td><font color='black'>". $test['student_id']. "</font></td>";
  echo"<td><font color='black'>". $test['course']. "</font></td>";
  echo"<td><font color='black'>". $test['roll_no']. "</font></td>";
?>
<html>
<head>
<title>Students List</title>
</head>
<body>
<form name="a" method="post" action="student_criteria_marks_add.php">
  <input type="hidden" name="sid" value="<?php echo $sid ?>">
    <?php echo '<td><input name="sub1" type="submit" value="Add"></td>';?>
</form>
</body>
</html>
<?php
  echo "</tr>";
}
echo "</table>";
?>