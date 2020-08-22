<?php 
require '../config/koneksi.php';

const PENDING = "PENDING";

$request = json_decode(file_get_contents('php://input'));
$query = "INSERT INTO `pemesanantiket` (kode_pemesanan, user_id, armada_id, kursi_pesanan, catatan, latitude, longitude, status)
VALUES (
    \"" . round(microtime(true) * 1000) . "\", 
    $request->userId, 
    $request->armadaId, 
    $request->seatBooked, 
    \"$request->note\", 
    $request->latitude, 
    $request->longitude,
    \"" . PENDING . "\"
)";
$insertResult = mysqli_query($konek, $query);

$updateArmadaQuery = "UPDATE `armada` 
    SET `kursi_tersedia`=`kursi_tersedia` - $request->seatBooked
    WHERE `id`=\"" . $request->armadaId . "\"
    AND `kursi_tersedia` > 0";
$updateArmadaResult = mysqli_query($konek, $updateArmadaQuery);

echo json_encode(array('success'=>$insertResult > 0 && $updateArmadaResult > 0)); 

$konek->close();
?>