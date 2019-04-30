<?php
 
$id = $_GET['id'];
 
$query = mysql_query("delete from jenis_service where IDJENISSERVICE='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=jenis_service_view';</script>";
}
?>
 