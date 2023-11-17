<?php

require "koneksi.php";

header("Content-Type: application/json");

$sqlquery = "SELECT informasi_penginapan.id_penginapan, informasi_penginapan.nama_penginapan, informasi_penginapan.deskripsi AS deskripsi, informasi_penginapan.lokasi, informasi_penginapan.gambar, COUNT(favorit_penginapan.id_user) AS jumlah_favorit FROM `favorit_penginapan`
JOIN informasi_penginapan ON favorit_penginapan.id_penginapan = informasi_penginapan.id_penginapan
JOIN user ON favorit_penginapan.id_user = user.id_user
GROUP BY id_penginapan
ORDER BY jumlah_favorit DESC LIMIT 3";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

$conn->close();

echo json_encode($response);

?>