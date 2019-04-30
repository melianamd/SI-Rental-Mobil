<?php
 
$id = $_GET['plat'];
 
$query = mysql_query("delete from kendaraan where NOPLAT='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=kendaraanview';</script>";
}
?>
 