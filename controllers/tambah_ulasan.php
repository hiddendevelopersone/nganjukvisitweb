<?php

include "koneksi.php";

// $idSelected = $_GET["id_selected"];

$namaUser = $_POST["nama_pengguna"];
$comentUser = $_POST["comment"];
$idWisata = $_POST["wisataid"];
$idPengguna = $_POST["idPengguna"];

// $namaUser = "pramudya";
// $comentUser = "bagus";
// $idWisata = "1";

// check user is available or not in comment section
$sqlcheck = "SELECT * FROM ulasan WHERE id_user='$idPengguna' AND id_wisata='$idWisata' LIMIT 1";

$checkresult = mysqli_query($conn, $sqlcheck);

if (mysqli_num_rows($checkresult) > 0) {
    $response = array("status"=>"fail", "message"=>"anda sudah pernah comment");

} else {

    $sqlquery = "INSERT INTO `ulasan`(`nama`, `comment`, `tanggal`, `id_wisata`, `id_user`) 
    VALUES ('$namaUser','$comentUser',NOW(),'$idWisata','$idPengguna')";
    
    $result = mysqli_query($conn, $sqlquery);
    
    if ($result) {
        $response = array("status"=>"success", "message"=>"ulasan berhasil terkirim");
    } else {
        $response = array("status"=>"error", "message"=>"gagal mengirim");
    }

}

$conn->close();

echo json_encode($response);

?>