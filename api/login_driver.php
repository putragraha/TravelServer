<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "SELECT * FROM `driver` WHERE `email`=\"" . $loginRequest->email . "\" AND `password`=\"" . $loginRequest->password ."\"";
$result = mysqli_query($konek, $query);

echo json_encode(array('success'=>$result->num_rows > 0)); 

$konek->close();
?>