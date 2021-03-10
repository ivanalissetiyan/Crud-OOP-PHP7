<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

	$id = trim($_POST['id']);
	$no_internet    = $_POST['no_internet'];
    $no_telp        = $_POST['no_telp'];
    $tgl_pasang     = $_POST['tgl_pasang'];
    $segment        = $_POST['segment'];
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $kelurahan      = $_POST['kel'];
    $kota           = $_POST['kota'];
    $contact        = $_POST['contact_person'];
	$email          = $_POST['email']; 
		
	$result = $conn->updatePelanggan($id,$no_internet,$no_telp,$tgl_pasang,$segment,$nama,$alamat,$kelurahan,$kota,$contact,$email);

	echo "success";

}

?>