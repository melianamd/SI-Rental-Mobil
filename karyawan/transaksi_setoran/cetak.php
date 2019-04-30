<script>
function loadprint(){
	window.print() ;
}
</script>
<body onLoad="loadprint()">
<?php 
include "../db/koneksi.php";
?>



                <div class="panel panel-default animated animate2 fadeInDownBig">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
   
     <div class="table-responsive">
<table style="width:80%;border-collapse:collapse;background:#ecf3eb" >
	<thead>
    	<tr >
        
        	<th style="border:1px solid #999;padding:8px 0;background: #0cf;">No. Transaksi</th>
        	<th style="border:1px solid #999;padding:8px 0;background: #0cf;">No. Plat</th>
            <th style="border:1px solid #999;padding:8px 0;background: #0cf;">Biaya Kendaraan</th>
            <th style="border:1px solid #999;padding:8px 0;background: #0cf;">Biaya Kerusakan</th>
            <th style="border:1px solid #999;padding:8px 0;background: #0cf;">Biaya Denda</th>
        
        </tr>
     </thead>
    
     	
     <tbody>
	
        <tr>
     	<?php
		$kode= $_GET['id'];
		$by_kdr=0;
		$by_dd=0;
		$by_kk=0;
		$sql = mysql_query ("select * from transaksi_sewa  INNER JOIN kendaraan INNER JOIN sopir  ON transaksi_sewa.NOPLAT = kendaraan.NOPLAT and transaksi_sewa.IDSOPIR = sopir.IDSOPIR WHERE kendaraan.KODEPEMILIK='$kode' ") or die (mysql_error());
		
	while ($row=mysql_fetch_array($sql)){
		?>
        
          <td style="border:1px solid #999;padding:8px 0;"><?php echo $row['NOTRANSAKSI'] ?></td>
   			<td style="border:1px solid #999;padding:8px 0;"><?php echo $row['NOPLAT'] ?></td>
            <td style="border:1px solid #999;padding:8px 0;"><?php echo $row['BIAYAKENDARAANTOTAL'] ?></td>
             <td style="border:1px solid #999;padding:8px 0;"> <?php echo $row['BIAYAKERUSAKAN'] ?></td>
 	         <td style="border:1px solid #999;padding:8px 0;"><?php echo $row['DENDA'] ?></td>
</tr>

<?php 
$by_kdr+=$row['BIAYAKENDARAANTOTAL'];
$by_dd+=$row['DENDA'];
$by_kk+=$row['BIAYAKERUSAKAN'];
}?>
<tr><td colspan="2" style="border:1px solid #999;padding:8px 0;">Total</td><td colspan="3" align="center" style="border:1px solid #999;padding:8px 0;">
<?=$by_kdr+$by_dd+$by_kk;?> </td></tr></tbody></table>
  



</tbody>
</table>

</div></div></div>