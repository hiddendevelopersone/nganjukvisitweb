<?php

require "koneksi.php";

header("Content-Type: application/json");

$sqlquery = "SELECT informasi_wisata.id_wisata, informasi_wisata.nama_wisata, informasi_wisata.deskripsi AS deskripsi, informasi_wisata.alamat, COUNT(favorit.id_user) AS jumlah_favorit
FROM `favorit`
JOIN informasi_wisata ON favorit.id_wisata = informasi_wisata.id_wisata
JOIN user ON favorit.id_user = user.id_user
GROUP BY id_wisata
ORDER BY jumlah_favorit DESC LIMIT 3";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

$conn->close();

echo json_encode($response);

?>