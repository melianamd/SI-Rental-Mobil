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
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">No. Setoran</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama Pemilik</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama Karyawan</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Tanggal Setoran</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Jumlah</td>
                                 
                              </tr>
                              </thead>
                              <tbody>
                              <?php
    $no = 1;
   if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$result = mysql_query("SELECT * FROM setoran where NOSETORAN LIKE '%$cari%' or KODEPEMILIK LIKE '%$cari%' or NIK LIKE '%$cari%' or TGLSETORAN LIKE '%$cari%' or JUMLAH LIKE '%$cari%'") or die (mysql_error());
	}else{
	$query = "SELECT * FROM setoran"; 
$result = mysql_query($query) or die (mysql_error());}
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $no; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NOSETORAN']; ?></td>
      
      <td style="border:1px solid #999;padding:4px 8px;"><?php 
	  $kompsql = mysql_query ("SELECT * from pemilik where KODEPEMILIK= '$data[KODEPEMILIK]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMPEMILIK']; ?></td>
      
      <td style="border:1px solid #999;padding:4px 8px;"><?php 
	  $kompsql = mysql_query ("SELECT * from karyawan where NIK= '$data[NIK]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMKARYAWAN']; ?></td>
      
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['TGLSETORAN']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['JUMLAH']; ?></td>
     
    
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
		  	
