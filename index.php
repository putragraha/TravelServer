<?php session_start();
require_once __DIR__ . '/config/koneksi.php';
//Cek Session
if (empty($_SESSION['email'])) {
    header('location:login.php');
} 
else
{
    header('location:admin.php'); 
    }   
?>  
