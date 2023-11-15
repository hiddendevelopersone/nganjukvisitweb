<?php

include "koneksi.php";

$userid = $_POST["iduser"];
$ufullname = $_POST["fullname"];
$uemail = $_POST["email"];
$ualamat = $_POST["alamat"];
$unotelp = $_POST["notelp"];


// $userid = "U1000015";
// $ufullname = "syamaidzar adani";
// $uemail = "syamaidzar@gmail.com";
// $ualamat = "kertosono";
// $unotelp = "08738493211";

$sqlquery = "UPDATE `user` SET `fullname` = '$ufullname', `email` = '$uemail', `alamat`='$ualamat',`no_telepon`= '$unotelp' WHERE id_user = '$userid'";

$result = mysqli_query($conn, $sqlquery);

if($result) {

    $response = array("status"=>"success", "message"=>"berhasil menyimpan profile");

} else {
    $response = array("status"=>"error", "message"=>"gagal menyimpan profile");
}

$conn -> close();

echo json_encode($response);
?>