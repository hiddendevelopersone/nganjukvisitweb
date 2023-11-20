<?php

include "koneksi.php";

$idPengguna = $_GET["id_pengguna"];
$idWisata = $_GET["id_wisata"];

header("Content-Type: application/json");

$sqlcheck = "SELECT * FROM favorit WHERE id_wisata = '$idWisata' AND id_user = '$idPengguna'";

$checkresult = mysqli_query($conn, $sqlcheck);

if (mysqli_num_rows($checkresult) == 0) {
    $response = array("status"=>"alreadyex", "message"=>"telah dihapus");

} else {
    
    $sqlquery = "DELETE FROM favorit WHERE id_wisata = '$idWisata' AND id_user = '$idPengguna'";
    
    $result = mysqli_query($conn, $sqlquery);
    
    if ($result) {
        $response = array("status"=>"success", "message"=>"dihapus dari favorit");
    } else {
        $response = array("status"=>"error", "message"=>"gagal");
    }
}


$conn -> close();

echo json_encode($response);

?>