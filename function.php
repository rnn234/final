<?php
date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect("localhost","root","","ticketing");

function query($request) {
    global $conn;

    $req = mysqli_query($conn,$request);

    $res = [];

    foreach($req as $r){
        $res[] = $r;
    }

    return $res;
}

// function signUp($data){
//     global $db;
//     $email = $data['email'];
//     $nama =$data['nama'];
//     $password =$data['password'];
//     $sql = "INSERT INTO akun values('', '$nama', '$email', '$password', '1')";
//     mysqli_query($db, $sql);
//     return mysqli_affected_rows($db);
// }

// function regis($data){
//     global $conn;

//     $nama = $data['nama'];
//     $email = $data['email'];
//     $password = $data['password'];
//     $status = $data['status'];

//     mysqli_query($conn,"INSERT INTO akun VALUES (NULL, '$nama', '$email', '$password', '$status')");
//     return mysqli_affected_rows($conn);
// }


function inputreport($data){
    global $conn;
    $email = $data['email'];
    $pelapor = $data['pelapor'];
    $nama = $data['nama'];   
    $idruang = $data['id_ruang'];
    $id_masalah = $data['id_masalah'];
    $deskripsi = $data['deskripsi'];
    $waktu = new DateTime();
    $format_waktu = $waktu->format('Y-m-d H:i:s');
    $fwaktu = $waktu->format('His');
    
    $no = substr(uniqid(), 10, 5);
    $id_report = $fwaktu . "-" . $idruang . "-" . $no;
    // $timestamp = date("Y-m-d H:i:s");
    // $waktu = new DateTime($timestamp);

    mysqli_query($conn,"INSERT INTO `treport`( `id_report`, `email`, `pelapor`,  `nama`, `id_ruang`, `id_masalah`,`deskripsi`, `idnotif`, `tenagakerja`, `tanggal`) VALUES ('$id_report','$email','$pelapor','$nama','$idruang','$id_masalah','$deskripsi','1', '-', '$format_waktu')");
    
}

function no_resubmit(){
    ?>

        <script>
                if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                    }
        </script>

    <?php 
}
