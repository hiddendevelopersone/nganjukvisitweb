<?php


include "../controllers/koneksi.php";

$idWisata = $_GET["wisataid"];

$sqlquery = "DELETE FROM `informasi_wisata` WHERE id_wisata = '$idWisata'";

$result = mysqli_query($conn, $sqlquery);

if($result) {

    $response = array("status"=>"success", "message"=>"berhasil menghapus komentar");

} else {
    $response = array("status"=>"error", "message"=>"gagal menghapus komentar");
}

$conn -> close();

echo json_encode($response);

?>