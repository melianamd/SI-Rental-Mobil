<?php
error_reporting(0);
include '../db/koneksi.php';
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM karyawan where NIK LIKE '%$cari%' or NMKARYAWAN LIKE '%$cari%' or ALMTKARYAWAN LIKE '%$cari%' or TELPKARYAWAN LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM karyawan"; 
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
                      <h4><i class="fa fa-angle-right"></i> Data Karyawan</h4>
    
      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                
                                  <th>NIK</th>
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
      
       <td class="numeric"><?php echo $data['NIK']; ?></td>
      <td class="numeric"><?php echo $data['NMKARYAWAN']; ?></td>
      <td class="numeric"><?php echo $data['ALMTKARYAWAN']; ?></td>
      <td class="numeric"><?php echo $data['TELPKARYAWAN']; ?></td>
     </tr>          
             
            <?php
        $no++;
    }
    ?>
                              </tbody>
                          </table>
             <?php
if (isset($_POST['cari'])){
	echo"<a href='karyawan/cetak.php?cari=$_POST[cari]'>Cetak</a>"	;
}
else{
	echo"<a href='karyawan/cetak.php'>Cetak</a>"	;
}
?>                  
                          
                          
                              </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
