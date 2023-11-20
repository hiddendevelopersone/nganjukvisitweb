<?php

include "koneksi.php";

$idPengguna = $_GET["id_pengguna"];
$idKuliner = $_GET["id_kuliner"];

header("Content-Type: application/json");

$sqlcheck = "SELECT * FROM favorit_kuliner WHERE id_kuliner = '$idKuliner' AND id_user = '$idPengguna'";

$checkresult = mysqli_query($conn, $sqlcheck);

if (mysqli_num_rows($checkresult) > 0) {
    $response = array("status"=>"alreadyex", "message"=>"sudah ada di favorit");

} else {
    
    $sqlquery = "INSERT INTO favorit_kuliner (id_kuliner, id_user) VALUES ('$idKuliner', '$idPengguna')";
    
    $result = mysqli_query($conn, $sqlquery);
    
    if ($result) {
        $response = array("status"=>"success", "message"=>"ditambahkan di favorit");
    } else {
        $response = array("status"=>"error", "message"=>"gagal menambahkan favorit");
    }
}


$conn -> close();

echo json_encode($response);

?>