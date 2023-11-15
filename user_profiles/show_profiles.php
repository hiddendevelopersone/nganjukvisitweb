<?php

require "../koneksi.php";

$idSelected = $_POST["idPengguna"];

$sqlquery = "SELECT * FROM user WHERE id_user = '$idSelected'";

$result = mysqli_query($conn, $sqlquery);

$gambar = $result->fetch_assoc();
$response = array("status"=>"success", "message"=>"data diambil", "data"=>$gambar['gambar']);

$conn->close();

echo json_encode($response);

?>