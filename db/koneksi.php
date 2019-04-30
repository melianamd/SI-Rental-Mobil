<?php
$host = "localhost";
$user = "root";
$pass = "";
$databse = "rpl2016smk6_26";

mysql_connect($host,$user,$pass);
$db = mysql_select_db($databse);
if($db){
}
else{
	echo"Databse tidak ada";
}
?>