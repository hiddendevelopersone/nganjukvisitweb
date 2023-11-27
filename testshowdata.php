<?php

include "koneksi.php";

$sqlquery = "SELECT * FROM `informasi_kuliner`";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

$conn->close();

echo json_encode($response);

?>