<?php

include "../controllers/koneksi.php";

$namawisata = $_POST["nama_wisata"];
$iduser = $_POST["id_user"];
$deskripsi = $_POST["deskripsi"];
$alamat = $_POST["alamat"];
$harga = $_POST["harga_tiket"];
$jadwal = $_POST["jadwal"];
$gambar = $_POST["gambar"];
$coordinate = $_POST["coordinate"];
$linkmaps = $_POST["linkmaps"];


$sqlquery = "INSERT INTO `informasi_wisata` VALUES ('', '$namawisata', '$iduser', '$deskripsi', '$alamat', '$harga', '$jadwal', '$gambar', '$coordinate', '$linkmaps')";

$result = mysqli_query($conn, $sqlquery);

if ($result) {
    $response = array("status"=>"success", "message"=>"data berhasil terkirim");
} else {
    $response = array("status"=>"error", "message"=>"gagal mengirim");
}

$conn->close();

echo json_encode($response);

?>