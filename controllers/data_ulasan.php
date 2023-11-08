<?php

require "koneksi.php";

$sqlquery = "SELECT * FROM ulasan";

$result = mysqli_query($conn, $sqlquery);

$rowresult = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();

echo json_encode($rowresult);

?>