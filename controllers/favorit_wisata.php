<?php

require "koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idUser = $_POST['idpengguna'];
    // $idUser = "U1000013";
    
    $sqlquery = "SELECT favorit.id_favorit, informasi_wisata.id_wisata,  informasi_wisata.nama_wisata, informasi_wisata.deskripsi 
    AS deskripsi, user.id_user FROM favorit JOIN informasi_wisata ON favorit.id_wisata = informasi_wisata.id_wisata 
    JOIN user ON favorit.id_user = user.id_user WHERE user.id_user = '$idUser'";
    
    $result = mysqli_query($conn, $sqlquery);
    
    $response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));
    
    $conn->close();
    
    
} else {
    $response = array("status" => "error", "message" => "not post method");
}

echo json_encode($response);

?>