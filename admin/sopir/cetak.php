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
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">ID Sopir</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Alamat</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Telepon</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">No. SIM</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Tarif Per Jam</td>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php
       $no = 1;
   if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$result = mysql_query("SELECT * FROM sopir where IDSOPIR LIKE '%$cari%' or NMSOPIR LIKE '%$cari%' or ALMTSOPIR LIKE '%$cari%' or TELPSOPIR LIKE '%$cari%' or NOSIM LIKE '%$cari%' or TARIFPERJAMSOPIR LIKE '%$cari%'") or die (mysql_error());
	}else{
	$query = "SELECT * FROM sopir"; 
$result = mysql_query($query) or die (mysql_error());}
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $no; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['IDSOPIR']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NMSOPIR']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['ALMTSOPIR']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['TELPSOPIR']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NOSIM']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['TARIFPERJAMSOPIR']; ?></td>
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
		  	
