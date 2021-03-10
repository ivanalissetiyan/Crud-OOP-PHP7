<?php 

require_once('../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $c_password = $_POST['c_password'];
    $email = $_POST['email'];
    $level = $_POST['level'];

    $result = $conn->addUser($username, $password, $email, $level);
    
    echo '<script>alert("Berhasil menambah user baru");window.location="tambah_user.php";</script>';

}

?>