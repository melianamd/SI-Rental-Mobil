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
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Kode Service</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama Jenis Service</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">No. Plat</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Tanggal Service</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Biaya Service</td>
                               
                              </tr>
                              </thead>
                              <tbody>
                              <?php
     $no = 1;
   if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$result = mysql_query("SELECT * FROM service where KODESERVICE LIKE '%$cari%' or TGLSERVICE LIKE '%$cari%' or BIAYASERVICE LIKE '%$cari%'") or die (mysql_error());
	}else{
	$query = "SELECT * FROM service"; 
$result = mysql_query($query) or die (mysql_error());}
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $no; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['KODESERVICE']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"> <?php $kompsql = mysql_query ("SELECT * from jenis_service where IDJENISSERVICE= '$data[IDJENISSERVICE]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMJenisService']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NOPLAT']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['TGLSERVICE']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['BIAYASERVICE']; ?></td>
     
 
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
		  	
