<?php
 
$id = $_GET['kode'];
 
$query = mysql_query("delete from merk where KODEMERK='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=merkview';</script>";
}
?>
 