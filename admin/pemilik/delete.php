<?php
 
$id = $_GET['kode'];
 
$query = mysql_query("delete from pemilik where KODEPEMILIK='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=pemilikview';</script>";
}
?>
 