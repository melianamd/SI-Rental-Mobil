<?php
 include ("../db/koneksi.php");
$nik = $_SESSION['NIK'];
$no_struk = $_GET['nota'];
 $selectTS = "SELECT * FROM transaksi_sewa WHERE NOTRANSAKSI='$no_struk'" ;
 $resultselectTS = mysql_query($selectTS) or die ('error, load data tiket failed.' . mysql.error());
 $row = mysql_fetch_assoc($resultselectTS);

$sql1 =mysql_query("SELECT * FROM `transaksi_sewa` t, kendaraan k, sopir s, karyawan kr, pelanggan p where k.NOPLAT=t.NOPLAT AND NOTRANSAKSI='$no_struk' AND s.IDSOPIR = t.IDSOPIR AND kr.NIK=t.NIK AND p.NOKTP=t.NOKTP") or  die (mysql_error());
$data1 = mysql_fetch_assoc($sql1);


 #perhitungan total
 $grandtotal= ($data1['BIAYAKENDARAANTOTAL'] + $data1['BIAYASOPIR'] + $data1['BIAYAKERUSAKAN'] + $data1['BIAYABBM']);
 ?>
 




<head> <title> Struk Transaksi Sewa </title> </head>
<body>
 <form method="post">
 <!-- tag Fieldset berfungsi untuk mengelompokkan beberapa objek form menjadi sebuah kelompok -->
 <fieldset>
<div align="center"><img src="transaksi_kembali/logo.png" width="720" height="100" /><br>
 <!-- tabel -->
 <table width="60%" align='center' border='0'>
  <tr>
    <td colspan="7">=========================================================================================</td>
  </tr>
  
  <tr>
    <td>No. Transaksi</td>
    <td>:</td>
    <td><?php echo $data1['NOTRANSAKSI']; ?></td>
    
    <td width="150" align="center"> | </td>
    
    <td>Nama Pelanggan</td>
    <td>:</td>

    <td><?php echo $data1['NAMAPEL']; ?></td>
     </tr>
 
  
  <tr>
      
       <td>Karyawan</td>
    <td>:</td>

    <td><?php 
	  echo $data1['NMKARYAWAN']; ?></td>   
      
    <td width="150" align="center"> | </td>
    <td>Tanggal Pinjam</td>
    <td>:</td>
    <td><?php echo $data1['TGLPINJAM']; ?></td>
  </tr>
  
  <tr>
    <td>Jam Pinjam</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['JAMPINJAM']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Tanggal Kembali Rencana</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowpenumpang di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['TGLKEMBALIRENCANA']; ?></td>
  </tr>
  
  <tr>
    <td>Jam Kembali Rencana</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['JAMKEMBALIRENCANA']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Tanggal Kembali Realisasi</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowpenumpang di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['TGLKEMBALIREALISASI']; ?></td>
  </tr>
  
  <tr>
    <td>Jam Kembali Realisasi</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['JAMKEMBALIREAL']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Denda</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowpenumpang di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['DENDA']; ?></td>
  </tr>
  
  <tr>
    <td>Biaya Kendaraan</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['BIAYAKENDARAANTOTAL']; ?></td>
    <td width="150" align="center"> | </td>
        <td>Biaya Sopir</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowpenumpang di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['BIAYASOPIR']; ?></td>
  </tr>
  
  <tr>
    <td>Biaya Kerusakan</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['BIAYAKERUSAKAN']; ?></td>
    <td width="150" align="center"> | </td>
  </tr>
  
  <tr>
    <td>Biaya BBM</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $data1['BIAYABBM']; ?></td>
    <td width="150" align="center"> | </td>
  </tr>
  
   <tr>
    <td>Total</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?=$grandtotal?></td>
    <td width="150" align="center"> | </td>
  </tr>
  
  <tr>
    <td colspan="7">=========================================================================================</td>
  </tr>
 </table>

 </fieldset>
</form> 
    <?php
if (isset($_POST['cari'])){
	echo"<a href='transaksi_kembali/cetak.php?cari=$_POST[cari]'>Cetak</a>"	;
}
else{
	echo"<a href='transaksi_kembali/cetak.php?&&id=$row[NOTRANSAKSI]'>Cetak</a>"	;
}
?>               
</body>
</html>