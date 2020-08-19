<?php 
require '../config/koneksi.php';

$query = "SELECT * FROM `armada` ORDER BY `kursi_tersedia` DESC";
$result = mysqli_query($konek, $query);
$resultArray = array();

if ($result->num_rows > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		array_push($resultArray, array(
            'id'=>$row['id'],
            'driverId'=>$row['driver_id'],
            'datetime'=>$row['waktu_keberangkatan'],
            'price'=>$row['harga_tiket'],
            'seatAmount'=>$row['jumlah_kursi'],
            'seatAvailable'=>$row['kursi_tersedia'],
            'note'=>$row['catatan'],
        ));
	}
}

echo json_encode($resultArray); 

$konek->close();
?>