<?php
 
$id = $_GET['id'];
 
$query = mysql_query("delete from type where IDTYPE='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=typeview';</script>";
}
?>
 