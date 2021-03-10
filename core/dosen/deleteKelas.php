<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn =  new jalankanFungsi();

if(isset($_POST['id'])){

    $table = "data_kelas";
	$id = $_POST['id'];
	$result = $conn->delete($id, $table);

    echo "success";
}

?>