<?php
session_start();

include "../koneksi.php";

$id = $_GET["id_event"];
$sqlquery = "DELETE FROM event where id_event = '$id'";
$result = mysqli_query($conn, $sqlquery);

if($result) {
    $_SESSION["deletionstatus"] = "1";
    echo "<script>alert('Data Berhasil Dihapus')<script>";
}else {
    $_SESSION["deletionstatus"] = "0";
    echo "<script>alert('Data Gagal Dihapus')<script>";
}

$conn -> close();

header("Location: informasi-event.php");


?>