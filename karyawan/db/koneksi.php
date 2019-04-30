<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "rpl2016smk6_26";

mysql_connect($host,$user,$pass);
$db = mysql_select_db($dbname);
if($db){
}else{
	echo"Databse tidak ada";
}
?>