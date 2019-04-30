<?php
include "db/koneksi.php";
 if (isset($_POST['submit'])){
	 
//tangkap data dari form
$ktp = $_POST['no_ktp'];
$pass = $_POST['password'];
 
//simpan data ke database
$query = mysql_query("insert into  (NOKTP,NOPLAT,TGLPESAN,TGLKEMBALIRENCANA) values('$ktp','$nama', '$almt', '$telp','$pm','$tgl_pesan','$tgl_kembali')") or die(mysql_error());
 
if ($query) {
	 echo "<script>window.location='?page=order';</script>";
}
 
 }
 ?>




   		<div id="sidebar" class="float_l">           
            </div>
        </div>     
        
        <div id="content" class="float_r"> <div class="cleaner"></div>
        	<h5>Daftar Pelanggan</h5>
            <form method="post" action="Login/insert.php">
            <div class="content_half float_l checkout">
				No. KTP:                				
                <input type="text"  name="no_ktp" style="width:300px;"  />
                Nama:                				
                <input type="text"  name="nama" style="width:300px;"  />
                Alamat:                				
                <input type="text"  name="alamat" style="width:300px;"  />
                Telepon:                				
                <input type="text"  name="telp" style="width:300px;"  />
                Password:
                <input type="text"  name="pass" style="width:300px;"  />
     
                <input type="submit" value="Daftar" name="submit" class="submit_btn float_l" /> 
						
                        </form>
          </div>
