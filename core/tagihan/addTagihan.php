<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

    $periode            = $_POST['periode'];
    $mata_uang          = $_POST['mata_uang'];
    $jumlah_tagihan     = $_POST['jumlah_tagihan'];
    $belum_bayar        = $_POST['belum_bayar'];
    $status_pembayaran  = $_POST['status_pembayaran'];
    $lokasi_pembayaran  = $_POST['lokasi_pembayaran'];
    $cicilan            = $_POST['cicilan'];
    $tanggal            = $_POST['tanggal'];
    $jam                = $_POST['jam'];

    $result = $conn->addTagihan($periode,$mata_uang,$jumlah_tagihan,$belum_bayar,$status_pembayaran,$lokasi_pembayaran,$cicilan,$tanggal,$jam);

    echo "success";

}

?>