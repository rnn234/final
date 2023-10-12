<?php

session_start(); 

require 'rl.php';
 if (isset($_SESSION['usera'])) {
  header("Location:dashboard.php");
}
if (isset($_SESSION['useru'])) {
    header("Location:indexx.php");
  }
  
if (!isset($_SESSION['usernew'])) {
    header("Location:login.php");
}
if (isset($_POST['submit'])) {
    profile($_POST); // Memanggil fungsi regis() untuk memproses pendaftaran
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
    <title>Almost There!</title>
</head>
<body>
    <div class="form-container describe-container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label>choose what describes yourself</label>
                <div class="describe" onclick="selectRadioButton('mahasiswa', this)">
                    <label for="mahasiswa">👨‍🎓 Mahasiswa</label>
                    <div class="radio-btn">
                        <input type="radio" name="status" id="mahasiswa" value="mahasiswa" required>
                    </div>
                </div>
                <div class="describe" onclick="selectRadioButton('tendik', this)">
                    <label for="tendik">👨‍💼Tenaga Pendidikan</label>
                    <div class="radio-btn">
                        <input type="radio" name="status" id="tendik" value="tendik" required>
                    </div>
                </div>
                <div class="describe" onclick="selectRadioButton('dosen', this)">
                    <label for="dosen">👨‍🏫Dosen</label>
                    <div class="radio-btn">
                        <input type="radio" name="status" id="dosen" value="dosen" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" value="submit" name="submit">Finish!</button>
            </div>
        </form>
    </div>
    



    <script>
let selectedDescribe = null;

function selectRadioButton(id, describeElement) {
    const radioButton = document.getElementById(id);
    if (radioButton) {
        if (selectedDescribe) {
            selectedDescribe.classList.remove('checked');
        }
        selectedDescribe = describeElement;
        radioButton.click();
        describeElement.classList.add('checked');
        
    }
}
    </script>
    
    
    

</body>
</html>
