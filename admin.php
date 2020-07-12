<?php error_reporting(0);
session_start();
require 'config/koneksi.php';
require 'config/function.php';
//Cek Session
if (empty($_SESSION['email'])) {
    header('location:403.php');
} else{
    //Mendatpakan nama file
	$currentFile = $_SERVER["REQUEST_URI"];
	$parts = Explode('/', $currentFile);
    $currentFile = $parts[count($parts) - 1]; 
    //Session Nama User
    $namaku = $_SESSION['nama'];
    $emailku = $_SESSION['email'];
    $fotoku = $_SESSION['foto'];
    $idku = $_SESSION['id'];
	//Load File template
    require 'template/header.php';
    require 'template/sidebar.php';
    require 'config/paging.php';
    require 'template/footer.php';
}
?>