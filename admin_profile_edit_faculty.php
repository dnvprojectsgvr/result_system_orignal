<a href="faculty_details.php">Profile Page</a>
<?php
//session_start();
include('db_conn.php');
$var_value = $_POST['varname'];
$uidl=$var_value;
//$uidl =$_SESSION['facultyid'];
$result = mysql_query("SELECT ud.`security_ques`,ud.`security_ans`,f.`faculty_id`,f.`f_name`,f.`m_name`,f.`l_name`,f.`full_name`,f.`father_name`,f.`gender`,f.`mob_no`,f.`email_id`,f.`dob`  from users_details ud,faculty_details f where ud.user_id='$uidl' and f.faculty_id='$uidl'")or die("error in query");
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
				$mobn=$test['mob_no'];
				$emailn=$test['email_id'];
				$uidn=$test['faculty_id'];
				$secur_ques=$test['security_ques'];
				$secur_ans=$test['security_ans'];
list($y,$m,$d)=explode('-', $dobn);
?>
<html>
<head>
<title>Profile Edit</title>
<script src="faculty_reg.js"></script>
<script src="jquery.min.js" type="text/javascript"></script>
<script src="userid_faculty.js"></script>
</head>
<body onLoad="document.p.fnam.focus()" bgcolor="LAVENDER">
<h1>Registration Page</h1>
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
<div><label for="mo">Mobile no&nbsp;</label><input type="text" name="mo" placeholder="eg:-9587823867" onBlur="mob()" onkeypress="return isNumber(event)" value="<?php echo $mobn ?>" required><span id="moerr"></span></div>
<div><label for="em">Email id&nbsp;</label><input type="text" name="em" placeholder="Email id eg:abc@gmail.com" onBlur="ema()" value="<?php echo $emailn ?>" required><span id="emerr"></span></div>
<div><label for="userid">Faculty Id&nbsp;</label><input type="text" name="userid" id="usi" value="<?php echo $uidn ?>"></div>
<input type="hidden" name="uid1" value="<?php echo $uidn; ?>">
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
$mob=$_POST['mo'];
$email=$_POST['em'];
$emaill=strtolower($email);
// $fci=$_POST['userid'];
// $fcil=strtolower($fci);
$uid=$_POST['userid'];
$uidn=$_POST['uid1'];
$uidl=strtolower($uid);
include('db_conn.php');
$query="update faculty_details set f_name='$fnaml',m_name='$mnaml',l_name='$lnaml',full_name='$funaml',father_name='$fanaml',gender='$gen',mob_no='$mob',email_id='$emaill',dob='$dob' where faculty_id='$uidl'";
$qu="update users_details set user_id='$uidl' where user_id='$uidn'";
mysql_query($qu)or die("error in usi query");
mysql_query($query)or die("error in faculty query");
header("location:faculty_details.php");
// if(!$query)
// {
// 	echo "error in query";
// }
// else
// {
// 	echo "detials updated";
// 	header("location:faculty_details.php");
// }
}
?>