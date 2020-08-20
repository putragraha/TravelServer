<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "SELECT * FROM `user` 
    WHERE `id`=\"$loginRequest->id\" 
    AND `password`=\"$loginRequest->oldPassword\"";
$queryResult = mysqli_query($konek, $query);

$updateQuery = "UPDATE `user` 
    SET `password`=\"$loginRequest->newPassword\"
    WHERE `id`=\"$loginRequest->id\" 
    AND `password`=\"$loginRequest->oldPassword\"";
$updateResult = mysqli_query($konek, $updateQuery);

echo json_encode(array('success'=>$queryResult->num_rows > 0 && $updateResult > 0)); 

$konek->close();
?>