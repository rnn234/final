<?php 
require 'rl.php';
if (isset($_SESSION['usera'])) {
    header("Location:dashboard.php");
    
} else if (isset($_SESSION['useru'])) {
    header("Location:index.php");
}
else if (isset($_SESSION['usernew'])) {
    header("Location:profile.php");
}
if (isset($_POST['submit'])) {
    regis($_POST); // Memanggil fungsi regis() untuk memproses pendaftaran
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
    <title>Register!</title>
</head>
<body>
<div class="card">
    <form action="" method="POST">
        <div class="logo">
            <img src="asset/logo-ui.png" alt="">
            <span>Fakultas <span class="psiko">Psikologi</span></span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="min-6 karakter" minlength="6" required>
        </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" name="cpassword" placeholder="Verifikasi Password" minlength="6" required>
        </div>
        <div class="form-group">
            <button type="submit" value="submit" name="submit">Daftar</button>
            <span>have account?<a href="login.php">login</a></span>
        </div>
    </form>
</div>

<script src="style/script.js"></script>
</body>
</html>