<?php

require "koneksi.php";

// header("Content-Type: application/json");

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // $idUser = $_POST['idpengguna'];
    // $idUser = "U1000013";
    
    $sqlquery = "SELECT * FROM favorit";
    
    $result = mysqli_query($conn, $sqlquery);
    
    $response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));
    
    $conn->close();
    
    
// } else {
//     $response = array("status" => "error", "message" => "not post method");
// }

echo json_encode($response);

?>