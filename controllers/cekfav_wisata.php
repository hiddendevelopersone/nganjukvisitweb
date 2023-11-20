<?php

include "koneksi.php";

$idPengguna = $_GET["id_pengguna"];
$idWisata = $_GET["id_wisata"];

header("Content-Type: application/json");

$sqlcheck = "SELECT * FROM favorit WHERE id_wisata = '$idWisata' AND id_user = '$idPengguna'";

$checkresult = mysqli_query($conn, $sqlcheck);

if (mysqli_num_rows($checkresult) > 0) {
    $response = array("status"=>"alreadyex", "message"=>"sudah ada di favorit");
} else {
    $response = array("status"=>"notyet", "message"=>"belum ada di favorit");
}

$conn -> close();

echo json_encode($response);

?>