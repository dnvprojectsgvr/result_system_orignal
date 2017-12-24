function ch()
{
	if (logu())
	{
	if (sec())	
	{
	if (secan())
	{
	if (pass())
	{
	if (pass1())
	{
	}
	}
	}
	}
	}
	return false;
}
function logu()
{
	var lonam=document.p.userid;
	if(lonam.value=="")
	{
		document.getElementById('uierr').innerHTML="UserId is required";	
		//document.p.userid.focus();
		return false;
	}
	else
	{
		document.getElementById('uierr').innerHTML="";	
		return true;
	}
}
function sec()
{
	var secq=document.p.secr;
	if(secq.value=="Default")
	{	
		document.getElementById('secerr').innerHTML="Please Select Security Question";
		//secq.focus();
		return false;
	}
	else
	{
		document.getElementById('secerr').innerHTML="";
		return true;
	}
}
function secan()
{
	var secans=document.p.seca;
	if(secans.value=="")
	{
		document.getElementById('secaerr').innerHTML="Security Answer is required";	
		//document.p.seca.focus();
		return false;
	}
	else
	{
		document.getElementById('secaerr').innerHTML="";
		return true;
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