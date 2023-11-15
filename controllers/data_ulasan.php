<?php

require "koneksi.php";

$idSelected = $_GET["id_selected"];

$sqlquery = "SELECT * FROM ulasan WHERE id_wisata = '$idSelected' ORDER BY tanggal DESC";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

$conn->close();

echo json_encode($response);

?>