<?php 
require '../config/koneksi.php';

$query = "SELECT 
    `armada`.`id` as `id`,
    `armada`.`driver_id` as `driver_id`,
    `driver`.`foto_driver` as `foto_driver`,
    `armada`.`waktu_keberangkatan` as `waktu_keberangkatan`,
    `armada`.`harga_tiket` as `harga_tiket`,
    `armada`.`jumlah_kursi` as `jumlah_kursi`,
    `armada`.`kursi_tersedia` as `kursi_tersedia`,
    `armada`.`catatan` as `catatan`,
    `driver`.`nama_driver` as `nama_driver`,
    `driver`.`tim_travel` as `tim_travel`,
    `driver`.`mobil` as `mobil`,
    `armada`.`kelas` as `kelas`,
    `driver`.`no_handphone` as `no_handphone`
    FROM `armada` 
    INNER JOIN `driver` ON `armada`.`driver_id` = `driver`.`id`
    WHERE `armada`.`kursi_tersedia` <> 0
    ORDER BY `kursi_tersedia` DESC";
$result = mysqli_query($konek, $query);
$resultArray = array();

if ($result->num_rows > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		array_push($resultArray, array(
            'armadaId'=>$row['id'],
            'driverId'=>$row['driver_id'],
            'photoUrl'=>$row['foto_driver'],
            'datetime'=>$row['waktu_keberangkatan'],
            'price'=>$row['harga_tiket'],
            'seatAmount'=>$row['jumlah_kursi'],
            'seatAvailable'=>$row['kursi_tersedia'],
            'note'=>$row['catatan'],
            'driverName'=>$row['nama_driver'],
            'group'=>$row['tim_travel'],
            'car'=>$row['mobil'],
            'armadaClass'=>$row['kelas'],
            'driverPhoneNumber'=>$row['no_handphone']
        ));
	}
}

echo json_encode($resultArray); 

$konek->close();
?>