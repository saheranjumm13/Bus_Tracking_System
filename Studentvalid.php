<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content=mysql_real_escape_string($_POST['content']);
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);
$content4=mysql_real_escape_string($_POST['content4']);
$content5=mysql_real_escape_string($_POST['content5']);

$content6=mysql_real_escape_string($_POST['content6']);
$content7=mysql_real_escape_string($_POST['content7']);
$content8=mysql_real_escape_string($_POST['content8']);
$content9=mysql_real_escape_string($_POST['content9']);
 

$mess.=Namespacevalid($content,"Enter Valid Name",3);
$mess.=EmailValid($content1,"Enter Valid Email,");
$mess.=DatbaseValid("allstudent","semail",$content1,"Email Allready Register,");
$mess.=nullvalid($content2,"Enter Password,");
$mess.=phonevalid($content3,"Enter Valid Mob. No,",10);
$mess.=nullvalid($content5,"Select Route,");

$mess.=nullvalid($content6,"Enter Department,");
$mess.=nullvalid($content7,"Enter Year,");
$mess.=nullvalid($content8,"Enter Address,");
$mess.=nullvalid($content9,"Enter Nearest locality,");


if($mess=="")
	{
	echo "Yes";
	}
	else
	{
		echo $mess;
	}

}


if(isset($_POST['ucontent']))
{

$mess="";
$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);
$ucontent4=mysql_real_escape_string($_POST['ucontent4']);
$ucontent5=mysql_real_escape_string($_POST['ucontent5']);
$ucontent6=mysql_real_escape_string($_POST['ucontent6']);

$ucontent7=mysql_real_escape_string($_POST['ucontent6']);
$ucontent8=mysql_real_escape_string($_POST['ucontent7']);
$ucontent9=mysql_real_escape_string($_POST['ucontent8']);
$ucontent10=mysql_real_escape_string($_POST['ucontent10']);
$ucontent11=mysql_real_escape_string($_POST['ucontent11']);

$mess.=OnlyNumbervalid($ucontent,"Enter valid Student ID,");
$mess.=nullvalid($ucontent,"Enter Student ID,");
$mess.=Namespacevalid($ucontent1,"Enter Valid Name",3);
$mess.=EmailValid($ucontent2,"Enter Valid Email,");
$mess.=nullvalid($ucontent3,"Enter Password,");
$mess.=phonevalid($ucontent4,"Enter Valid Mob. No,",10);
$mess.=nullvalid($ucontent6,"Select Route,");

$mess.=nullvalid($ucontent7,"Enter Department,");
$mess.=nullvalid($ucontent8,"Enter Year,");
$mess.=nullvalid($ucontent9,"Enter Address,");
$mess.=nullvalid($ucontent10,"Select Nearest Pickup Points,");
 

if($mess=="")
	{
	echo "Yes";
	}
	else
	{
		echo $mess;
	}

}

?>