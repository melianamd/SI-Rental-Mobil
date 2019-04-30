<?php
 
$id = $_GET['id'];
 
$query = mysql_query("delete from sopir where IDSOPIR='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=sopirview';</script>";
}
?>
 