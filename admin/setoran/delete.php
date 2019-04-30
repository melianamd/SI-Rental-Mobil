<?php
 
$id = $_GET['no'];
 
$query = mysql_query("delete from setoran where NOSETORAN='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=setoranview';</script>";
}
?>
 