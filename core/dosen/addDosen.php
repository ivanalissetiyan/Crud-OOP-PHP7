<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

    $nama_dosen = $_POST['nama_dosen'];
    $lulusan    = $_POST['lulusan'];
    $tahun      = $_POST['tahun'];

    $result = $conn->addData('data_dosen', $nama_dosen, $lulusan, $tahun);

    echo "success";
    
    // echo '<script>alert("Berhasil menambah kelas");window.location="tambah_kelas.php";</script>';

}

?>