<?php

require "../koneksi.php";

$userget = $_GET["id_user"];

$sqlquery = "SELECT * FROM `book` WHERE id_user = '$userget' ORDER BY id_pemesanan DESC";

$result = mysqli_query($conn, $sqlquery);

if (mysqli_num_rows($result) > 0) {
    $response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));
} else {
    $response = array("status"=>"fail", "message"=>"gagal");

}

$conn->close();

echo json_encode($response);

?>