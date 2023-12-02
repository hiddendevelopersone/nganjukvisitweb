<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "nganjukvisit";
// $server = "localhost";
// $username = "tifz1761_root";
// $password = "tifnganjuk321";
// $database = "tifz1761_nganjukvisit";

// membuat koneksi ke databae
$conn = new mysqli($server, $username, $password, $database);

// cek koneksi berhasil atau tidak
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>