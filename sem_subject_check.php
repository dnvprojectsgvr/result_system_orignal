<?php
include('db_conn.php');
if(isset($_POST['semname']))
{
$semname = $_POST['semname'];
$sql = mysql_query("SELECT subd.id,subd.subjects_name FROM `subjects_details` subd INNER JOIN `semester_details` sd ON sd.id=subd.semester_id and subd.semester_id='$semname'");
// if($semname !== 'Select')
if(mysql_num_rows($sql)>0)
{
	echo "<option>"."Select Subject"."</option>";
    while($row=mysql_fetch_array($sql))
{	
    echo "<option value='".$row['id']."'>". $row['subjects_name'] . "</option>";
}	
	echo("</select>");
}
elseif(mysql_num_rows($sql)==0)
{
	echo("<select>");
	echo "<option>"."Select Subject"."</option>";
	echo("</select>");
}
}
?>