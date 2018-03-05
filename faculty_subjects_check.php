<?php
include('db_conn.php');
if(isset($_POST['uidl']))
{
$uidl = $_POST['uidl'];
$sql = mysql_query("SELECT subd.id as faculty_sub_id,sd.id as sub_id,sd.subjects_name as sub_nam FROM `faculty_subjects` subd 
INNER JOIN `subjects_details` sd ON sd.id=subd.subject_id and subd.faculty_id='$uidl'");
// if($semname !== 'Select')
if(mysql_num_rows($sql)>0)
{
	echo "<option>"."Select Subject"."</option>";
    while($row=mysql_fetch_array($sql))
{	
    echo "<option value='".$row['faculty_sub_id']."'>". $row['sub_nam'] . "</option>";
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