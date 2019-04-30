<?php
include "db/koneksi.php";
 if (isset($_POST['submit'])){
$sql1 =mysql_query("SELECT * FROM `transaksi_sewa` t, kendaraan k where k.NOPLAT=t.NOPLAT  ");
$data1 = mysql_fetch_assoc($sql1);



$date1 = ($data1['TGLKEMBALIREALISASI']);
   $date2 = ($data1['TGLKEMBALIRENCANA']);
 $sel_tgl2 = ((abs(strtotime ($date1) - strtotime ($date2)))/(60*60*24));
   
 echo "Lama selisih 2 tanggal antara tanggal ".$date1." dan ".$date2." adalah ".$sel_tgl2." hari";

 }
?>



<form method="post">
<table cellpadding=2 cellspacing=0>
 <tr>
  <td width=100>Tanggal 1</td><td width=100><input type="date" size="8" name="date1" /></td>
 </tr>
 <tr>
  <td>Tanggal 2</td><td><input type="date" size="8" name="date2" /></td>
  <td> &nbsp </td>
 </tr>
 <tr>
  <td colspan="2" align="center"><input type="submit" name="submit" value="HITUNG" />
 <a href="index.php"> <input type="button" value="Kembali ke Menu Utama"> </a></td>
  <td> </br> </td>
 </tr>
 <tr>
  <td colspan="2">
  
  </td>
 </tr>
</table>
</form>