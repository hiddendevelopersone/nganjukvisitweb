<?php

require "koneksi.php";

$rowresult = [];

$sqlquery = "SELECT * FROM informasi_wisata";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

// while($row = mysqli_fetch_assoc($result)){
//     $rowresult[] = $row;
// }

$conn->close();

echo json_encode($response);
?>