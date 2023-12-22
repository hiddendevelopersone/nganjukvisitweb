<?php
session_start();

include "../koneksi.php";

$id = $_GET["id_penginapan"];
$sqlquery = "DELETE FROM informasi_penginapan where id_penginapan = '$id'";
$result = mysqli_query($conn, $sqlquery);

if($result) {
    $_SESSION["deletionstatus"] = "1";
    echo "<script>alert('Data Berhasil Dihapus')<script>";
}else {
    $_SESSION["deletionstatus"] = "0";
    echo "<script>alert('Data Gagal Dihapus')<script>";
}

$conn -> close();

// header("Location: informasi-penginapan.php");
echo '<script>window.location.href = "informasi-penginapan.php";</script>';
            exit();


?>