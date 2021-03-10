<?php 

require_once('../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

	$id = trim($_POST['id']);
	$username = trim($_POST['username']);
	$level = trim($_POST['level']);

	$result = $conn->updateUser($username, $level, $id);

}

?>