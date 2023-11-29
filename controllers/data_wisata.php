<?php

require "koneksi.php";

// $rowresult = [];

$sqlquery = "SELECT * FROM informasi_wisata";

$result = mysqli_query($conn, $sqlquery);

$dataArray = array();

while ($row = mysqli_fetch_assoc($result)) {
    $dataArray[] = $row;
}

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$dataArray);

// while($row = mysqli_fetch_assoc($result)){
//     $rowresult[] = $row;
// }


$conn->close();

echo json_encode($response);
?>