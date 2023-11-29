<?php 

require "koneksi.php";

header("Content-Type: application/json");

$sqlquery = "SELECT * FROM event ORDER BY jadwal DESC LIMIT 3";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

$conn->close();

echo json_encode($response);

?>