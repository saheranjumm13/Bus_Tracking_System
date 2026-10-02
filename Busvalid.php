<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content=mysql_real_escape_string($_POST['content']);
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);

$mess.=Namespacevalid($content,"Enter Valid Name",3);
$mess.=phonevalid($content1,"Enter Valid Mob. No,",10);
$mess.=nullvalid($content2,"Enter Bus No,");

if($content3<18)
	{
$mess.="Enter Valid Age";
	}

$mess.=DatbaseValid("bus_data","Bussno",$content2,"Bus No Allready Register,");


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

$mess.=Namespacevalid($ucontent1,"Enter Valid Name",3);
$mess.=phonevalid($ucontent2,"Enter Valid Mob. No,",10);
$mess.=nullvalid($ucontent3,"Enter Bus No,");

if($ucontent4<18)
	{
$mess.="Enter Valid Age";
	}

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