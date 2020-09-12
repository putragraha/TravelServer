<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "SELECT 
    `pemesanantiket`.`kode_pemesanan` as `kode_pemesanan`,
    `driver`.`tim_travel` as `tim_travel`,
    `armada`.`kelas` as `kelas`,
    `armada`.`waktu_keberangkatan` as `waktu_keberangkatan`,
    `user`.`nama_user` as `nama_user`,
    `pemesanantiket`.`kursi_pesanan` as `kursi_pesanan`,
    `armada`.`harga_tiket` as `harga_tiket`,
    `armada`.`kota_asal` as `kota_asal`,
    `armada`.`kota_tujuan` as `kota_tujuan`,
    `pemesanantiket`.`longitude` as `longitude`,
    `pemesanantiket`.`latitude` as `latitude`,
    `pemesanantiket`.`status` as `status`,
    `pemesanantiket`.`catatan` as `catatan`
    FROM `pemesanantiket` 
    INNER JOIN `armada` ON `pemesanantiket`.`armada_id` = `armada`.`id`
    INNER JOIN `driver` ON `armada`.`driver_id` = `driver`.`id`
    INNER JOIN `user` ON `pemesanantiket`.`user_id` = `user`.`id`
    WHERE `driver`.`id` = $loginRequest->id";
$result = mysqli_query($konek, $query);
$resultArray = array();

if ($result->num_rows > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		array_push($resultArray, array(
            'orderCode'=>$row['kode_pemesanan'],
            'group'=>$row['tim_travel'],
            'armadaClass'=>$row['kelas'],
            'datetime'=>$row['waktu_keberangkatan'],
            'userName'=>$row['nama_user'],
            'seatBooked'=>$row['kursi_pesanan'],
            'totalPrice'=>$row['harga_tiket'] * $row['kursi_pesanan'],
            'departure'=>$row['kota_asal'],
            'arrival'=>$row['kota_tujuan'],
            'longitude'=>$row['longitude'],
            'latitude'=>$row['latitude'],
            'status'=>$row['status'],
            'note'=>$row['catatan']
        ));
	}
}

echo json_encode($resultArray); 

$konek->close();
?>