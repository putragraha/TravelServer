<?php
session_start();
// apabila ditekan tombol logout, session username & level akan hilang 
unset($_SESSION['email']);
unset($_SESSION['password']);
header("location:login.php");
?>