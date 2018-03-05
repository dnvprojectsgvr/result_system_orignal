<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Semester Add</title>
<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#couname").change(function(e)
{ 
var couname = $("#couname").val();
var semname=$("#semname").val();
var msgbox = $("#counerr");
$.ajax({
    type: "POST",  
    url: "course_sem_check.php",  
    data: "couname="+couname+"&semname="+semname,
    success: function(msg){
   $("#counerr").ajaxComplete(function(event, request){
	if(msg == 'OK')
	{
	    $("#couname").attr('style','border:1px solid #008000');
       msgbox.html('available');
	}  
	else  
	{  
	   $("#couname").attr('style','border:1px solid #FF0000');
		 msgbox.html(msg);
	}  
   });
   } 
  }); 
});
});
</script>
</head>
<body>
<form name="p" method="post">
<div><label for="couname">Course Name&nbsp;</label>
<?php
include('db_conn.php');
$query=mysql_query("SELECT id,course_name FROM course_details");
if(mysql_num_rows($query)){
$select= '<select name="couname" id="couname">';
while($rs=mysql_fetch_array($query)){
      $select.='<option value="'.$rs['id'].'">'.$rs['course_name'].'</option>';
  }
}
$select.='</select>';
echo $select;
?>
<span id="counerr"></span></div>
<div><label for="semname">Semester&nbsp;</label><select name="semname" id="semname">
<option value="0">Select Semester</option>
<option selected="" value="Semester 1">Semester 1</option>
<option value="Semester 2">Semester 2</option>
<option value="Semester 3">Semester 3</option>
<option value="Semester 4">Semester 4</option>
<option value="Semester 5">Semester 5</option>
<option value="Semester 6">Semester 6</option>
</select><span id="semnerr"></span></div>
<div><input type="submit" name="Submit" value="Submit">&nbsp;<input type="reset" name="Reset" value="Reset"></div>
</form>
<br>
</body>
</html>
<?php
if($_POST)
{
$semname=$_POST['semname'];
$couname=$_POST['couname'];
include('db_conn.php');
mysql_query("insert into semester_details(semester_name,course_id) values('$semname','$couname')")or die("error in semester_id");
echo "Semester Added";
}
?>