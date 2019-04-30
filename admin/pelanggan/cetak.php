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
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">No. KTP</td>
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
$result = mysql_query("SELECT * FROM pelanggan where NOKTP LIKE '%$cari%' or NAMAPEL LIKE '%$cari%' or ALAMATPEL LIKE '%$cari%' or TELPPEL LIKE '%$cari%'") or die (mysql_error());
	}else{
	$query = "SELECT * FROM pelanggan"; 
$result = mysql_query($query) or die (mysql_error());}
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $no; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NOKTP']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NAMAPEL']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['ALAMATPEL']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['TELPPEL']; ?></td>
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
		  	
