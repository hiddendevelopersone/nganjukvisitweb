<?php

require "koneksi.php";

$sqlquery = "SELECT * FROM `event` ORDER BY jadwal DESC";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

$conn->close();

echo json_encode($response);
?>