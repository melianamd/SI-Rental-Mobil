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
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">ID Type</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama Merk</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama Type</td>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php
     $no = 1;
   if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$result = mysql_query("SELECT * FROM type where IDTYPE LIKE '%$cari%' or NMTYPE LIKE '%$cari%'") or die (mysql_error());
	}else{
	$query = "SELECT * FROM type"; 
$result = mysql_query($query) or die (mysql_error());}
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $no; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['IDTYPE']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php 
	  $kompsql = mysql_query ("SELECT * from merk where KODEMERK = '$data[KODEMERK]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMMERK']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NMTYPE']; ?></td>
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
		  	
