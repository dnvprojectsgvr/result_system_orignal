<a href="student_details.php">Student Details Page</a>
<?php
include('db_conn.php');
$var_value = $_POST['varname'];
$uidl=$var_value;
//$uidl=$_REQUEST['student_id'];
$result = mysql_query("SELECT s.`student_id`,s.`f_name`,s.`m_name`,s.`l_name`,s.`full_name`,s.`father_name`,s.`gender`,s.`mob_no`,s.`email_id`,s.`admin_year`,s.`roll_no`,s.`course`,s.`dob`  from student_details s where  s.student_id='$uidl'")or die("error in query");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$firstn=$test['f_name'];
				$middlen=$test['m_name'];					
				$lastn=$test['l_name'];
				$fulln=$test['full_name'];
				$fathn=$test['father_name'];
				$gender=$test['gender'];
				$dobn=$test['dob'];
				$course=$test['course'];
				$admin_year=$test['admin_year'];
				$rolln=$test['roll_no'];
				$mobn=$test['mob_no'];
				$emailn=$test['email_id'];
				$uidn=$test['student_id'];
list($y,$m,$d)=explode('-', $dobn);
?>
<html>
<head>
<title>Profile Edit</title>
<script src="student_reg.js"></script>
<script src="jquery.min.js" type="text/javascript"></script>
<script src="userid_student.js"></script>
</head>
<body onLoad="document.p.fnam.focus()" bgcolor="LAVENDER">
<h1>Student Detail Update Page</h1>
<form name="p" method="post" onSubmit="return ch()">
<div><label for="fnam">First Name&nbsp;</label><input type="text" name="fnam" id="fname" placeholder="First Name" onBlur="fn()" onKeyPress="return lettersOnly(event)" onChange="genfullnam()" value="<?php if(isset($firstn)){echo $firstn;} ?>"><span id="fnerr"></span></div>
<div><label for="mnam">Middle Name&nbsp;</label><input type="text" name="mnam" id="mname" placeholder="Middle Name" onBlur="mn()" onChange="genfullnam()" onKeyPress="return lettersOnly(event)" value="<?php echo $middlen ?>"><span id="mnerr"></span></div>
<div><label for="lnam">Last Name&nbsp;</label><input type="text" name="lnam" id="lname" placeholder="Last Name" onBlur="ln()" onChange="genfullnam()" onKeyPress="return lettersOnly(event)" value="<?php echo $lastn ?>"><span id="lnerr"></span></div>
<div><label for="funam">Full Name&nbsp;</label><input type="text" name="funam" id="fullname" placeholder="Full Name" onBlur="fu()" onKeyPress="return lettersOnly(event)" value="<?php echo $fulln ?>"><span id="fuerr"></span></div>
<div><label for="fanam">Father Name&nbsp;</label><input type="text" name="fanam" placeholder="Father Name" onBlur="fan()" onKeyPress="return lettersOnly(event)" value="<?php echo $fathn ?>"><span id="faerr"></span></div>
<div><label for="gen">Gender&nbsp;</label><input type="radio" name="gen" value="Male" <?php if($gender=="male") echo "checked" ?>>Male
<input type="radio" name="gen" value="Female" <?php if($gender=="female") echo "checked" ?>>Female
<input type="radio" name="gen" value="other" <?php if($gender=="other") echo "checked" ?> onclick="javascript: return false;">Other
<span id="generr"></span></div>
<div><label for="dob">Date Of Birth&nbsp;</label><select name="birthday_day" id="day" title="Day" onblur="dt_check()">
<option value="0" <?php if($d==0) echo "selected" ?>>Day</option>
<?php for($i=1;$i<32;$i++){
?>
	<option value="<?php echo $i ?>" <?php if($d==$i){echo "selected"; }  ?> > 
	<?php echo $i; ?>
<?php	} ?>
</select>
<select name="birthday_month" id="month" title="Month" onblur="dt_check()">
<option value="0" <?php if($m==0) echo "selected" ?>>Month</option>
<option value="1" <?php if($m==1) echo "selected" ?>>Jan</option>
<option value="2" <?php if($m==2) echo "selected" ?>>Feb</option>
<option value="3" <?php if($m==3) echo "selected" ?>>Mar</option>
<option value="4" <?php if($m==4) echo "selected" ?>>Apr</option>
<option value="5" <?php if($m==5) echo "selected" ?>>May</option>
<option value="6" <?php if($m==6) echo "selected" ?>>Jun</option>
<option value="7" <?php if($m==7) echo "selected" ?>>Jul</option>
<option value="8" <?php if($m==8) echo "selected" ?>>Aug</option>
<option value="9" <?php if($m==9) echo "selected" ?>>Sept</option>
<option value="10" <?php if($m==10) echo "selected" ?>>Oct</option>
<option value="11" <?php if($m==11) echo "selected" ?>>Nov</option>
<option value="12" <?php if($m==12) echo "selected" ?>>Dec</option>
</select>
<select name="birthday_year" id="year" title="Year" onblur="dt_check()">
<option value="0">Year</option>
<?php for($i=2017;$i>1985;$i--){
?>
	<option value="<?php echo $i ?>" <?php if($y==$i){echo "selected"; }  ?> > 
	<?php echo $i; ?>
<?php	} ?>
</select><span id="birtherr"></span></div>
<div><label for="co">Course&nbsp;</label><select name="co" id="cos" onblur="cou()" onChange="genusi()">
<option value="0" <?php if($course=="") echo "selected" ?>>Select Course</option>
<option value="BCA" <?php if($course=="BCA") echo "selected" ?>>BCA</option>
<option value="BBA" <?php if($course=="BBA") echo "selected" ?>>BBA</option>
<option value="MSCIT" <?php if($course=="MSCIT") echo "selected" ?>>MSCIT</option>
</select><span id="coerr"></span></div>

<div><label for="ye">Administion Year test&nbsp;</label><select name="ye" id="yea" onBlur="yer()" onChange="genusi()">
<option value="0"<?php if($admin_year=="") echo "selected" ?>>Select Year</option>
<?php for($i=2010;$i<2031;$i++){
?>
	<option value="<?php echo $i ?>" <?php if($admin_year==$i){echo "selected"; }  ?> > 
	<?php echo $i; ?>
<?php	} ?>
</select><span id="yeerr"></span></div>
<div><label for="roll">Roll No&nbsp;</label><input type="text" name="roll" id="roll" placeholder="eg:-15" maxlength="2" value="<?php echo $rolln ?>" onkeypress="return isNumber(event)" onChange="genusi()" required><span id="rollerr"></span></div>
<div><label for="mo">Mobile no&nbsp;</label><input type="text" name="mo" id="usi" placeholder="eg:-9587823867" onBlur="mob()" onkeypress="return isNumber(event)" value="<?php echo $mobn ?>" maxlength="10" required><span id="moerr"></span></div>
<div><label for="em">Email id&nbsp;</label><input type="text" name="em" placeholder="Email id eg:abc@gmail.com" onBlur="ema()" value="<?php echo $emailn ?>" required><span id="emerr"></span></div>
<div><label for="userid">User Id&nbsp;</label><input type="text" name="userid" id="userid" value="<?php echo $uidn ?>" readonly><span id="status"></span></div>
<input type="hidden" name="uid1" value="<?php echo $uidl; ?>">
<div><input type="submit" name="sub" value="Submit">&nbsp;<input type="reset" value="Reset"></div>
</form>
</body>
</html>
<?php
if(isset($_POST['sub']))
{
$fnam=$_POST['fnam'];
$fnaml=strtolower($fnam);
$mnam=$_POST['mnam'];
$mnaml=strtolower($mnam);
$lnam=$_POST['lnam'];
$lnaml=strtolower($lnam);
$funam=$_POST['funam'];
$funaml=strtolower($funam);
$fanam=$_POST['fanam'];
$fanaml=strtolower($fanam);
$gen=$_POST['gen'];
$dob=$_POST['birthday_year']."/".$_POST['birthday_month']."/".$_POST['birthday_day'];
$course=$_POST['co'];
$admin_year=$_POST['ye'];
$roll=$_POST['roll'];
$uid=$_POST['userid'];
$uidl=strtolower($uid);
$uid1=$_POST['uid1'];
include('db_conn.php');

$query="update student_details set f_name='$fnaml',m_name='$mnaml',l_name='$lnaml',full_name='$funaml',father_name='$fanaml',gender='$gen',admin_year='$admin_year',roll_no='$roll',course='$course',dob='$dob' where student_id='$uidl'";
$query1="update users_details set user_id='$uidl' where user_id='$uid1'";
mysql_query($query1)or die("error in user_id");
mysql_query($query)or die("error in student_id");
header("Location:student_details.php");
// if(!$query && !$query1)
// {
// 	echo "error in query";
// }
// else
// {
// 	echo "Detials Updated";
// 	header("Location:student_details.php");
// }
}
?>