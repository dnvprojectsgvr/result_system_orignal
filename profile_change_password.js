function passcheck()
{
	if (opass())
	{
	if (pass())
	{
	}
	}
	return false;
}
function opass()
{
	var opw=document.p.oldpwd;
	if(opw.value=="")
	{
		document.getElementById('opwderr').innerHTML="Old Password is required";
		//document.p.oldpwd.focus();
		return false;
	}
	else
	{
		document.getElementById('opwderr').innerHTML="";
	}
}
function pass()
{
	var pw=document.p.pwd;
	var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
	if(pw.value=="")
	{
		document.getElementById('pwderr').innerHTML="Password is required";
		return false;
	}
	if(!pw.value.match(strongRegex))
	{
		document.getElementById('pwderr').innerHTML="Password Must Contain See Below";
		document.getElementById('pwdserr').innerHTML="Password Must Contain At Least One UpperCase "+"<br>"+"OneLowerCase,One Digit,One Special Character "+"<br>"+"And Password Length Should Be 8 to 255 Character";
		return false;
	}
	else
	{
		document.getElementById('pwderr').innerHTML="";	
		document.getElementById('pwdserr').innerHTML="";
		return true;
	}
}
function pass1()
{
	var pw=document.p.pwd;
	var pw1=document.p.pwde;
	var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
	if(pw1.value=="")
	{
		document.getElementById('pwdeerr').innerHTML="Password is required";
		return false;
	}
	if(!pw1.value.match(strongRegex))
	{
		document.getElementById('pwdeerr').innerHTML="Password Must Contain See Below";
		document.getElementById('pwdserr').innerHTML="Password Must Contain At Least One UpperCase "+"<br>"+"OneLowerCase,One Digit,One Special Character "+"<br>"+"And Password Length Should Be 8 to 255 Character";
		return false;
	}
	else if(pw1.value==pw.value)
	{
		document.getElementById('pwdeerr').innerHTML="Password match";
		document.getElementById('pwdserr').innerHTML="";
		document.p.value.Submit.focus();
		return true;
	}
	else if(pw1.value!=pw.value)
	{
		document.getElementById('pwdeerr').innerHTML="Password do not match";
		document.p.pwd.focus();
		document.p.pwde.value="";
		document.p.pwd.value="";
		return false;
	}
	else
	{
		document.getElementById('pwdeerr').innerHTML="";	
		return true;
	}
}