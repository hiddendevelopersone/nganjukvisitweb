<?php
header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // koneksi ke database
        $conn = new mysqli("localhost", "root", "", "nganjukvisit");

        // jika koneksi gagal
        if ($conn->mysqli_connect_error) {
            $response = array('status' => 'error', 'message' => 'Koneksi gagal');
        }else{
            $response = array('status' => 'success', 'message' => 'Koneksi success');
        }

        // close koneksi
        $conn->close();

        echo json_encode($response);
    }else{
        echo 'error';
    }
?>