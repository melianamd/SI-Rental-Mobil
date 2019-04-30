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
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Kode Merk</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama Merk</t>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
   if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$result = mysql_query("SELECT * FROM merk where KODEMERK LIKE '%$cari%' or NMMERK LIKE '%$cari%'") or die (mysql_error());
	}else{
	$query = "SELECT * FROM merk"; 
$result = mysql_query($query) or die (mysql_error());}
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $no; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['KODEMERK']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NMMERK']; ?></td>
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
		  	
