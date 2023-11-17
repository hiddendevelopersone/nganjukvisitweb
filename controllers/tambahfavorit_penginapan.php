<?php

include "koneksi.php";

$idPengguna = $_GET["id_pengguna"];
$idPenginapan = $_GET["id_penginapan"];

header("Content-Type: application/json");

$sqlcheck = "SELECT * FROM favorit_penginapan WHERE id_penginapan = '$idPenginapan' AND id_user = '$idPengguna'";

$checkresult = mysqli_query($conn, $sqlcheck);

if (mysqli_num_rows($checkresult) > 0) {
    $response = array("status"=>"fail", "message"=>"sudah ada di favorit");

} else {
    
    $sqlquery = "INSERT INTO favorit_penginapan (id_penginapan, id_user) VALUES ('$idPenginapan', '$idPengguna')";
    
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