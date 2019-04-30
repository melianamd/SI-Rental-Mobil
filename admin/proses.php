 <?php 
session_start();
include "db/koneksi.php";
if(isset($_GET['aksi']) && $_GET['aksi']=='login'){

$user1 = $_POST['username'];
$pass1 =$_POST['password'];


$login1=mysql_query("SELECT * FROM login WHERE USERNAME='$user1' AND PASSWORD='$pass1'");
$ketemu1=mysql_num_rows($login1);
$r=mysql_fetch_array($login1);
if ($ketemu1 > 0){
  //session_start();
  $_SESSION['USERNAME'] = $r['USERNAME'];

 $_SESSION['level'] = "Admin";
  ?>
      <?php
echo "<meta http-equiv='refresh' content='0; url=profile.php?page=home'>";
}
else{
?>
      
<script>alert("Username or Password Yang Anda Masukkan Salah");</script>
<?php
  echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
}

?>