<?php
error_reporting(0);
include '../db/koneksi.php';
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM sopir where IDSOPIR LIKE '%$cari%' or NMSOPIR LIKE '%$cari%' or ALMTSOPIR LIKE '%$cari%' or TELPSOPIR LIKE '%$cari%' or NOSIM LIKE '%$cari%' or TARIFPERJAMSOPIR LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM sopir"; 
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
                      <h4><i class="fa fa-angle-right"></i> Data Sopir</h4>
   
      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>ID Sopir</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Telepon</th>
                                  <th>No. SIM</th>
                                  <th>Tarif Per Jam</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td class="numeric"><?php echo $no; ?></td>
      <td class="numeric"><?php echo $data['IDSOPIR']; ?></td>
      <td class="numeric"><?php echo $data['NMSOPIR']; ?></td>
      <td class="numeric"><?php echo $data['ALMTSOPIR']; ?></td>
      <td class="numeric"><?php echo $data['TELPSOPIR']; ?></td>
      <td class="numeric"><?php echo $data['NOSIM']; ?></td>
      <td class="numeric"><?php echo $data['TARIFPERJAMSOPIR']; ?></td>
     </tr>          
             
            <?php
        $no++;
    }
    ?>
                              </tbody>
                          </table>
                  <?php
if (isset($_POST['cari'])){
	echo"<a href='sopir/cetak.php?cari=$_POST[cari]'>Cetak</a>"	;
}
else{
	echo"<a href='sopir/cetak.php'>Cetak</a>"	;
}
?>  
                          
                              </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
