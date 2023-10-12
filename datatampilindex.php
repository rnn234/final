<?php
require 'function.php';

    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT * from treport inner join tnotifikasi on treport.idnotif = tnotifikasi.idnotif inner join ruangan on treport.id_ruang = ruangan.id_ruang inner join jenis on treport.id_masalah = jenis.id_masalah WHERE date(tanggal) = CURDATE()");
    
    $waktu = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $waktu[] = $row;
}

$response = array("waktu" => $waktu);
echo json_encode($response);

?>