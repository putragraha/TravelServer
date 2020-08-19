<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "UPDATE `driver` 
    SET `nama_driver`=\"" . $loginRequest->name . "\", 
    `no_handphone`=\"" . $loginRequest->phoneNumber . "\" 
    WHERE `id`=\"" . $loginRequest->id . "\"";
$result = mysqli_query($konek, $query);

echo json_encode(array('success'=>$result > 0)); 

$konek->close();
?>