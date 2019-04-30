<?php
 
$id = $_GET['nik'];
 
$query = mysql_query("delete from karyawan where NIK='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=karyawanview';</script>";
}
?>
 