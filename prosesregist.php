<?php
include "koneksi.php"; 

$numquery = "SELECT max(id_user) as kodeTerbesar FROM user";
$hasil = mysqli_query($conn, $numquery);
$datas = mysqli_fetch_array($hasil);
 
$maxcode = $datas['kodeTerbesar'];
$urutan = (int) substr($maxcode, 1, 7);
$urutan++;
$huruf = "U";
$kodee = $huruf . $urutan;

global $conn;
$username = $_POST["userusername"];
$password = $_POST["userpwd"];
$email = $_POST["useremail"]; 
$fullname = $_POST["userfullname"];
$alamat = $_POST["useralamat"];
$notelp = $_POST["usernotelp"];

// check username is available
$ruser = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

if ( mysqli_fetch_assoc($ruser) ) {
    echo "<script> 
        alert('username ini sudah pernah dipakai, gunakan username lain')
    </script>";
}else {
    // add new user to database
    mysqli_query($conn, "INSERT INTO user VALUES ('$kodee', 'ADMIN', '$username', '$fullname', '$alamat', '$notelp', '$email','$password')");
    header("Location: login.php");
}

$conn->close();
?>