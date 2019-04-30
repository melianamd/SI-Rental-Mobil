<?php
 include ("../db/koneksi.php");

 $id=$_GET['kode'];
 $selectTS = "SELECT * FROM service WHERE KODESERVICE='$id'" ;
 $resultselectTS = mysql_query($selectTS) or die ('error, load data tiket failed.' . mysql.error());
 $row = mysql_fetch_assoc($resultselectTS);
 
?>


<head> <title> Struk Transaksi Service </title> </head>
<body>
 <form method="post">
 <!-- tag Fieldset berfungsi untuk mengelompokkan beberapa objek form menjadi sebuah kelompok -->
 <fieldset>
<div align="center"><img src="transaksi_service/logo.png" width="720" height="100" /><br>
 <!-- tabel -->
 <table width="60%" align='center' border='0'>
  <tr>
    <td colspan="7">=========================================================================================</td>
  </tr>
  
  <tr>
    <td>No. Transaksi</td>
    <td>:</td>
    <td><?php echo $row['NOTRANSAKSI']; ?></td>
    
    <td width="150" align="center"> | </td>
    
    <td>Nama Pelanggan</td>
    <td>:</td>

    <td><?php 
	  $kompsql = mysql_query ("SELECT * from pelanggan where NOKTP = '$row[NOKTP]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NAMAPEL']; ?></td>
     </tr>
 
  
  <tr>
      
       <td>Karyawan</td>
    <td>:</td>

    <td><?php 
	  $kompsql = mysql_query ("SELECT * from karyawan where NIK = '$row[NIK]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMKARYAWAN']; ?></td>   
      
    <td width="150" align="center"> | </td>
    <td>Tanggal Pinjam</td>
    <td>:</td>
    <td><?php echo $row['TGLPINJAM']; ?></td>
  </tr>
  
  <tr>
    <td>Jam Pinjam</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $row['JAMPINJAM']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Tanggal Kembali Rencana</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowpenumpang di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $row['TGLKEMBALIRENCANA']; ?></td>
  </tr>
  
  <tr>
    <td>Jam Kembali Rencana</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $row['JAMKEMBALIRENCANA']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Tanggal Kembali Realisasi</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowpenumpang di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $row['TGLKEMBALIREALISASI']; ?></td>
  </tr>
  
  <tr>
    <td>Jam Kembali Realisasi</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $row['JAMKEMBALIREAL']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Denda</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowpenumpang di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $row['DENDA']; ?></td>
  </tr>
  
  <tr>
    <td>Biaya Kendaraan</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?=$tarif_kendaraan; ?></td>
    <td width="150" align="center"> | </td>
        <td>Biaya Sopir</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowpenumpang di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?=$biaya_sopir; ?></td>
  </tr>
  
  <tr>
    <td>Biaya Kerusakan</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $row['BIAYAKERUSAKAN']; ?></td>
    <td width="150" align="center"> | </td>
  </tr>
  
  <tr>
    <td>Biaya BBM</td>
    <td>:</td>
    <!-- mengambil data dr array menggunakan $rowkereta di ikuti nama atribut yg akan ditampilkan datanya -->
    <td><?php echo $row['BIAYABBM']; ?></td>
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