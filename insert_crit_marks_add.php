<?php
//insert.php;

if(isset($_POST["subname"]))
{

 $connect = new PDO("mysql:host=localhost;dbname=result_system", "root", "");
 for($count = 0; $count < count($_POST["crit_marks"]); $count++)
 {  
  $query = "INSERT INTO faculty_criteria_details (criteria_id,criteria_marks,faculty_sub_id) VALUES(:crit_nam,:crit_marks,:subname)";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':crit_nam'  => $_POST["crit_nam"][$count], 
    ':crit_marks' => $_POST["crit_marks"][$count], 
    ':subname'  => $_POST["subname"]
   )
  );
 }
 $result = $statement->fetchAll();
  if(isset($result))
 {
  echo 'ok';
 }

}
else
{
  echo "notok";
}
?>