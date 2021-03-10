<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

	$id = trim($_POST['id']);
    $no_internet         = $_POST['no_internet'];
    $no_telp             = $_POST['no_telp'];
    $nama                = $_POST['nama'];
    $alamat              = $_POST['alamat'];
    $status              = $_POST['status'];
    $status_port         = $_POST['status_port'];
    $status_bayar        = $_POST['status_bayar'];

    $result = $conn->updateStatus($id,$no_internet,$no_telp,$nama,$alamat,$status,$status_port,$status_bayar);

    var_dump($result);
    
	echo "success";

}

?>