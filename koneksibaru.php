<?php 
$dbhost = "localhost";
$dbuser = "tifz1761_root";
$dbpass = "tifnganjuk321";
$dbname = "tifz1761_nganjukvisit";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("error : " . mysqli_connect_error($conn));
}

echo "berhasil terkoneksi";

$conn -> close();

?>