<a href="faculty_profile.php">Profile Page</a>
<?php
session_start();
include('db_conn.php');
$uidl =$_SESSION['facultyid'];
$sql = mysql_query("SELECT sd.criteria_marks FROM `faculty_subjects` subd 
INNER JOIN `subjects_details` sd ON sd.id=subd.subject_id and subd.faculty_id='$uidl'");
$row=mysql_fetch_array($sql);
$tot_crit_marks=$row['criteria_marks'];
$connect = new PDO("mysql:host=localhost;dbname=result_system", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT id,criteria_name FROM criteria_details";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["id"].'">'.$row["criteria_name"].'</option>';
 }
 return $output;
}
?>
<html>
<head>
<title>Criteria Marks Add</title>
<script src="jquery.js" type="text/javascript"></script>
<!-- <script src="bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="bootstrap.min.css" /> -->
<script type="text/javascript">
$(document).ready(function(){
        var uidl = $("#uidl").val();
        $.ajax({
            type: "POST",
            url: "faculty_subjects_check.php",
            data: "uidl="+uidl,
        }).done(function(data){
            $("#subname").html(data);
        });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><select name="crit_nam[]" class="form-control crit_nam"><option value="">Select Criteria</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><input type="text" name="crit_marks[]" class="form-control crit_marks" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span>Remove</button></td></tr>';
  $('#crit_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 // $('#p').on('submit', function(event){
 //  event.preventDefault();
 // // $(document).on('keyup', '.crit_marks', function(){
 //  var error = '';
 //  $('.crit_marks').each(function(){
 //   var count = 1;
 //   var tot_crit_marks=$('#tot_crit_marks').val();
 //   if($(this).val() == '')
 //   {
 //    error += "<p>Enter Criteria Marks at "+count+" Row</p>";
 //    return false;
 //   }
 //   else if($(this).val()!=tot_crit_marks)
 //   {
 //    error += "<p>Criteria Marks Is Less Than Total Marks</p>";
 //    return false;
 //   }
 //   else
 //   {
 //   // else if($(this).val()==tot_crit_marks)
 //   // {
 //   //  error += "<p></p>";
 //   //  return true;
 //   // }
 //   count = count + 1;
 //    }
 //  }); 
 //  $('.crit_nam').each(function(){
 //   var count = 1;
 //   if($(this).val() == '')
 //   {
 //    error += "<p>Select Criteria at "+count+" Row</p>";
 //    return false;
 //   }
 //   count = count + 1;
 //  });

 //  var form_data = $(this).serialize();
 //  if(error == '')
 //  {
 //   $.ajax({
 //    url:"insert_crit_marks_add.php",
 //    method:"POST",
 //    data:form_data,
 //    success:function(data)
 //    {
 //     if(data == 'ok')
 //     {
 //      $('#crit_table').find("tr:gt(0)").remove();
 //      $('#error').html('<div class="alert alert-success">Criteria Details Saved</div>');
 //     }
 //     else if(data=='notok')
 //    {
 //      alert("dfs");
 //    }
 //    }
 //   });
 //  }
 //  else
 //  {
 //   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
 //  }
 // });
 
});
</script>
</head>
<body>
<form name="p" method="post">
<div><input type="hidden" name="uidl" id="uidl" value="<?php echo $uidl ?>"></div>
<div><label for="subname">Subject Name&nbsp;</label>
<select name="subname" id="subname">
<option value="0">Select Subject</option>
</select>
<span id="subnerr"></span></div>
<div><label for="tot_crit_marks">Total Criteria Marks&nbsp;</label><input type="text" name="tot_crit_marks" id="tot_crit_marks" value="<?php echo $tot_crit_marks ?>" readonly></div>
<table id="crit_table">
      <tr>
       <th>Select Criteria</th>
       <th>Enter Criteria Marks</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span>ADD</button></th>
      </tr>
</table>
<span id="error"></span>
<div><input type="submit" name="sub" value="Submit">&nbsp;<input type="reset" value="Reset"></div>
</form>
</body>
</html>
<?php
if(isset($_POST["subname"]))
{
  $ch_marks=0;
 for($count = 0; $count < count($_POST["crit_marks"]); $count++)
 {
  $ch_marks=$_POST["crit_marks"][$count]+$ch_marks;
 }
 if($tot_crit_marks==$ch_marks)
{
 include('db_conn.php');
 for($count = 0; $count < count($_POST["crit_marks"]); $count++)
 {  
  $crit_nam=$_POST["crit_nam"][$count];
  $crit_marks=$_POST["crit_marks"][$count];
  $subname=$_POST["subname"];
  $query = "INSERT INTO faculty_criteria_details (criteria_id,criteria_marks,faculty_sub_id) VALUES('$crit_nam','$crit_marks','$subname')";
  mysql_query($query) or die("Error in faculty_criteria_id");
 }
 echo "Criteria Added"; 
}
elseif($tot_crit_marks!=$ch_marks)
{
  echo "untotal marks";
}
}
?>