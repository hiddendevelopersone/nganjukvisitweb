<?php

include "../koneksi.php";

$idPengguna = $_GET["id_user"];

$sqlquery = "SELECT * FROM user WHERE id_user = '$idPengguna' LIMIT 1";

$result = mysqli_query($conn, $sqlquery);

$rowsarr = array();

if ($result) {
    
    $response = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_all(MYSQLI_ASSOC));
    // $resassoc = array("status"=>"success", "message"=>"data diambil", "data"=>$result->fetch_assoc("id_pengguna"));

    // while ($row = $result->fetch_assoc()) {
    //     // echo "Nama: " . $row["nama"] . " - Alamat: " . $row["alamat"] . "<br>";
    //     $rowsarr[] = $row["id_user"];
        
    //     echo json($rowsarr);
    // }
    
    $jsonArray = $response["data"];
    
    $jsonObject = new stdClass();
    
    foreach ($jsonArray as $row) {
        foreach ($row as $key => $value) {
            $jsonObject->$key = $value;
        }
    }
    
    $response["data"] = $jsonObject;
    
} else {
    $response = array("status"=>"failed", "message"=>"gagal diambil");
}

$conn->close();

echo json_encode($response);

?>