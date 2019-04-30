<?php
error_reporting(0);
include '../db/koneksi.php';
$kode1		= buatKode("setoran","STR");
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM setoran where setoran LIKE '%$cari%' or NOSETORAN LIKE '%$cari%' or TGLSETORAN LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM setoran"; 
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
                      <h4><i class="fa fa-angle-right"></i> Data Setoran</h4><br/>
    
      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>No. Setoran</th>
                                  <th>Nama Karyawan</th>
                                  <th>Nama Pemilik</th>
                                  <th>Tanggal Setoran</th>
                                   <th>Jumlah Setoran</th>
                                  <th colspan="1"></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td class="numeric"><?php echo $no; ?></td>
      
       <td class="numeric"><?php echo $data['NOSETORAN']; ?></td>
       
      <td class="numeric"> <?php 
	  $kompsql = mysql_query ("SELECT * from karyawan where NIK = '$data[NIK]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMKARYAWAN']; ?> 
      </td>
      
      <td class="numeric"> <?php 
	  $kompsql = mysql_query ("SELECT * from pemilik where KODEPEMILIK = '$data[KODEPEMILIK]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMPEMILIK']; ?> </td>
      

      <td class="numeric"><?php echo $data['TGLSETORAN']; ?></td>
      <td class="numeric"><?php echo $data['JUMLAH']; ?></td>
     
     <td align="center"><a href="?page=struk&nota=<?php echo $data['NOTRANSAKSI']; ?>">
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
		  	
