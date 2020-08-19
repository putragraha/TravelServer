<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "INSERT INTO `armada` (driver_id, waktu_keberangkatan, harga_tiket, kursi_tersedia, catatan)
VALUES (
    \"$loginRequest->driverId\", 
    \"$loginRequest->datetime\", 
    \"$loginRequest->price\", 
    \"$loginRequest->seatAmount\", 
    \"$loginRequest->note\"
)";
$result = mysqli_query($konek, $query);

echo json_encode(array('success'=>$result > 0)); 

$konek->close();
?>