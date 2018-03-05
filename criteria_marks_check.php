<?php
include('db_conn.php');
if(isset($_POST['uidl']))
{
$uidl=$_POST['uidl'];
$subname=$_POST['subname'];
list($subname,$fac_sub_id)=explode(',', $subname);

$sql = mysql_query("SELECT fcd.id as faculty_crit_id,cd.criteria_name as crit_nam,fcd.criteria_marks as crit_marks FROM `faculty_criteria_details` fcd 
INNER JOIN `criteria_details` cd ON cd.id=fcd.criteria_id
INNER JOIN `faculty_subjects` fs ON fs.id=fcd.faculty_sub_id and fs.faculty_id='$uidl' and fcd.faculty_sub_id='$fac_sub_id'
INNER JOIN `subjects_details` sd ON sd.id='$subname'");
$count=mysql_num_rows($sql);
$tb='';
$tb.='<tr>';
$tb.='<th>Criteria Name</th>';
$tb.='<th>Criteria Marks</th>';
$tb.='<th>Obtained Marks</th>';
$tb.='</tr>';
echo $tb;
for($i=0;$i<$count;$i++)
{
while($row=mysql_fetch_array($sql))
{
$html='';
$html .= '<tr>';
$html .= '<td><input type="text" name="crit_nam[]" value="'.$row['crit_nam'].'" readonly></td>';
$html .= '<td><input type="text" name="crit_marks[]" value="'.$row['crit_marks'].'" readonly></td>';
$html .= '<td><input type="text" name="obt_marks[]" required></td>';
$html .= '<td><input type="hidden" name="faculty_crit_id[]" value="'.$row['faculty_crit_id'].'"></td>';
$html .= '</tr>';
echo $html;
}
}
}
?>