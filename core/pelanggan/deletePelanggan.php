<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn =  new jalankanFungsi();

if(isset($_POST['id'])){

    $table = "tb_data_pelanggan";
	$id = $_POST['id'];
	$result = $conn->delete($id, $table);

    echo "success";
}

?>