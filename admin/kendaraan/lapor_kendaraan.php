<?php
error_reporting(0);
include '../db/koneksi.php';
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM kendaraan where NOPLAT LIKE '%$cari%' or TAHUN LIKE '%$cari%' or TARIFPERJAMKENDARAAN LIKE '%$cari%' or STATUSRENTAL LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM kendaraan"; 
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
                      <h4><i class="fa fa-angle-right"></i> Data Kendaraan</h4>

      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>No. Plat</th>
                                  <th>Nama Type</th>
                                  <th>Nama Pemilik</th>
                                  <th>Tahun</th>
                                  <th>Tarif Per Jam</th>
                                  <th>Status Rental</th>
                                  <th>Kapasitas</th>
                               
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td class="numeric"><?php echo $no; ?></td>
      <td class="numeric"><?php echo $data['NOPLAT']; ?></td>
      <td class="numeric">
	 <?php 
	  $kompsql = mysql_query ("SELECT * from type where IDTYPE = '$data[IDTYPE]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMTYPE']; ?> 
      </td>
      <td class="numeric"><?php 
	  $kompsql = mysql_query ("SELECT * from pemilik where KODEPEMILIK = '$data[KODEPEMILIK]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMPEMILIK']; ?></td>
      <td class="numeric"><?php echo $data['TAHUN']; ?></td>
      <td class="numeric"><?php echo $data['TARIFPERJAMKENDARAAN']; ?></td>
      <td class="numeric"><?php echo $data['STATUSRENTAL']; ?></td>
      <td class="numeric"><?php echo $data['KAPASITAS']; ?></td>
     
     </tr>          
             
            <?php
        $no++;
    }
    ?>
                              </tbody>
                          </table>
                          
                 <?php
if (isset($_POST['cari'])){
	echo"<a href='kendaraan/cetak.php?cari=$_POST[cari]'>Cetak</a>"	;
}
else{
	echo"<a href='kendaraan/cetak.php'>Cetak</a>"	;
}
?>                       
                          
                              </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
