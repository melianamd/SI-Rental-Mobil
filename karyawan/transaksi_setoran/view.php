<?php 
include "../db/koneksi.php";
$nik=$_SESSION['NIK'];
$kode1		= buatKode("setoran","STR");

?>



                <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
    <form method="post" action="" >
    <select name="pilih">
      <option value="0" selected="selected" required="required">PILIH PEMILIK</option>
			<?php 
			$q=mysql_query("select * from pemilik order by NMPEMILIK desc");
			
			while($r=mysql_fetch_array($q))
			{
				?><option value="<?php  echo $r['KODEPEMILIK']; ?>"><?php  echo $r['KODEPEMILIK']; ?></option><?php 
			}
			?></select></td> <label></label>
	<input type="submit" name="submit" class='btn btn-primary' value ="Pilih" ><br />
            <br /><br /><br />
            </form>
     <div class="table-responsive">
 <table class="table table-striped table-bordered table-hover">
	<thead>
    	<tr >
        
        	<th>No. Transaksi</th>
        	<th>No. Plat</th>
            <th>Biaya Kendaraan</th>
             <th>Biaya Kerusakan</th>
            <th>Biaya Denda</th>
        
        </tr>
     </thead>
    
     	
     <tbody>
	
        <tr>
     <?php
		if(isset($_POST['submit'])){
		$idPml = $_POST['pilih'];
		$by_kdr=0;
		$by_dd=0;
		$by_kk=0;
		$dataStr = mysql_fetch_assoc(mysql_query("select TGLSETORAN from setoran where KODEPEMILIK='$idPml' order by TGLSETORAN DESC"));
		$sql = mysql_query ("select * from transaksi_sewa  INNER JOIN kendaraan INNER JOIN sopir  ON transaksi_sewa.NOPLAT = kendaraan.NOPLAT and transaksi_sewa.IDSOPIR = sopir.IDSOPIR WHERE kendaraan.KODEPEMILIK='$idPml' AND transaksi_sewa.BIAYAKENDARAANTOTAL!=0 and transaksi_sewa.TGLKEMBALIREALISASI > '$dataStr[TGLSETORAN]' order by transaksi_sewa.NOTRANSAKSI ASC") or die (mysql_error());
			
	while ($row=mysql_fetch_array($sql)){

		?>
        <tr>
          <td><?php echo $row['NOTRANSAKSI'] ?></td>
   			<td><?php echo $row['NOPLAT'] ?></td>
            <td><?php echo $row['BIAYAKENDARAANTOTAL'] ?></td>
             <td><?php echo $row['BIAYAKERUSAKAN'] ?></td>
 	         <td><?php echo $row['DENDA'] ?></td>
</tr>

<?php 
$by_kdr+=$row['BIAYAKENDARAANTOTAL'];
$by_dd+=$row['DENDA'];
$by_kk+=$row['BIAYAKERUSAKAN'];
}?>

<tr><td colspan="2">Total</td><td colspan="3" align="center"><?=$by_kdr+$by_dd+$by_kk;?> </td></tr>


<tr>
<form name="noStr" method="post" action="?page=setorankirim" />
<input type="hidden" name="noStr" value="<?php echo $kode1 ?>" />
<input type="hidden" name="jmlStr" value="<?=$by_kdr+$by_dd+$by_kk;?>" />
<input type="hidden" name="nik" value="<?=$nik ?>" />
<input type="hidden" name="pml" value="<?=$idPml ?>" />


<td>
<input type="submit" name="submit" class="btn btn-primary" value="Kirim Setoran" />
</td>
</tr>
</form>


<?php
  	
	echo"<a href='transaksi_setoran/cetak.php?&&id=$_POST[pilih]'>Cetak</a>"	;
?>  
</tbody>
<tr>
</table>
<?php
		}else{ ?>
<td colspan="4">PILIH PEMILIK DULU</td></tbody>
</table>
<?php }?>

</div></div></div>