<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content=mysql_real_escape_string($_POST['content']);
$content1=mysql_real_escape_string($_POST['content1']);

$mess.=nullvalid($content,"Enter Pickup Point Name,");
$mess.=nullvalid($content1,"Enter Route ID,");

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


$mess.=nullvalid($ucontent,"Enter Pickup ID,");
$mess.=nullvalid($ucontent1,"Enter Pickup Point Name,");
$mess.=nullvalid($ucontent2,"Enter Route ID,");

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