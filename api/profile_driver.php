<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "SELECT * FROM `driver` WHERE `id`=\"" . $loginRequest->id . "\"";
$result = mysqli_query($konek, $query);
$resultArray = array();

if ($result->num_rows > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$resultArray["name"] = $row['nama_driver'];
		$resultArray["group"] = $row['tim_travel'];
		$resultArray["email"] = $row['email'];
		$resultArray["phoneNumber"] = $row['no_handphone'];
	}
}

echo json_encode($resultArray); 

$konek->close();
?>