<?php
error_reporting(0);
include '../db/koneksi.php';
$nik = $_SESSION['NIK'];
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM transaksi_sewa where NOTRANSAKSI LIKE '%$cari%' or NOPLAT LIKE '%$cari%' or TGLPESAN LIKE '%$cari%' or TGLPINJAM LIKE '%$cari%' or JAMPINJAM LIKE '%$cari%' or TGLKEMBALIRENCANA LIKE '%$cari%' or JAMKEMBALIRENCANA LIKE '%$cari%' or TGLKEMBALIREALISASI LIKE '%$cari%' or JAMKEMBALIREAL LIKE '%$cari%' or DENDA LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM transaksi_sewa WHERE KILOMETERKEMBALI=''"; 
$result = mysql_query($query) or die (mysql_error());
}
?>

        <div class="row mt">
			  		<div class="col-lg-12">
                    
<form  class="navbar-form pull-right" method="post" accept-charset="utf-8" enctype="multipart/form-data">		  
<input type="text" style="width: 180px;"  placeholder="Masukkan kata kunci..." name="cari">
		  <button type="submit" class="btn btn-primary" name="btncari">Cari Data</button>
		</form>
          <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Data Transaksi Sewa</h4>
     <br/>
      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                    <tr>
                                  <th>No.</th>
                                  <th>No. Transaksi </th>
                                  <th>Kilometer Pinjam</th>
                                  <th>BBM Pinjam</th>
                                  <th>Kondisi Mobil Pinjam</th>
                            
                                  <th>Nama Sopir</th>
                                
                                  <th colspan="3"></th>
                              </tr>                          
   </thead>
   
   
    <tbody>
                              <?php
    $no = 1;
    while ($data = mysql_fetch_array($result)) {
    ?>
                           
     <tr>         
      <td class="numeric"><?php echo $no; ?></td>
      <td class="numeric"><?php echo $data['NOTRANSAKSI']; ?></td>
      <td class="numeric"><?php echo $data['KILOMETERPINJAM']; ?></td>
      
 
      
        <td class="numeric"><?php echo $data['BBMPINJAM']; ?></td>
        <td class="numeric"><?php echo $data['KONDISIMOBILPINJAM']; ?></td>

           
     <td class="numeric"><?php 
	  $kompsql = mysql_query ("SELECT * from sopir where IDSOPIR = '$data[IDSOPIR]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMSOPIR']; ?></td>
     
     
     
     <td align="center"><a href="?page=t_sewaedit&nota=<?php echo $data['NOTRANSAKSI']; ?>">
<button type="button" class="btn btn-success">Konfirmasi</button></a></td>

 <td align="center"><a href="?page=t_sewahapus&nota=<?php echo $data['NOTRANSAKSI']; ?>">
<button type="button" class="btn btn-danger">Tolak</button></a></td>
     </tr>          
             
            <?php
        $no++;
    }
    ?>
                              </tbody>
                          </table>
                              </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
