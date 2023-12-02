<?php

require "koneksi.php";

// $rowresult = [];

$sqlquery = "SELECT * FROM informasi_wisata";

$result = mysqli_query($conn, $sqlquery);

$dataArray = array();

if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        $dataArray[] = $row;
    }
    
    $response = array("status"=>"success", "message"=>"data diambil", "data"=>$dataArray);
    
} else {
    
    $response = array("status"=>"gagal", "message"=>"data gagal");
}


$conn->close();

echo json_encode($response);

?>