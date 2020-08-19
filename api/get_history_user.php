<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "SELECT 
    `pemesanantiket`.`kode_pemesanan` as `kode_pemesanan`,
    `driver`.`tim_travel` as `tim_travel`,
    `armada`.`kelas` as `kelas`,
    `driver`.`nama_driver` as `nama_driver`,
    `driver`.`no_handphone` as `no_handphone`,
    `pemesanantiket`.`kursi_pesanan` as `kursi_pesanan`,
    `armada`.`harga_tiket` as `harga_tiket`,
    `armada`.`waktu_keberangkatan` as `waktu_keberangkatan`,
    `pemesanantiket`.`longitude` as `longitude`,
    `pemesanantiket`.`latitude` as `latitude`,
    `pemesanantiket`.`catatan` as `catatan`
    FROM `pemesanantiket` 
    INNER JOIN `armada` ON `pemesanantiket`.`armada_id` = `armada`.`id`
    INNER JOIN `driver` ON `armada`.`driver_id` = `driver`.`id`
    INNER JOIN `user` ON `pemesanantiket`.`user_id` = `user`.`id`
    WHERE `user`.`id` = $loginRequest->userId";
$result = mysqli_query($konek, $query);
$resultArray = array();

if ($result->num_rows > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		array_push($resultArray, array(
            'orderCode'=>$row['kode_pemesanan'],
            'group'=>$row['tim_travel'],
            'armadaClass'=>$row['kelas'],
            'driverName'=>$row['nama_driver'],
            'driverPhoneNumber'=>$row['no_handphone'],
            'seatBooked'=>$row['kursi_pesanan'],
            'totalPrice'=>$row['harga_tiket'] * $row['kursi_pesanan'],
            'datetime'=>$row['waktu_keberangkatan'],
            'longitude'=>$row['longitude'],
            'latitude'=>$row['latitude'],
            'note'=>$row['catatan']
        ));
	}
}

echo json_encode($resultArray); 

$konek->close();
?>