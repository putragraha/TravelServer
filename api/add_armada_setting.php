<?php 
require '../config/koneksi.php';

$request = json_decode(file_get_contents('php://input'));
$query = "INSERT INTO `armada` (driver_id, waktu_keberangkatan, kelas, harga_tiket, 
jumlah_kursi, kursi_tersedia, kota_asal, kota_tujuan, catatan)
VALUES (
    \"$request->driverId\", 
    \"$request->datetime\", 
    \"$request->armadaClass\", 
    \"$request->price\", 
    \"$request->seatAmount\", 
    \"$request->seatAmount\", 
    \"$request->departure\", 
    \"$request->arrival\", 
    \"$request->note\"
)";
$result = mysqli_query($konek, $query);

echo json_encode(array('success'=>$result > 0)); 

$konek->close();
?>