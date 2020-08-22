<?php 
require '../config/koneksi.php';

const REJECTED = "REJECTED";

$request = json_decode(file_get_contents('php://input'));

$updateSeatResult = 0;
if (REJECTED == $request->status) {
    $updateSeatQuery = "UPDATE `armada` 
    INNER JOIN `pemesanantiket`
    ON `armada`.`id`=`pemesanantiket`.`armada_id`
    SET `armada`.`kursi_tersedia`=`armada`.`kursi_tersedia` + `pemesanantiket`.`kursi_pesanan`
    WHERE `pemesanantiket`.`status`<>\"" . REJECTED . "\"
    AND `pemesanantiket`.`kode_pemesanan`=\"$request->orderCode\"";
    
    $updateSeatResult = mysqli_query($konek, $updateSeatQuery);
}

$updateStatusQuery = "UPDATE `pemesanantiket`
    SET `status`=\"$request->status\"
    WHERE `kode_pemesanan`=\"$request->orderCode\"";
$updateStatusResult = mysqli_query($konek, $updateStatusQuery);

echo json_encode(array('success'=>$updateStatusResult > 0 && $updateSeatResult > 0)); 

$konek->close();
?>