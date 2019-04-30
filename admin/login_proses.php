<?php
session_start();
include('db/koneksi.php');
if(isset($_GET['aksi']) && $_GET['aksi']=='login'){
	
$user1 = $_POST['username'];
$pass1 = $_POST['password'];

$login1=mysql_query("SELECT * FROM login WHERE USERNAME='$user1' AND PASSWORD='$pass1'");
$ketemu1=mysql_num_rows($login1);
$r=mysql_fetch_array($login1);
if ($ketemu1 > 0){
  session_start();
  $_SESSION['username'] = $r['username'];

 $_SESSION['level'] = "Admin";
  ?>
  <?php
echo "<meta http-equiv='refresh' content='0; url=profile.php?page=home'>";
}
else{
?>
<?php
$cek1=mysql_fetch_array($guru);
$cari=mysql_num_rows($guru);
if ($cari > 0){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}else{
	die ("login eror");
	
?>

<script>alert("Uppzzz... username atau password salah...!!!");</script>
<?php
}
}
}
?>