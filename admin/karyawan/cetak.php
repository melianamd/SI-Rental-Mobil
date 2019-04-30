<script>
function loadprint(){
	window.print() ;
}
</script>
<body onLoad="loadprint()">
<?php
include "../db/koneksi.php";
?> 
        
<table style="width:80%;border-collapse:collapse;background:#ecf3eb" >
    <thead>
      <tr>
                       <td style="border:1px solid #999;padding:8px 0;background: #0cf;">No.</td>
                       <td style="border:1px solid #999;padding:8px 0;background: #0cf;">NIK</td>
                       <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama</td>
                       <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Alamat</td>
                       <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Telepon</td>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
   if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$result = mysql_query("SELECT * FROM karyawan where NIK LIKE '%$cari%' or NMKARYAWAN LIKE '%$cari%' or ALMTKARYAWAN LIKE '%$cari%' or TELPKARYAWAN LIKE '%$cari%'") or die (mysql_error());
	}else{
	$query = "SELECT * FROM karyawan"; 
$result = mysql_query($query) or die (mysql_error());}
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $no; ?></td>
      
       <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NIK']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NMKARYAWAN']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['ALMTKARYAWAN']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['TELPKARYAWAN']; ?></td>
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
		  	
