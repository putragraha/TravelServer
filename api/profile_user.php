<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "SELECT * FROM `user` WHERE `id`=\"" . $loginRequest->id . "\"";
$result = mysqli_query($konek, $query);
$resultArray = array();

if ($result->num_rows > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$resultArray["name"] = $row['nama_user'];
		$resultArray["email"] = $row['email'];
		$resultArray["phoneNumber"] = $row['phone_number'];
	}
}

echo json_encode($resultArray); 

$konek->close();
?>