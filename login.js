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
function logp()
{
	var pass=document.p.password;
	if(pass.value=="")
	{
		document.getElementById('paerr').innerHTML="Password is required";	
		return false;
	}
	else
	{
		document.getElementById('paerr').innerHTML="";	
		return true;
	}
}
function toggle_password(target)
{
    var d = document;
    var tag = d.getElementById(target);
    var tag2 = d.getElementById("showhide");

    if (tag2.innerHTML == 'Show'){
        tag.setAttribute('type', 'text');   
        tag2.innerHTML = 'Hide';

    } else {
        tag.setAttribute('type', 'password');   
        tag2.innerHTML = 'Show';
    }
}