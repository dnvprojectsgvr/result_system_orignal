<a href="student_profile.php">Students Profile Page</a>
<?php
session_start();
include('db_conn.php');
$uidl =$_SESSION['studentid'];
$query=mysql_query("SELECT scd.id,sd.subjects_name,cd.criteria_name,scd.out_marks,scd.obt_marks FROM `student_criteria_details` scd
INNER JOIN `subjects_details` sd
INNER JOIN `faculty_subjects` fs ON sd.id=fs.subject_id and scd.student_id='$uidl'
INNER JOIN `faculty_criteria_details` fcd ON fs.id=fcd.faculty_sub_id and fcd.id=scd.faculty_criteria_id
INNER JOIN `criteria_details` cd ON cd.id=fcd.criteria_id");
?>
<html>
<head>
<title>Student Marks Show</title>
<!-- <script src="jquery.js" type="text/javascript"></script> -->
<!-- <script type="text/javascript">
$(document).ready(function(){
    $("#subname").change(function(){
        var subname = $("#subname").val();
        var uidl="<?php //echo $uidl; ?>";
        $.ajax({
            type: "POST",
            url: "criteria_marks_check.php",
            data: "subname="+subname+"&uidl="+uidl,
        }).done(function(data){
            $("#crit_table").html(data);
        });
    });
});
</script> -->
</head>
<body>
<form name="p" id="p" method="post">
<!-- <div><label for="subname">Subject Name&nbsp;</label> -->
<?php
// include('db_conn.php');
// $query=mysql_query("SELECT distinct sd.id,sd.subjects_name,fcd.faculty_sub_id FROM `faculty_criteria_details` fcd
// INNER JOIN `criteria_details` cd ON cd.id=fcd.criteria_id
// INNER JOIN `faculty_subjects` fs ON fs.id=fcd.faculty_sub_id and fs.faculty_id='$uidl'
// INNER JOIN `subjects_details` sd ON sd.id=fs.subject_id");
// if(mysql_num_rows($query)){
// $select= '<select name="subname" id="subname">';
// $select.='<option value="0">Select Subject</option>';
// while($rs=mysql_fetch_array($query)){
//       $select.='<option value="'.$rs['id'].','.$rs['faculty_sub_id'].'">'.$rs['subjects_name'].'</option>';
//   }
// }
// $select.='</select>';
// echo $select;
?>
<!-- <span id="subnerr"></span></div> -->
<table id="crit_table">
      <tr>
      <!-- <th>Criteria Marks</th> -->
       <th>Subjects Name</th>
       <th>Criteria Name</th>
       <th>Out Of Marks</th>
       <th>Obtained Marks</th>
      </tr>
<?php
      while($row=mysql_fetch_array($query))
{
$html='';
$html .= '<tr>';
$html .= '<td>'.$row['subjects_name'].'</td>';
$html .= '<td>'.$row['criteria_name'].'</td>';
$html .= '<td>'.$row['out_marks'].'</td>';
$html .= '<td>'.$row['obt_marks'].'</td>';
$html .= '</tr>';
echo $html;
}
?>
</table>
<span id="error"></span>
</form>
</body>
</html>