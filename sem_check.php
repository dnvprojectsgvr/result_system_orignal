<?php
include('db_conn.php');
if(isset($_POST['couname']))
{
$couname = $_POST['couname'];
$sql = mysql_query("SELECT sd.id,sd.semester_name FROM  `semester_details` sd
INNER JOIN `course_details` cod ON cod.id=sd.course_id and cod.id='$couname'");
	
// if($couname !== 'Select')
if(mysql_num_rows($sql)>0)
{
	echo "<option>"."select semester"."</option>";
    while($row=mysql_fetch_array($sql))
{	
    echo "<option value='".$row['id']."'>". $row['semester_name'] . "</option>";
}
}
elseif(mysql_num_rows($sql)==0)
{
	echo("<select>");
	echo "<option>"."select semester"."</option>";
	echo("</select>");
}
}
?>