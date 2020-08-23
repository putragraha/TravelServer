<?php 
require '../config/koneksi.php';

$request = json_decode(file_get_contents('php://input'));
$query = "UPDATE `pemesanantiket` 
    SET `latitude`=$request->latitude, 
    `longitude`=$request->longitude,
    `catatan`=\"$request->note\"
    WHERE `kode_pemesanan`=\"" . $request->orderCode . "\"";
$result = mysqli_query($konek, $query);

echo json_encode(array('success'=>$result > 0)); 

$konek->close();
?>