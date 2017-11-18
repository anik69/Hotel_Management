<?php
$host ='localhost';
$user = 'root';
$pass = '';
$mysql_db = "hotel";
if(!@mysql_connect($host,$user,$pass)||!@mysql_select_db($mysql_db))
{
	echo "Sorry! The connection is down :(";
	die();
}


?>