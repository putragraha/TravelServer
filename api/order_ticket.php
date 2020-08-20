<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "INSERT INTO `pemesanantiket` (kode_pemesanan, user_id, armada_id, kursi_pesanan, catatan, latitude, longitude)
VALUES (
    \"" . round(microtime(true) * 1000) . "\", 
    $loginRequest->userId, 
    $loginRequest->armadaId, 
    $loginRequest->seatBooked, 
    \"$loginRequest->note\", 
    $loginRequest->latitude, 
    $loginRequest->longitude
)";
$insertResult = mysqli_query($konek, $query);

$updateArmadaQuery = "UPDATE `armada` 
    SET `kursi_tersedia`=`kursi_tersedia` - $loginRequest->seatBooked
    WHERE `id`=\"" . $loginRequest->armadaId . "\"
    AND `kursi_tersedia` > 0";
$updateArmadaResult = mysqli_query($konek, $updateArmadaQuery);

echo json_encode(array('success'=>$insertResult > 0 && $updateArmadaResult > 0)); 

$konek->close();
?>