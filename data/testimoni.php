<?php
include "db/koneksi.php";
 if (isset($_POST['submit'])){
	 
//tangkap data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$kota = $_POST['kota'];
$testimoni = $_POST['testimoni'];
 
//simpan data ke database
$query = mysql_query("insert into testimoni (NAMA,EMAIL,KOTA,TESTIMONI) values('$nama','$email', '$kota', '$testimoni')") or die(mysql_error());
 
if ($query) {
	 echo "<script>window.location='?page=testimoni';</script>";
}
 
 }
 ?>


<h3>Testimoni</h3>
<div id="testimoni">
<?php 
include "db/koneksi.php";

$sql = mysql_query ("SELECT NAMA, TESTIMONI, KOTA FROM testimoni");
while ($baris=mysql_fetch_assoc($sql)){
	echo "<pre>";
echo $baris['NAMA']."-". $baris['KOTA']."<br/>". $baris['TESTIMONI'];
echo "</pre>";
}
?>         

</div>
<br/>
                
                <div id="contact_form">
                   <form method="post">
                        
                        <label for="author">Nama:</label> <input type="text" id="author" name="nama" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
                        
						<label for="subject">Kota:</label> <input type="text" name="kota" id="subject" class="input_field" />

						<div class="cleaner h10"></div>
        
                        <label for="text">Testimoni:</label> <textarea id="text" name="testimoni" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
                        
            	</form>
                </div>
           