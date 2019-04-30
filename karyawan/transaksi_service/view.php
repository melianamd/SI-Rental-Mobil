<?php
error_reporting(0);
include '../db/koneksi.php';
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM service where KODESERVICE LIKE '%$cari%' or TGLSERVICE LIKE '%$cari%' or BIAYASERVICE LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM service"; 
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
                      <h4><i class="fa fa-angle-right"></i> Data Transaksi Service</h4>
        <br/> &nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=servicetambah"><button class="btn btn-primary">Transaksi Baru</button></a><br/><br/><br/>

      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>No. Transaksi</th>
                                  <th>Nama Jenis Service</th>
                                  <th>No. Plat</th>
                                  <th>Tanggal Service</th>
                                  <th>Biaya Service</th>
                                  <th colspan="2"></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td class="numeric"><?php echo $no; ?></td>
       <td class="numeric"><?php echo $data['KODESERVICE']; ?></td>
      <td class="numeric"> <?php $kompsql = mysql_query ("SELECT * from jenis_service where IDJENISSERVICE= '$data[IDJENISSERVICE]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMJenisService']; ?></td>
      
      
      <td class="numeric"><?php echo $data['NOPLAT']; ?></td>
      <td class="numeric"><?php echo $data['TGLSERVICE']; ?></td>
      <td class="numeric">Rp. <?php echo $data['BIAYASERVICE']; ?></td>
     
     <td align="center"><a href="?page=struk_service&kode=<?php echo $data['KODESERVICE']; ?>">
<button type="button" class="btn btn-info">Struk</button></a></td>
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
		  	
