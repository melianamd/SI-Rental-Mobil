<?php
 
$id = $_GET['kode'];
 
$query = mysql_query("delete from service where KODESERVICE='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=serviceview';</script>";
}
?>
 