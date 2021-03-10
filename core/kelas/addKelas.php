<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

    $nama_kelas = $_POST['nama_kelas'];
    $kode_kelas = $_POST['kode_kelas'];
    $tanggal    = $_POST['tanggal'];

    $result = $conn->addKelas($nama_kelas, $kode_kelas, $tanggal);

    echo "success";
    
    // echo '<script>alert("Berhasil menambah kelas");window.location="tambah_kelas.php";</script>';

}

?>