<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

    $nama_kurikulum = $_POST['nama_kurikulum'];
    $semester    = $_POST['semester'];
    $tanggal      = $_POST['tanggal'];

    $result = $conn->addDataKurikulum('data_kurikulum', $nama_kurikulum, $semester, $tanggal);

    echo "success";
    
    // echo '<script>alert("Berhasil menambah kelas");window.location="tambah_kelas.php";</script>';

}

?>