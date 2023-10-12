<?php 

 
session_start(); 

require 'rl.php';
 
error_reporting(0);
 
if (isset($_SESSION['usera'])) {
    header("Location:dashboard.php");
    
} else if (isset($_SESSION['useru'])) {
    header("Location:index.php");
}
else if (isset($_SESSION['usernew'])) {
    header("Location:profile.php");
}

if (isset($_POST['submit'])) {
    login($_POST); // Memanggil fungsi regis() untuk memproses pendaftaran
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./asset/logo-neo1.png" type="image/x-icon">
    <link rel="stylesheet" href="./style/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Login!</title>
</head>
<body>
    <div class="alert alert-warning" role="alert">
    <?php echo $_SESSION['error']?>
    </div>
<div class="card">
    <form action="" method="POST">
        <div class="logo">
            <img src="asset/logo-ui.png" alt="">
            <span>Fakultas <span class="psiko">Psikologi</span></span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <a href="#">Forget your password?</a>
        </div>
        <div class="form-group">
        <button type="submit" value="submit" name="submit">Login!</button>
            <span>don't have account?<a href="register.php">register</a></span>
        </div>
    </form>
</div>

<script src="style/script.js"></script>
</body>
</html>