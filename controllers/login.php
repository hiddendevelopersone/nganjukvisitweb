<?php

/**
 * Digunakan untuk login manual dengan menginputkan username/email dan password.
 */

require "koneksi.php";
require "Validator.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // post request
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    // cek validasi data
    $validator = new Validator();
    $validUsername = $validator->isValidUsername($userid);
    $validEmail = $validator->isValidEmail($userid);
    $validPass = $validator->isValidPassword($password);

    if (strlen($userid) < 4 || strlen($userid) > 100) {
        $response = array('status' => 'error', 'message' => 'Email atau username tidak valid');
    }else if($validPass["status"] === "error"){
        $response = $validPass;
    }else {
        // get data user
        $sql = "SELECT * FROM user WHERE email = '$userid' OR username = '$userid' LIMIT 1";
        $result = $conn->query($sql);

        // jika username atau email exist
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc(); // get user data
            // jika password match
            if (password_verify($password, $user['kata_sandi'])) {
                // if($user["kata_sandi"] === $password){
                $response = array('status' => 'success', 'message' => 'Login berhasil', 'data' => $user);
            } else {
                // Kata sandi salah
                $response = array('status' => 'error', 'message' => 'Kata sandi salah');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Pengguna tidak ditemukan');
        }
    }

    // close koneksi
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "not post method");
}

// show response
echo json_encode($response);