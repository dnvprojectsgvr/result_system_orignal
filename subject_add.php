<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Subjects Add</title>
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
});
</script>
</head>
<body>
<form name="p" method="post">
<div><label for="subname">Subject Name&nbsp;</label><input type="text" name="subname" id="subname" placeholder="Subject Name" maxlength="45" onKeyPress="return lettersOnly(event)" required><span id="subnerr"></span></div>
<div><label for="crit_marks">Criteria Marks&nbsp;</label><input type="text" name="crit_marks" id="crit_marks" placeholder="Criteria Marks" maxlength="45" onKeyPress="return lettersOnly(event)" required><span id="critmerr"></span></div>
<div><label for="is_pract">Practical Subject&nbsp;</label>
<select name="is_pract" id="is_pract">
<OPTION value="1">True</OPTION>
<OPTION value="0">False</OPTION>
</select>
<span id="is_practerr"></span></div>
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
<option value="0">select semester</option>
</select>
<span id="semnerr"></span></div>
<div><input type="submit" name="Submit" value="Submit">&nbsp;<input type="reset" name="Reset" value="Reset"></div>
</form>
<br>
</body>
</html>
<?php
if($_POST)
{
$subname=$_POST['subname'];
$crit_marks=$_POST['crit_marks'];
$is_pract=$_POST['is_pract'];
$semname=$_POST['semname'];
include('db_conn.php');
mysql_query("insert into subjects_details(subjects_name,criteria_marks,is_practical,semester_id) values('$subname','$crit_marks','$is_pract','$semname')")or die("error in subject_id");
echo "Subject Added";
}
?>