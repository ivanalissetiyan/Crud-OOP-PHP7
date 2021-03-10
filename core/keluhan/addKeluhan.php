<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

    $references         = $_POST['references'];
    $date_create        = $_POST['date_create'];
    $service_number     = $_POST['service_number'];
    $subject            = $_POST['subject'];
    $nama               = $_POST['nama'];
    $contact_person     = $_POST['contact_person'];
    $no_pengaduan       = $_POST['no_pengaduan'];

    $result = $conn->addKeluhan($references,$date_create,$service_number,$subject,$nama,$contact_person,$no_pengaduan);
    echo "success";

}

?>