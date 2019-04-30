<?php
 
$id = $_GET['nota'];
 
$query = mysql_query("delete from transaksi_sewa where NOTRANSAKSI='$id'") or die(mysql_error());
 
if ($query) {
  echo "<script>window.location='?page=t_pesanview';</script>";
}
?>
 