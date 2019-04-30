<?php
error_reporting(0);
include '../db/koneksi.php';
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
$query = ("SELECT * FROM kendaraan where NOPLAT LIKE '%$cari%' or TAHUN LIKE '%$cari%' or TARIFPERJAMKENDARAAN LIKE '%$cari%' or STATUSRENTAL LIKE '%$cari%' or KAPASITAS LIKE '%$cari%'"); 
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
     <br/> &nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=kendaraantambah"><button class="btn btn-primary">Tambah Data</button></a><br/><br/><br/>
      <section id="unseen">   
 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>No. Plat</th>
                                  <th>ID Type</th>
                                  <th>Kode Pemilik</th>
                                  <th>Tahun</th>
                                  <th>Tarif Per Jam</th>
                                  <th>Status Rental</th>
                                  <th>Foto</th>
                                  <th>Kapasitas</th>
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
      <td class="numeric"><?php echo $data['NOPLAT']; ?></td>
      
      <td class="numeric">
<?php echo $data['IDTYPE']; ?>    
  </td>
      
      <td class="numeric"><?php echo $data['KODEPEMILIK']; ?></td>
      
      <td class="numeric"><?php echo $data['TAHUN']; ?></td>
      <td class="numeric">Rp. <?php echo $data['TARIFPERJAMKENDARAAN']; ?></td>
      <td class="numeric"><?php echo $data['STATUSRENTAL']; ?></td>
      <td class="numeric"><img src="images/produk/<?php echo $data['FOTO']; ?>" height="32px" width="32px"></td>
      <td class="numeric"><?php echo $data['KAPASITAS']; ?></td>
     
     <td align="center"><a href="?page=kendaraanedit&plat=<?php echo $data['NOPLAT']; ?>">
<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>
<td align="center"><a href="?page=kendaraanhapus&plat=<?php echo $data['NOPLAT']; ?>" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ?')"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a></td>
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
		  	
