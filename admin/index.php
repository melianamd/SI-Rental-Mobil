<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/animate.delay.css">
<meta charset="UTF-8">

<title>Login Page</title>
<style>
body {
    background: url('images/images.jpg') no-repeat fixed center center;
	
    background-size: cover;
    font-family: Montserrat;
}

.logo {
    width: 213px;
    height: 36px;
	font-size:20px;
    background:  no-repeat;
    margin: 30px auto;
}

.login-block {
    width: 320px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #ff656c;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block input#username {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.login-block button {
    width: 100%;
    height: 40px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #ff7b81;
}

</style>
</head>

<body>

<div class="logo"></div>
<div class="login-block">
   
    <h1 class="animated animate1 bounceInDown" style=" text-transform:uppercase;">LOGIN ADMIN</h1>
    <form action="?page=login&aksi=login" method="post">
    
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
    
    
    
    
    <input class="animated animate3 bounceInLeft" type="text" name="username" placeholder="Username" required id="username"/>
    <input class="animated animate5 bounceInRight" type="password" name="password" placeholder="Password" id="password"/>
    <button class="animated animate7 bounceInUp" type="submit" name="submit" id="submit">Login</button></form>
</div>
</body>

</html>