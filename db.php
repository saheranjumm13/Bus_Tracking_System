<?php
date_default_timezone_set("Asia/Kolkata");
error_reporting(0);

$serialbios =  shell_exec('wmic bios get serialnumber');

if (strpos($serialbios, "CND31428TP") !== false) {
 
$link=mysql_connect("localhost","root") or die("Could not connect".mysql_error());
mysql_select_db("Bustrack")or die("Could not connect: ". mysql_error());
$Rdateus=date('Y-m-d h:i:s');
}

?>