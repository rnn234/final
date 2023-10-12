<?php

session_start(); 

require_once 'function.php';
require_once 'rl.php';
if(isset($_SESSION['usera'])){
    header('Location: dashboard.php');
} 

if(isset($_POST['submit'])){
    if(inputreport($_POST) > 0){
      
    }
    echo "<script>alert('berhasil melaporkan keluhan!');window.location='index.php'</script>";
}
if(isset($_SESSION['useru'])){
    $userId = $_SESSION['usere']; 
    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT * FROM treport inner join akun on treport.email = akun.email inner join tnotifikasi on treport.idnotif = tnotifikasi.idnotif inner join ruangan on treport.id_ruang = ruangan.id_ruang inner join jenis on treport.id_masalah = jenis.id_masalah where treport.email = '$userId'");
    $data = mysqli_fetch_assoc($sql);
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="asset/logo-ui.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="js/tampilindex.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#autocomplete").autocomplete({
                source: "fetch.php",
                select: function(event, ui) {
                    // Set the selected item's ID as the value of the hidden input field
                    $("#selectedItemId").val(ui.item.id);
                }
            });
        });
    </script>
    <title>Laporkan Masalah & Inventory Perangkat Fakultas</title>
    
</head>
<body>
    <div class="container-header">
        <div class="navbar">
            <div class="logo">
                <div class="logo-image"><img src="asset/logo-ui.png" alt=""></div>
                <p>|</p>
                <div class="logo-text">Fakultas Psikologi</div>
            </div>
            <?php if(!isset($_SESSION['useru'])): ?>
            <div class="navlink">
                <a href="login.php">Login</a>
            </div>
            <?php elseif(isset($_SESSION['useru'])): ?>
                <div class="navlink">
                    <a href="logout.php" id="logout"><i class='bx bx-log-out'></i>Log-Out</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-header"><h1>Laporkan Kendala & Inventory Perangkat Fakultas</h1></div>
    </div>
    <div class="garis">
        <p class="opacity">.</p>
        <div class="card">
            <?php if(isset($_SESSION['useru'])): ?>
                <button id="report-popup">
                    <i class='bx bxs-message-detail'></i>
                    <p>Lapor Kendala</p>
                </button>
                <a href="#device-section" >
                    <i class="ph-fill ph-desktop-tower"></i>
                    <p>Inventory Fakultas</p>
                </a>
                <?php if(isset($data['idnotif']) == '1'): ?>
                    <button id="ticket-popup">
                        <i class="ph-fill ph-ticket"></i>
                        <p>Tiket Laporan Anda</p>
                    </button>
                <?php else: ?>

                <?php endif; ?>
            <?php elseif(!isset($_SESSION['useru'])): ?>
                <button id="laporkan">
                    <i class='bx bxs-message-detail'></i>
                    <p>Lapor Kendala</p>
                    <script>
                        document.getElementById("laporkan").addEventListener("click", function(event) {
                            event.preventDefault();  // Mencegah tautan dari mengarahkan pengguna ke halaman lain

                            // Cek apakah pengguna sudah login atau belum
                            // Di sini Anda harus memiliki kode untuk memeriksa status login pengguna
                            var userLoggedIn = false;  // Ganti dengan logika pemeriksaan login sesuai dengan implementasi Anda

                            if (userLoggedIn) {
                                // Jika pengguna sudah login, lakukan tindakan yang sesuai, misalnya munculkan formulir pelaporan
                                alert("Anda akan diarahkan ke halaman pelaporan kendala.");
                                // Lakukan lebih banyak tindakan yang diperlukan di sini
                            } else {
                                // Jika pengguna belum login, tampilkan pesan peringatan dan arahkan ke halaman login
                                alert("Anda harus login terlebih dahulu.");
                                window.location.href = "login.php";
                            }
                        });
                    </script>
                </button>
                <a href="#device-section" >
                    <i class="ph-fill ph-desktop-tower"></i>
                    <p>Inventory Fakultas</p>
                </a>
                
        <?php endif; ?> 
        </div>     
    </div>
    <div class="container-content">
        <div class="thumbnail">
            <div class="thumbnail-img">
                <img src="asset/thumbnail1.png" alt="">
            </div>
            <div class="thumbnail-text">
                <h2>Punya kendala Pada Device Kamu? Mau Ngecek Spesifikasi Perangkat Fakultas?</h2>
                <p>Sekarang kamu bisa melaporkan kendala perangkat kamu dan akan langsung terhubung dengan Tim IT kami. dan juga kamu bisa mengecek spesifikasi perangkat di fakultasmu hanya disini.</p>
                <a href="#about">Selengkapnya..</a>
            </div>
        </div>
        <div class="antrian" >
            <div class="table-container">
                <h1>Laporan Masuk Hari Ini  <span class="badge badge-light" id="waktu"> </span></h1>
                <table id="notification-table">
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div class="container-image">
                <img src="asset/thumbnail2.png" alt="">
            </div>
        </div>
        <div class="device-card" id="device-section">
            <div class="container-image">
                <p>Cek inventory dan spesifikasi device fakultas kamu hanya disini</p>
                <span>Cek Spesifikasi Perangkat Fakultas</span>
                <img src="asset/thumbnail3.png" alt="">
            </div>
            <div class="device-grid">
                <button type="submit">
                    <div class="inner-button">
                        <img src="asset/pc.png" alt="">
                        <span class="text-device">PC</span>
                    </div>
                </button>
                <button type="submit">
                    <div class="inner-button">
                        <img src="asset/laptop.png" alt="">
                        <span class="text-device">laptop</span>
                    </div>
                </button>
                <button type="submit">
                    <div class="inner-button">
                        <img src="asset/printer.png" alt="">
                        <span class="text-device">printer</span>
                    </div>
                </button>
                <button type="submit">
                    <div class="inner-button">
                        <img src="asset/cctv.png" alt="">
                        <span class="text-device">cctv</span>
                    </div>
                </button>   
                <button type="submit">
                    <div class="inner-button">
                        <img src="asset/projector.png" alt="">
                        <span class="text-device">projector</span>
                    </div>
                </button>   
                <button type="submit">
                    <div class="inner-button">
                        <img src="asset/wifi.png" alt="">
                        <span class="text-device">WIFI</span>
                    </div>
                </button>
                <button type="submit">
                    <div class="inner-button">
                        <img src="asset/desktop.png" alt="">
                        <span class="text-device">All in 1 PC</span>
                    </div>
                </button>  
            </div>
        </div>
    </div>

<div class="report-card-popup">
    <div class="report-card">
        <form action="" method="POST">
            <div class="input-group">
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['usere']; ?>" hidden>
            </div>
            <div class="input-group">
                <input type="text" id="pelapor" name="pelapor" value="<?php echo $_SESSION['useru']; ?>" hidden>
            </div>
            <div class="input-group">
                <input type="text" id="nama" name="nama" value="<?php echo $_SESSION['user1']; ?>" required hidden>
            </div>

            <div class="top-popup">
                <span>Lengkapi form masalah!</span>
                <button class="btn-close" id="close-report-popup">&times;</button>
            </div>
            
            <div class="form-group">
                <label for="id_ruang">pilih ruangan</label>
                <input type="text" name="" id="autocomplete">
                <input type="hidden" name="id_ruang" id="selectedItemId" value=""> 
            </div>
            <select name="id_masalah" id="id_masalah" required>
                <option disabled selected value>silahkan pilih jenis masalah anda</option>
                <?php 
                $id_masalah = mysqli_query($conn, "SELECT * from jenis");
                while($id = mysqli_fetch_array($id_masalah)){
                ?>
                <option value="<?php echo $id['id_masalah'];?>"><?php echo $id['nama_masalah']; ?> </option>
                <?php
                }
                ?>
                
            </select>
            <label for="">Masukan diskripsi masalah</label>
            <textarea name="deskripsi" id="" cols="30" rows="10"></textarea>
            
            <div class="btn-card-popup">
                <button type="submit" name="submit" value="submit">Laporkan❗</button>
            </div>

        </form>
    </div>
</div>



<div class="ticket-card-popup">
    <?php foreach($sql as $d):?>
        <div class="ticket-card">
            <div class="top-popup">
                <button class="btn-close" id="close-ticket-popup">&times;</button>
            </div>
            <div class="top-ticket">
                <span class="id-ticket"><?php echo $d['id_report'] ?></span>
                <span class="date-ticket"><?php echo $d['tanggal'] ?></span>
            </div>
            <div class="mid-ticket">
                <div class="left-ticket">
                    <span>Nama: <p><?php echo $d['nama'] ?></p></span>
                    <span>Role: <p><?php echo $d['pelapor'] ?></p></span>
                    <span>Ruangan: <p><?php echo $d['nama_ruangan'] ?></p></span>
                    <span>dikerjakan oleh: <p><?php echo $d['tenagakerja'] ?></p></span>
                    <span>pengerjaan: <p><?php echo $d['status'] ?></p></span>
                </div>
                <div class="right-ticket">
                    <div class="line-cut"></div>
                    <div>
                        <span class="problem-ticket"><?php echo $d['nama_masalah'] ?></span>
                        <div class="desc-problem"><?php echo $d['deskripsi'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>


<footer>
    <div class="footer-top">
        <div class="logo-footer">
            <img src="asset/logo-ui.png" alt="">
            <p>|</p>
            <span>Fakultas <span class="psiko">Psikologi</span></span>
        </div>
        <div class="content-footer">
            <div class="contact">
                <h4>Contact</h4>
                <span><a href="#"><i class='bx bxl-whatsapp' ></i>Whatsapp</a></span>
                <span><a href="#"><i class='bx bxs-phone-call' ></i>Phone Number</a></span>
            </div>
            <div class="social-media">
                <h4>Social Media</h4>
                <span><a href="#"><i class='bx bxl-instagram-alt' ></i>Instagram</a></span>
                <span><a href="#"><i class='bx bxl-twitter'></i>X</a></span>
            </div>
        </div>
    </div>
    <div class="footer-bot">
        <div class="about" id="about">
            <h4>About</h4>
            <span>Web ini hadir untuk mempermudah para Tenaga pendidik, Mahasiswa, Dll. dalam membantu pelaporan masalah pada perangkatnya dengan praktis dan mudah. Dan terdapat semua data data perangkat fakultas berupa spesifikasi, lokasi, dan data lainnya yang bisa diakses oleh siapapun. <p>Gunakanlah dengan baik dan bijak sesuai dengan kebutuhannya.</p> Atas suportnya Terimakasih </span>
        </div>
    </div>
</footer>
<div class="copyright">
    <p>&copy; 2023 Fakultas Psikologi Universitas Indonesia</p>
</div>
    </div>

<!-- <script src="style/script.js"></script> -->
<script>
    const Report = document.getElementById("report-popup");
    const Ticket = document.getElementById("ticket-popup");
    const ticketPopup = document.querySelector(".ticket-card-popup");
    const reportPopup = document.querySelector(".report-card-popup");
    const closeBtn1 = document.getElementById("close-report-popup");
    const closeBtn2 = document.getElementById("close-ticket-popup");

    Report.addEventListener("click", () => {
    reportPopup.classList.add("active");
    });

    Ticket.addEventListener("click", () => {
    ticketPopup.classList.add("active");
    });


    closeBtn1.addEventListener("click", (event) => {
    event.preventDefault(); // Mencegah default behavior
    reportPopup.classList.remove("active");
    });

    closeBtn2.addEventListener("click", (event) => {
    event.preventDefault(); // Mencegah default behavior
    ticketPopup.classList.remove("active");
    });

</script>

</body>
</html>