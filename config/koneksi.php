<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'db_travel';

// define( 'FIREBASE_API_KEY', 'AAAA4VnoeSI:APA91bGtvpeePfY2DD7ul8QPiXm2MBTF8XQhRrYCfqmXDCUCC-fOyoaeqETetRfkPHdzdxVlbC2n22Y0wTKh1gDib8dqUjNNJe6EBSNVnDfKFJw2oGYhQgvWvLKa2Bp1bqiAmLOoopBj' );
 
// melakukan koneksi ke database
$konek = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
 
// cek koneksi yang kita lakukan berhasil atau tidak
if ($konek->connect_error) {
	die('Maaf koneksi gagal: '. $konek->connect_error);
}
?>