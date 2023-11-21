<?php

require "../koneksi.php";

$keyValue = $_GET["key_value"];

$sqlquery = "SELECT * FROM informasi_wisata WHERE nama_wisata LIKE '%$keyValue%'";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

$conn->close();

echo json_encode($response);
?>