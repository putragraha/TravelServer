<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "UPDATE `pemesanantiket` 
    SET `latitude`=$loginRequest->latitude, 
    `longitude`=$loginRequest->longitude
    WHERE `kode_pemesanan`=\"" . $loginRequest->orderCode . "\"";
$result = mysqli_query($konek, $query);

echo json_encode(array('success'=>$result > 0)); 

$konek->close();
?>