<?php include "db/koneksi.php";
$plat = $_GET['noplat'];
function autonumber($tabel, $kolom, $lebar=0, $awalan='')
{
    $query="select $kolom from $tabel order by $kolom desc limit 1";
    $hasil=mysql_query($query);
    $jumlahrecord = mysql_num_rows($hasil);
    if($jumlahrecord == 0)
        $nomor=1;
    else
    {
        $row=mysql_fetch_array($hasil);
        $nomor=intval(substr($row[0],strlen($awalan)))+1;
    }
    if($lebar>0)
        $angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
    else
        $angka = $awalan.$nomor;
    return $angka;
}	
 if (isset($_POST['submit'])){
	 
//tangkap data dari form
$kode=$_POST['kode'];
$ktp = $_POST['no_ktp'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp']; 
$tgl_pinjam = $_POST['tgl_pinjam'];
$jm_pinjam = $_POST['jm_pinjam'];
$tgl_kembali_rencana = $_POST['tgl_kembali_rencana'];
$jm_kembali_rencana = $_POST['jm_kembali_rencana'];
$tgl_pesan = date ("y-m-d"); 
 
//simpan data ke database
$query = mysql_query("insert into pelanggan values('$ktp','$nama', '$alamat', '$telp')") or die(mysql_error());

$query2= mysql_query("insert into transaksi_sewa values('$kode','$ktp','','$plat','','$tgl_pesan','$tgl_pinjam','$jm_pinjam','$tgl_kembali_rencana','$jm_kembali_rencana','',
'','',0,0,'0','0','','','','0','0','0','0')") or die (mysql_error());  
if ($query) {
	 echo "<script>window.location='index.php';</script>";
	 
}
 
 }
 ?>




   		<div id="sidebar" class="float_l">           
            </div>
        </div>     
        
        <div id="content" class="float_r"> <div class="cleaner"></div>
        	<h5>Form Sewa Mobil</h5>
            <form method="post">
            <div class="content_half float_l checkout">
            <input name="kode"  type="hidden" value="<?=autonumber("transaksi_sewa","NOTRANSAKSI",3,"TR")?>">
				<input type="text"  name="no_plat" hidden="" style="width:300px;"  />
                No. KTP:                				
                <input type="text"  name="no_ktp" style="width:300px;"  />
                Nama:
                <input type="text"  name="nama" style="width:300px;"  />
                Alamat:
                <input type="text"  name="alamat" style="width:300px;"  />
                Telepon:
                <input type="text"  name="telp" style="width:300px;"  />
              Tanggal Pinjam
                <input type="date"  name="tgl_pinjam" style="width:300px;"  />
                Jam Pinjam:
                <input type="time"  name="jm_pinjam" style="width:300px;"  />
                Tanggal Kembali Rencana:
                <input type="date"  name="tgl_kembali_rencana" style="width:300px;"  />
                 Jam Kembali Rencana:
                <input type="time"  name="jm_kembali_rencana" style="width:300px;"  />              
                 <input type="text"  name="tgl_pesan" hidden="" style="width:300px;"  />
  
            <a onclick="return confirm('Tunggu verifikasi selanjutnya melalui SMS.')">    <input type="submit" value="Pesan Sekarang" name="submit" class="submit_btn float_l" /> </a>
                        </form>
          </div>
