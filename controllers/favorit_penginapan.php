<?php

require "koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idUser = $_POST['idpengguna'];
    // $idUser = "U1000013";
    
    $sqlquery = "SELECT favorit_penginapan.id_favorit, informasi_penginapan.id_penginapan,  informasi_penginapan.nama_penginapan, informasi_penginapan.deskripsi 
    AS deskripsi, user.id_user FROM favorit_penginapan JOIN informasi_penginapan ON favorit_penginapan.id_penginapan = informasi_penginapan.id_penginapan 
    JOIN user ON favorit_penginapan.id_user = user.id_user WHERE user.id_user = '$idUser'";
    
    $result = mysqli_query($conn, $sqlquery);
    
    $response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));
    
    $conn->close();
    
    
} else {
    $response = array("status" => "error", "message" => "not post method");
}

echo json_encode($response);

?>