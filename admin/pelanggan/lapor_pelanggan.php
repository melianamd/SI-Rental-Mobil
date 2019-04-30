<?php
error_reporting(0);
include '../db/koneksi.php';
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM pelanggan where NOKTP LIKE '%$cari%' or NAMAPEL LIKE '%$cari%' or ALAMATPEL LIKE '%$cari%' or TELPPEL LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM pelanggan"; 
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
                      <h4><i class="fa fa-angle-right"></i> Data Pelanggan</h4>
   
      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>No. KTP</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Telepon</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td class="numeric"><?php echo $no; ?></td>
      <td class="numeric"><?php echo $data['NOKTP']; ?></td>
      <td class="numeric"><?php echo $data['NAMAPEL']; ?></td>
      <td class="numeric"><?php echo $data['ALAMATPEL']; ?></td>
      <td class="numeric"><?php echo $data['TELPPEL']; ?></td>
     </tr>          
             
            <?php
        $no++;
    }
    ?>
                              </tbody>
                          </table>
             <?php
if (isset($_POST['cari'])){
	echo"<a href='pelanggan/cetak.php?cari=$_POST[cari]'>Cetak</a>"	;
}
else{
	echo"<a href='pelanggan/cetak.php'>Cetak</a>"	;
}
?>                         
                          
                              </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
