<?php
include "koneksi.php";


function startquery($query) {
    global $conn;
    $rows = [];

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// function cari($keyword){
//     $query = "SELECT * FROM informasi_wisata
//     WHERE nama_wisata = '$keyword'";
//     return query($query);
// }

?>