<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Faculty Subjects Add</title>
<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#couname").change(function(){
        var couname = $("#couname").val();
        $.ajax({
            type: "POST",
            url: "sem_check.php",
            data: "couname="+couname,
        }).done(function(data){
            $("#semname").html(data);
        });
    });
    $("#semname").change(function(){
        var semname = $("#semname").val();
        $.ajax({
            type: "POST",
            url: "sem_subject_check.php",
            data: "semname="+semname,
        }).done(function(data){
            $("#subname").html(data);
        });
    });
});
</script>
</head>
<body>
<form name="p" method="post">
<div><label for="faculty_id">Faculty Name&nbsp;</label>
<?php
include('db_conn.php');
$query=mysql_query("SELECT faculty_id FROM faculty_details");
if(mysql_num_rows($query)){
$select= '<select name="faculty_id" id="faculty_id">';
$select.='<option value="0">Select Faculty</option>';
while($rs=mysql_fetch_array($query)){
      $select.='<option value="'.$rs['faculty_id'].'">'.$rs['faculty_id'].'</option>';
  }
}
$select.='</select>';
echo $select;
?>
<span id="fiderr"></span></div>
<div><label for="couname">Course Name&nbsp;</label>
<?php
include('db_conn.php');
$query=mysql_query("SELECT id,course_name FROM course_details");
if(mysql_num_rows($query)){
$select= '<select name="couname" id="couname">';
$select.='<option value="0">select course</option>';
while($rs=mysql_fetch_array($query)){
      $select.='<option value="'.$rs['id'].'">'.$rs['course_name'].'</option>';
  }
}
$select.='</select>';
echo $select;
?>
<span id="counerr"></span></div>
<div><label for="semname">Semester Name&nbsp;</label>
<select name="semname" id="semname">
<option value="0">Select Semester</option>
</select>
<span id="semnerr"></span></div>
<div><label for="subname">Subject Name&nbsp;</label>
<select name="subname" id="subname">
<option value="0">Select Subject</option>
</select>
<span id="subnerr"></span></div>
<div><input type="submit" name="Submit" value="Submit">&nbsp;<input type="reset" name="Reset" value="Reset"></div>
</form>
<br>
</body>
</html>
<?php
if($_POST)
{
$subname=$_POST['subname'];
$faculty_id=$_POST['faculty_id'];
include('db_conn.php');
mysql_query("insert into faculty_subjects(faculty_id,subject_id) values('$faculty_id','$subname')")or die("error in faculty subject id");
echo "Faculty Subject Added";
}
?>