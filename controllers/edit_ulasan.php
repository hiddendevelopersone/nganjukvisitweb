<?php

include "koneksi.php";

// $idSelected = $_GET["id_selected"];

// $namaUser = $_POST["nama_pengguna"];
$comentUser = $_POST["comment"];
$idWisata = $_POST["wisataid"];
$idPengguna = $_POST["idPengguna"];

$sqlquery = "UPDATE `ulasan` SET `comment`='$comentUser',`tanggal`= NOW() WHERE `id_user`='$idPengguna' AND `id_wisata`='$idWisata'";

$result = mysqli_query($conn, $sqlquery);

if($result) {

    $response = array("status"=>"success", "message"=>"berhasil mengedit komentar");

} else {
    $response = array("status"=>"error", "message"=>"gagal menyimpan komentar");
}

$conn -> close();

echo json_encode($response);

?>