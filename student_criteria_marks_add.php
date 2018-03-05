<a href="students_list.php">Students List Page</a>
<?php
session_start();
include('db_conn.php');
$uidl =$_SESSION['facultyid'];
$sid=$_POST['sid'];
$query=mysql_query("SELECT distinct sd.id,sd.subjects_name FROM `faculty_criteria_details` fcd
INNER JOIN `criteria_details` cd ON cd.id=fcd.criteria_id
INNER JOIN `faculty_subjects` fs ON fs.id=fcd.faculty_sub_id and fs.faculty_id='$uidl'
INNER JOIN `subjects_details` sd ON sd.id=fs.subject_id");
?>
<html>
<head>
<title>Criteria Marks Add</title>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#subname").change(function(){
        var subname = $("#subname").val();
        var uidl="<?php echo $uidl; ?>";
        $.ajax({
            type: "POST",
            url: "criteria_marks_check.php",
            data: "subname="+subname+"&uidl="+uidl,
        }).done(function(data){
            $("#crit_table").html(data);
        });
    });
});
</script>
</head>
<body>
<form name="p" id="p" method="post">
<div><label for="subname">Subject Name&nbsp;</label>
<?php
include('db_conn.php');
$query=mysql_query("SELECT distinct sd.id,sd.subjects_name,fcd.faculty_sub_id FROM `faculty_criteria_details` fcd
INNER JOIN `criteria_details` cd ON cd.id=fcd.criteria_id
INNER JOIN `faculty_subjects` fs ON fs.id=fcd.faculty_sub_id and fs.faculty_id='$uidl'
INNER JOIN `subjects_details` sd ON sd.id=fs.subject_id");
if(mysql_num_rows($query)){
$select= '<select name="subname" id="subname">';
$select.='<option value="0">Select Subject</option>';
while($rs=mysql_fetch_array($query)){
      $select.='<option value="'.$rs['id'].','.$rs['faculty_sub_id'].'">'.$rs['subjects_name'].'</option>';
  }
}
$select.='</select>';
echo $select;
?>
<span id="subnerr"></span></div>
<table id="crit_table">
      <tr>
       <th>Criteria Name</th>
       <th>Criteria Marks</th>
       <th>Obtained Marks</th>
      </tr>
</table>
<span id="error"></span>
<div><input type="hidden" name="sid" value="<?php echo $sid;?>" ></div>
<div><input type="submit" name="sub" value="Submit">&nbsp;<input type="reset" value="Reset"></div>
</form>
</body>
</html>
<?php
if(isset($_POST["subname"]))
{
  $tot_marks=0;
  $ch_marks=0;
 for($count = 0; $count < count($_POST["crit_marks"]); $count++)
 {
  $tot_marks=$_POST["crit_marks"][$count]+$tot_marks;
  $ch_marks=$_POST["obt_marks"][$count]+$ch_marks;
 }
 if($ch_marks<=$tot_marks)
 {
   include('db_conn.php');
 for($count = 0; $count < count($_POST["crit_marks"]); $count++)
 {  
  $crit_marks=$_POST["crit_marks"][$count];
  $obt_marks=$_POST["obt_marks"][$count];
  $faculty_crit_id=$_POST['faculty_crit_id'][$count];
  $sid=$_POST["sid"];
  $query = "INSERT INTO student_criteria_details (student_id,faculty_criteria_id,obt_marks,out_marks) VALUES('$sid','$faculty_crit_id','$obt_marks','$crit_marks')";
  mysql_query($query) or die("Error in student_criteria_id");
 }
 echo "Student Criteria Marks Added";
 }
 elseif($ch_marks>$tot_marks)
 {
  echo "Obtained Marks is greater than Criteria Marks";
 }
}
?>