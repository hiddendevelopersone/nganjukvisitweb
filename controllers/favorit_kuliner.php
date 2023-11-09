<?php

require "koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idUser = $_POST['idpengguna'];
    // $idUser = "U1000013";
    
    $sqlquery = "SELECT favorit_kuliner.id_favorit, informasi_kuliner.id_kuliner,  informasi_kuliner.nama_kuliner, informasi_kuliner.deskripsi AS deskripsi, user.id_user, informasi_kuliner.lokasi
    FROM favorit_kuliner
    JOIN informasi_kuliner ON favorit_kuliner.id_kuliner = informasi_kuliner.id_kuliner 
    JOIN user ON favorit_kuliner.id_user = user.id_user 
    WHERE user.id_user = '$idUser'";
    
    $result = mysqli_query($conn, $sqlquery);
    
    $response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));
    
    $conn->close();
    
    
} else {
    $response = array("status" => "error", "message" => "not post method");
}

echo json_encode($response);

?>