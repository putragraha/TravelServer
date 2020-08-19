<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "SELECT * FROM `user` WHERE `email`=\"" . $loginRequest->email . "\" AND `password`=\"" . $loginRequest->password ."\"";
$result = mysqli_query($konek, $query);

$resultExist = $result->num_rows > 0;
$id = -1;
if ($resultExist) {
	while($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
	}
}

echo json_encode(array(
    'id'=>$id,
    'success'=>$resultExist
)); 

$konek->close();
?>