<a href="student_profile.php">Profile Page</a>
<?php
session_start();
include('db_conn.php');
$uidl =$_SESSION['studentid'];
$result = mysql_query("SELECT ud.`security_ques`,ud.`security_ans`,s.`student_id`,s.`f_name`,s.`m_name`,s.`l_name`,s.`full_name`,s.`father_name`,s.`gender`,s.`mob_no`,s.`email_id`,s.`admin_year`,s.`roll_no`,s.`course`,s.`dob`  from users_details ud,student_details s where ud.user_id='$uidl' and s.student_id='$uidl'")or die("error in query");
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
				$secur_ques=$test['security_ques'];
				$secur_ans=$test['security_ans'];
list($y,$m,$d)=explode('-', $dobn);
?>
<html>
<head>
<title>Profile Edit</title>
<script src="student_reg.js"></script>
</head>
<body onLoad="document.p.fnam.focus()" bgcolor="LAVENDER">
<h1>Registration Page</h1>
<form name="p" method="post" onSubmit="return ch()">
<div><label for="fnam">First Name&nbsp;</label><input type="text" name="fnam" id="fname" placeholder="First Name" onBlur="fn()" onKeyPress="return lettersOnly(event)" onChange="genfullnam()" value="<?php if(isset($firstn)){echo $firstn;} ?>" readonly><span id="fnerr"></span></div>
<div><label for="mnam">Middle Name&nbsp;</label><input type="text" name="mnam" id="mname" placeholder="Middle Name" onBlur="mn()" onChange="genfullnam()" onKeyPress="return lettersOnly(event)" value="<?php echo $middlen ?>" readonly><span id="mnerr"></span></div>
<div><label for="lnam">Last Name&nbsp;</label><input type="text" name="lnam" id="lname" placeholder="Last Name" onBlur="ln()" onChange="genfullnam()" onKeyPress="return lettersOnly(event)" value="<?php echo $lastn ?>" readonly><span id="lnerr"></span></div>
<div><label for="funam">Full Name&nbsp;</label><input type="text" name="funam" id="fullname" placeholder="Full Name" onBlur="fu()" onKeyPress="return lettersOnly(event)" value="<?php echo $fulln ?>" readonly><span id="fuerr"></span></div>
<div><label for="fanam">Father Name&nbsp;</label><input type="text" name="fanam" placeholder="Father Name" onBlur="fan()" onKeyPress="return lettersOnly(event)" value="<?php echo $fathn ?>" readonly><span id="faerr"></span></div>
<div><label for="gen">Gender&nbsp;</label><input type="radio" name="gen" value="Male" <?php if($gender=="male") echo "checked" ?> onclick="javascript: return false;">Male
<input type="radio" name="gen" value="Female" <?php if($gender=="female") echo "checked" ?> onclick="javascript: return false;">Female
<input type="radio" name="gen" value="other" <?php if($gender=="other") echo "checked" ?> onclick="javascript: return false;">Other
<span id="generr"></span></div>
<div><label for="dob">Date Of Birth&nbsp;</label><select name="birthday_day" id="day" title="Day" onblur="dt_check()" disabled>
<option value="0" <?php if($d==0) echo "selected" ?>>Day</option>
<?php for($i=1;$i<32;$i++){
?>
	<option value="<?php echo $i ?>" <?php if($d==$i){echo "selected"; }  ?> > 
	<?php echo $i; ?>
<?php	} ?>
</select>
<select name="birthday_month" id="month" title="Month" onblur="dt_check()" disabled>
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
<select name="birthday_year" id="year" title="Year" onblur="dt_check()" disabled>
<option value="0">Year</option>
<?php for($i=2017;$i>1985;$i--){
?>
	<option value="<?php echo $i ?>" <?php if($y==$i){echo "selected"; }  ?> > 
	<?php echo $i; ?>
<?php	} ?>
</select><span id="birtherr"></span></div>
<div><label for="co">Course&nbsp;</label><select name="co" id="cos" disabled>
<option value="Default" name="sel" <?php if($course=="") echo "selected" ?>>Select Course</option>
<option value="BCA" name="bca" <?php if($course=="BCA") echo "selected" ?>>BCA</option>
<option value="BBA" name="bba" <?php if($course=="BBA") echo "selected" ?>>BBA</option>
<option value="MSCIT" name="mscit" <?php if($course=="MSCIT") echo "selected" ?>>MSCIT</option>
</select><span id="coerr"></span></div>

<div><label for="ye">Administion Year test&nbsp;</label><select name="ye" id="yea" onblur="yer()" disabled>
<option value="0"<?php if($admin_year=="") echo "selected" ?>>Select Year</option>
<?php for($i=2010;$i<2031;$i++){
?>
	<option value="<?php echo $i ?>" <?php if($admin_year==$i){echo "selected"; }  ?> > 
	<?php echo $i; ?>
<?php	} ?>
</select><span id="yeerr"></span></div>
<div><label for="roll">Roll No&nbsp;</label><input type="text" name="roll" id="roll" placeholder="eg:-15" onkeypress="return isNumber(event)" readonly value="<?php echo $rolln ?>"><span id="rollerr"></span></div>
<div><label for="mo">Mobile no&nbsp;</label><input type="text" name="mo" placeholder="eg:-9587823867" onBlur="mob()" onkeypress="return isNumber(event)" value="<?php echo $mobn ?>" required><span id="moerr"></span></div>
<div><label for="em">Email id&nbsp;</label><input type="text" name="em" placeholder="Email id eg:abc@gmail.com" onBlur="ema()" value="<?php echo $emailn ?>" required><span id="emerr"></span></div>
<div><label for="userid">User Id&nbsp;</label><input type="text" name="userid" id="usi" value="<?php echo $uidn ?>" readonly></div>
<input type="hidden" name="uid1" value="<?php echo $uidn; ?>">
<div><label for="secr">Security Question</label><select name="secr" onBlur="sec()">
	<option value="0" <?php if($secur_ques==0) echo "selected" ?>>Select Security Question</option>
	<option value="favourite teacher" <?php if($secur_ques=="favourite teacher") echo "selected" ?>>What Is Your Favourite Teacher Name&#63;</option>
	<option value="mother name" <?php if($secur_ques=="mother name") echo "selected" ?>>What Is Your Mother Name&#63;</option>
	<option value="childhood friend" <?php if($secur_ques=="childhood friend") echo "selected" ?>>What Is Your Childhood Friend Name&#63;</option>
	<option value="favourite food" <?php if($secur_ques=="favourite food") echo "selected" ?>>What Is Your Favourite Food&#63;</option></select><span id="secerr"></span></div>
<div><label for="seca">Security Answer</label><input type="text" name="seca" placeholder="eg:-ram" onKeyPress="return lettersOnly(event)" onBlur="secan()" value="<?php echo $secur_ans ?>" required><span id="secaerr"></span></div>
<div><input type="submit" name="sub" value="Submit">&nbsp;<input type="reset" value="Reset"></div>
</form>
</body>
</html>
<?php
if($_POST)
{
$mob=$_POST['mo'];
$email=$_POST['em'];
$emaill=strtolower($email);
$uid=$_POST['userid'];
//$uidn=$_POST['uid1'];
//$uidl=strtolower($uid);
$secq=$_POST['secr'];
$secql=strtolower($secq);
$seca=$_POST['seca'];
$secal=strtolower($seca);
$sub=$_POST['sub'];
include('db_conn.php');
if(isset($sub))
{
$query="update student_details set mob_no='$mob',email_id='$emaill' where student_id='$uid'";
$qu="update users_details set security_ques='$secql',security_ans='$secal' where user_id='$uid'";
mysql_query($query)or die("error in student query");
mysql_query($qu)or die("error in usi query");
if(!$query)
{
	echo "error in query";
}
else
{
	echo "Detials Updated";
	header("Location:student_profile.php");
}
}
}
?>