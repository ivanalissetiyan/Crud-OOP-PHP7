<?php 

require_once('../fungsi/fungsi_ukm.php');

$conn =  new jalankanFungsi();

if(isset($_POST['id_user'])){

	$id = $_POST['id_user'];
	$result = $conn->deleteUser($id);

}

?>