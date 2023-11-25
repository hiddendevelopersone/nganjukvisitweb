<?php

include "koneksi.php";

$idWisata = $_GET["wisataid"];
$idPengguna = $_GET["idPengguna"];

$sqlquery = "DELETE FROM `ulasan` WHERE id_wisata = '$idWisata' AND id_user = '$idPengguna'";

$result = mysqli_query($conn, $sqlquery);

if($result) {

    $response = array("status"=>"success", "message"=>"berhasil menghapus komentar");

} else {
    $response = array("status"=>"error", "message"=>"gagal menghapus komentar");
}

$conn -> close();

echo json_encode($response);

?>