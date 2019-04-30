<?php
error_reporting(0);
include '../db/koneksi.php';
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM pemilik where KODEPEMILIK LIKE '%$cari%' or NMPEMILIK LIKE '%$cari%' or ALMTPEMILIK LIKE '%$cari%' or TELPPEMILIK LIKE '%$cari%'"); 
$result = mysql_query($query) or die (mysql_error());
}else{
$query = "SELECT * FROM pemilik"; 
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
                      <h4><i class="fa fa-angle-right"></i> Data Pemilik</h4>
     <br/> &nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=pemiliktambah"><button class="btn btn-primary">Tambah Data</button></a><br/><br/><br/>
      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Kode Pemilik</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Telepon</th>
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
      <td class="numeric"><?php echo $data['KODEPEMILIK']; ?></td>
      <td class="numeric"><?php echo $data['NMPEMILIK']; ?></td>
      <td class="numeric"><?php echo $data['ALMTPEMILIK']; ?></td>
      <td class="numeric"><?php echo $data['TELPPEMILIK']; ?></td>
     
     <td align="center"><a href="?page=pemilikedit&kode=<?php echo $data['KODEPEMILIK']; ?>">
<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>
<td align="center"><a href="?page=pemilikhapus&kode=<?php echo $data['KODEPEMILIK']; ?>" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ?')"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a></td>
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
		  	
