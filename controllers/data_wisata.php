<?php

require "koneksi.php";

$rowresult = [];

$sqlquery = "SELECT * FROM informasi_wisata";

$result = mysqli_query($conn, $sqlquery);

while($row = mysqli_fetch_assoc($result)){
    $rowresult[] = $row;
}

echo json_encode($rowresult);
?>