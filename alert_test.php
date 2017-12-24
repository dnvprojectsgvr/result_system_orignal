<!DOCTYPE html>
<html>
<head>
<title>alert test</title>
<script type="text/javascript">
function pass()
{
	var pw=document.p.pwd;
	var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
	/*if(pw.value=="")
	{
		alert("Password is required");
		return false;
	}*/
	if(!pw.value.match(strongRegex))
	{
		alert("Password Must Contain At Least One UpperCase,OneLowerCase,One Digit,One Special Character And Password Length Should Be 8 to 255 Character");
		document.p.pwd.focus();
		//return false;
	}
	/*else
	{
		//return true;
	}*/
}
function pass1()
{
	var pw=document.p.pwd;
	var pw1=document.p.pwde;
	var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
	/*if(pw1.value=="")
	{
		alert("Password is required");
		return false;
	}*/
		if(pw.value.Length>7 && pw.value.Length<256)
		{
			alert("passwords");
			document.p.pwd1.focus();	
		}
		else
		{
			document.p.pwd.focus();
		}
	if(!pw1.value.match(strongRegex))
	{
			alert("passwords");
		
		//return false;
	}
	else if(pw1.value==pw.value)
	{
		alert("Password match");
		//return true;
	}
	else if(pw1.value!=pw.value)
	{
		alert("Password do not match");
		//document.p.pwd.focus();
		document.p.pwde.value="";
		document.p.pwd.value="";
		//return false;
	}
	/*else
	{
		//return true;
	}*/
}
</script>
</head>
<body>
<form name="p">
<div><label for="pwd">Password&nbsp;</label><input type="password" name="pwd" placeholder="eg:-Ram@47863" maxlength="255" onBlur="pass()" required></div>
<div><label for="pwde">Cofirm Password&nbsp;</label><input type="password" name="pwde" placeholder="eg:-Ram@47863" maxlength="255" onBlur="pass1()" required></div>
<input type="Submit" name="Submit">
</form>
</body>
</html>