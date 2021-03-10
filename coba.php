<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
//include('header.php');

$userYangLogin = $_SESSION['username'];

?>