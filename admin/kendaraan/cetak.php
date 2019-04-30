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
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">No. Plat</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama Type</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Nama Pemilik</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Tahun</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Tarif Per Jam</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Status Rental</td>
                                  <td style="border:1px solid #999;padding:8px 0;background: #0cf;">Kapasitas</td>
                               
                              </tr>
                              </thead>
                              <tbody>
                              <?php
     $no = 1;
   if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$result = mysql_query("SELECT * FROM kendaraan where NOPLAT LIKE '%$cari%' or TAHUN LIKE '%$cari%' or TARIFPERJAMKENDARAAN LIKE '%$cari%' or STATUSRENTAL LIKE '%$cari%'") or die (mysql_error());
	}else{
	$query = "SELECT * FROM kendaraan"; 
$result = mysql_query($query) or die (mysql_error());}
    while ($data = mysql_fetch_array($result)) {
    ?>
                            
     <tr>         
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $no; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['NOPLAT']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;">
	 <?php 
	  $kompsql = mysql_query ("SELECT * from type where IDTYPE = '$data[IDTYPE]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMTYPE']; ?> 
      </td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php 
	  $kompsql = mysql_query ("SELECT * from pemilik where KODEPEMILIK = '$data[KODEPEMILIK]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMPEMILIK']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['TAHUN']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['TARIFPERJAMKENDARAAN']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['STATUSRENTAL']; ?></td>
      <td style="border:1px solid #999;padding:4px 8px;"><?php echo $data['KAPASITAS']; ?></td>
     
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
		  	
