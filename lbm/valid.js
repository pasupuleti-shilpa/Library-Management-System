function func()
{
var name=document.getElementById("name").value;
var regname=/\d+$/g;
var email=document.getElementById("email").value;
var regmailid=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
var pswd=document.getElementById("pswd").value;
var l=/[a-z]/g;
var c=/[A-Z]/g;
var d=/[0-9]/g;
if(name=="" || regname.test(name))
{
alert("enter valid name");
name.focus();
return false;
}
if(email=="" || !regmailid.test(email))
{
alert("enter valid email id");
mailid.focus();
return false;
}
if(pswd=="" || !l.test(pswd) ||!c.test(pswd) || !d.test(pswd))
{
alert("enter password in mentioned format");
pswd.focus();
return false;
}
return true;
}