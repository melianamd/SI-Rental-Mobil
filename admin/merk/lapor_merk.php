<?php
error_reporting(0);
include '../db/koneksi.php';
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM merk where KODEMERK LIKE '%$cari%' or NMMERK LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM merk"; 
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
                      <h4><i class="fa fa-angle-right"></i> Data Merk</h4>
      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Kode Merk</th>
                                  <th>Nama Merk</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td class="numeric"><?php echo $no; ?></td>
      <td class="numeric"><?php echo $data['KODEMERK']; ?></td>
      <td class="numeric"><?php echo $data['NMMERK']; ?></td>
     </tr>          
             
            <?php
        $no++;
    }
    ?>
                              </tbody>
                          </table>
                <?php
if (isset($_POST['cari'])){
	echo"<a href='merk/cetak.php?cari=$_POST[cari]'>Cetak</a>"	;
}
else{
	echo"<a href='merk/cetak.php'>Cetak</a>"	;
}
?>                  
                           
                          
                              </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
