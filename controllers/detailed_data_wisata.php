<?php

require "koneksi.php";

$idSelected = $_GET["id_selected"];

$sqlquery = "SELECT * FROM informasi_wisata WHERE id_wisata = '$idSelected'";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

// while($row = mysqli_fetch_assoc($result)){
//     $rowresult[] = $row;
// }

$jsonArray = $response["data"];

$jsonObject = new stdClass();

foreach ($jsonArray as $row) {
  foreach ($row as $key => $value) {
    $jsonObject->$key = $value;
  }
}

$response["data"] = $jsonObject;

$conn->close();

echo json_encode($response);
?>