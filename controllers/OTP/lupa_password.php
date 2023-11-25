<?php

require "../koneksi.php";

// $comentUser = $_POST["comment"];
// $idWisata = $_POST["wisataid"];
// $idPengguna = $_POST["idPengguna"];

$email = $_POST["email"];
$passget = $_POST["password"];
$password = password_hash($passget, PASSWORD_BCRYPT);

$sqlquery = "UPDATE `user` SET `kata_sandi`='$password' WHERE email = '$email'";

$result = mysqli_query($conn, $sqlquery);

if($result) {

    $response = array("status"=>"success", "message"=>"berhasil mengubah password");

} else {
    $response = array("status"=>"error", "message"=>"gagal mengubah password");
}

$conn -> close();

echo json_encode($response);

?>