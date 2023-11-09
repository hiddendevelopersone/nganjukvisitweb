<?php
session_start();

include "../koneksi.php";

$id = $_GET["id_kuliner"];
$sqlquery = "DELETE FROM informasi_kuliner where id_kuliner = '$id'";
$result = mysqli_query($conn, $sqlquery);

if($result) {
    $_SESSION["deletionstatus"] = "1";
    echo "<script>alert('Data Berhasil Dihapus')<script>";
}else {
    $_SESSION["deletionstatus"] = "0";
    echo "<script>alert('Data Gagal Dihapus')<script>";
}

$conn -> close();

header("Location: informasi-kuliner.php");


?>