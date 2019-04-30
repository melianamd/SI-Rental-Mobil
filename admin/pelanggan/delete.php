<?php
 
$id = $_GET['ktp'];
 
$query = mysql_query("delete from pelanggan where NOKTP='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=pelangganview';</script>";
}
?>
 