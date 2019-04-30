<?php
include '../db/koneksi.php';
if(isset($_POST['submit'])){
	$date = date('Y-m-d');
	$jml = $_POST['jmlStr'];
	$inStr = mysql_query ("insert into setoran values ('$_POST[noStr]','$_POST[nik]','$_POST[pml]','$date', $jml)")or die (mysql_error());
	if($inStr){
		echo("<script>alert('Setoran Sukses dikirim !');window.location='?page=setoranview'</script>");
	}
}

?>