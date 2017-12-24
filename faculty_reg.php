<!doctype html>
<html>
	<head>
		<title>Faculty Registration Page</title>
		<script src="faculty_reg.js"></script>
		<script src="jquery.min.js" type="text/javascript"></script>
		<script src="userid_faculty.js"></script>
	</head>
	<body onLoad="document.p.fnam.focus()" bgcolor="LAVENDER">
		<h1>Faculty Registration Page</h1>
		<form name="p" method="post" onSubmit="return ch();">
			<div>
				<label for="fnam">First Name&nbsp;</label>
				<input type="text" name="fnam" id="fname" placeholder="First Name" maxlength="45" onBlur="fn()" onChange="genfullnam()" onKeyPress="return lettersOnly(event)" required>
				<span id="fnerr"></span>
			</div>
			<div>
				<label for="mnam">Middle Name&nbsp;</label>
				<input type="text" name="mnam" id="mname" placeholder="Middle Name" maxlength="45" onBlur="mn()" onChange="genfullnam()" onKeyPress="return lettersOnly(event)">
				<span id="mnerr"></span>
			</div>
			<div>
				<label for="lnam">Last Name&nbsp;</label>
				<input type="text" name="lnam" id="lname" placeholder="Last Name" maxlength="45" onBlur="ln()" onChange="genfullnam()" onKeyPress="return lettersOnly(event)" required>
				<span id="lnerr"></span>
			</div>
			<div>
				<label for="funam">Full Name&nbsp;</label>
				<input type="text" name="funam" id="fullname" placeholder="Full Name" maxlength="100" onBlur="fu()" onKeyPress="return lettersOnly(event)" required>
				<span id="fuerr"></span>
			</div>
			<div>
				<label for="fanam">Father Name&nbsp;</label>
				<input type="text" name="fanam" id="faname" placeholder="Father Name" maxlength="100" onBlur="fan()" onKeyPress="return lettersOnly(event)" required>
				<span id="faerr"></span>
			</div>
			<div>
				<label for="gen">Gender&nbsp;</label>
				<input type="radio" name="gen" value="Male" onBlur="ge()" required>Male
				<input type="radio" name="gen" value="Female" onBlur="ge()" required>Female
				<input type="radio" name="gen" value="other" onBlur="ge()" required>Other
				<span id="generr"></span>
			</div>
			<div><label for="dob">Date Of Birth&nbsp;</label><select name="birthday_day" id="day" title="Day" onblur="dt_check()">
<option value="0">Day</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5" selected="1">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>	
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="birthday_month" id="month" title="Month" onblur="dt_check()">
<option value="0">Month</option>
<option value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7" selected="1">Jul</option>
<option value="8">Aug</option>
<option value="9">Sept</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<select name="birthday_year" id="year" title="Year" onblur="dt_check()">
<option value="0">Year</option>
<option value="2017">2017</option>
<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999" selected="1">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
</select><span id="birtherr"></span></div>
			<div>
				<label for="mo">Mobile no&nbsp;</label>
				<input type="text" value="+91" size="1" name="modigit" disabled>
				<input type="text" name="mo" id="moi" maxlength="10" placeholder="eg:-9587823867" onBlur="mob()" onkeypress="return isNumber(event)" onChange="genusi()" required>
				<span id="moerr"></span>
			</div>
			<div>
				<label for="em">Email id&nbsp;</label>
				<input type="text" name="em" id="email" placeholder="Email id eg:abc@gmail.com" maxlength="255" onBlur="ema()" required>
				<span id="emerr"></span>
			</div>
			<div>
				<label for="userid">Faculty Id&nbsp;</label>
				<input type="text" name="userid" id="userid" placeholder="Ram1234" maxlength="30" ondrop="return false;" oncopy="return false;" oncut="return false;" onpaste="return false;" onblur="genusi()" required><span id="status"></span>
			</div>
			<div>
				<label for="pwd">Password&nbsp;</label>
				<input type="password" name="pwd" id="pwd" placeholder="eg:-Ram@47863" maxlength="255" onBlur="pass()" required>
				<span id="pwderr"></span>
			</div>
			<div>
				<label for="pwde">Cofirm Password&nbsp;</label>
				<input type="password" name="pwde" id="pwde" placeholder="eg:-Ram@47863" maxlength="255" onBlur="pass1()" required>
				<span id="pwdeerr"></span>
			</div>
			<div>
				<label for="secr">Security Question&nbsp;</label>
				<select name="secr" id="secr" onBlur="sec()">
					<option value="Default">Select Security Question</option>
					<option selected="" value="favourite teacher">What Is Your Favourite Teacher Name&#63;</option>
					<option value="mother name">What Is Your Mother Name&#63;</option>
					<option value="childhood friend">What Is Your Childhood Friend Name&#63;</option>
					<option value="favourite food">What Is Your Favourite Food&#63;</option>
				</select>
				<span id="secerr"></span>
			</div>
			<div>
				<label for="seca">Security Answer</label>
				<input type="text" name="seca" id="seca" placeholder="eg:-ram" maxlength="60" onKeyPress="return lettersOnly(event)" onBlur="secan()" required>
				<span id="secaerr"></span>
			</div>
			<div>
				<input type="submit" name="Submit" value="Submit">&nbsp;
				<input type="reset" name="Reset" value="Reset">
			</div>
		</form>
		<br>
<a href="index.php">login</a>
<br>
<br>
<span id="pwdserr"></span>
	</body>
</html>
<?php
if($_POST)
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
$pass=$_POST['pwd'];
$fci=$_POST['userid'];
$fcil=strtolower($fci);
$secq=$_POST['secr'];
$secql=strtolower($secq);
$seca=$_POST['seca'];
$secal=strtolower($seca);
$u_type="faculty";
$status="deactive";
echo "<br><br>";
include('db_conn.php');
mysql_query("insert into users_details (user_id,password,security_ques,security_ans,user_type,status) values('$fcil','$pass','$secql','$secal','$u_type','$status')")or die("error in facultyid");
$res=mysql_query("insert into faculty_details (faculty_id,f_name,m_name,l_name,full_name,father_name,gender,mob_no,email_id,dob) values('$fcil','$fnaml','$mnaml','$lnaml','$funaml','$fanaml','$gen','$mob','$emaill','$dob')");
if(!$res)
{
	echo "error in query";
}
else
{
	echo "Your Form Submited Sucessfully";
	header( "refresh:5;url=index.php" );
}
}
?>