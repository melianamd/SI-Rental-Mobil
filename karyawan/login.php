<?php
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) {
if (empty($_POST['nama']) || empty($_POST['nik'])) {
$error = "Username or Password is invalid";
}
else
{
// Variabel username dan password
$nm_krywn=$_POST['nama'];
$nik=$_POST['nik'];
// Membangun koneksi ke database
$connection = mysql_connect("localhost", "root", "");
// Mencegah MySQL injection
$nm_krywn = stripslashes($nm_krywn);
$nik = stripslashes($nik);
$nm_krywn= mysql_real_escape_string($nm_krywn);
$nik = mysql_real_escape_string($nik);
// Seleksi Database
$db = mysql_select_db("rpl2016smk6_26", $connection);

$query = mysql_query("select * from karyawan where NMKARYAWAN='$nm_krywn' AND NIK='$nik'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$nm_krywn;
$_SESSION['NIK'] = $nik; // Membuat Sesi/session
header("location: profile.php?page=home"); // Mengarahkan ke halaman profil
} else {
$error = "Username atau Password belum terdaftar";
}
mysql_close($connection); // Menutup koneksi
}
}
?>