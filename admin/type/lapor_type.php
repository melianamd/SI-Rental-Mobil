<?php
error_reporting(0);
include '../db/koneksi.php';
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM type where IDTYPE LIKE '%$cari%' or NMTYPE LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM type"; 
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
                      <h4><i class="fa fa-angle-right"></i> Data Type</h4>
    
      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>ID Type</th>
                                  <th>Nama Merk</th>
                                  <th>Nama Type</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td class="numeric"><?php echo $no; ?></td>
      <td class="numeric"><?php echo $data['IDTYPE']; ?></td>
      <td class="numeric"><?php 
	  $kompsql = mysql_query ("SELECT * from merk where KODEMERK = '$data[KODEMERK]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMMERK']; ?></td>
      <td class="numeric"><?php echo $data['NMTYPE']; ?></td>
     </tr>          
             
            <?php
        $no++;
    }
    ?>
                              </tbody>
                          </table>
               <?php
if (isset($_POST['cari'])){
	echo"<a href='type/cetak.php?cari=$_POST[cari]'>Cetak</a>"	;
}
else{
	echo"<a href='type/cetak.php'>Cetak</a>"	;
}
?>                     
                              </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
