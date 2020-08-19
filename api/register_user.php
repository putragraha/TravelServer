<?php 
require '../config/koneksi.php';

$loginRequest = json_decode(file_get_contents('php://input'));
$query = "INSERT INTO `user` (nama_user, email, password, phone_number)
VALUES (
    \"$loginRequest->userName\", 
    \"$loginRequest->email\", 
    \"$loginRequest->password\", 
    \"$loginRequest->phoneNumber\"
)";
$result = mysqli_query($konek, $query);

echo json_encode(array('success'=>$result > 0)); 

$konek->close();
?>