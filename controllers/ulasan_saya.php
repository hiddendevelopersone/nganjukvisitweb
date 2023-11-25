<?php

require "koneksi.php";

$idSelected = $_GET["id_selected"];
$idPengguna = $_GET["idPengguna"];

$sqlquery = "SELECT * FROM ulasan WHERE id_wisata = '$idSelected' AND id_user = '$idPengguna' LIMIT 1";

$result = mysqli_query($conn, $sqlquery);

$response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));

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