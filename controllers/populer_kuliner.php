<?php
require "koneksi.php";

header("Content-Type: application/json");

$sqlquery = "SELECT favorit_kuliner.id_kuliner, informasi_kuliner.nama_kuliner, informasi_kuliner.deskripsi AS deskripsi, informasi_kuliner.lokasi, COUNT(favorit_kuliner.id_user) AS jumlah_favorit
FROM `favorit_kuliner`
JOIN informasi_kuliner ON favorit_kuliner.id_kuliner = informasi_kuliner.id_kuliner
JOIN user ON favorit_kuliner.id_user = user.id_user
GROUP BY id_kuliner
ORDER BY jumlah_favorit DESC LIMIT 3";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

$conn->close();

echo json_encode($response);

?>