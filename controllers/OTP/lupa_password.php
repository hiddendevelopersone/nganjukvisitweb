<?php

require "../koneksi.php";
require "../Validator.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST["email"];
    $passget = $_POST["password"];
    $password = password_hash($passget, PASSWORD_BCRYPT);
    
    // get validator
    $validator = new Validator();
    $validPass = $validator->isValidPassword($passget);

    if ($validPass["status"] === "error") {
        $response = $validPass;
    } else {

        $sqlquery = "UPDATE `user` SET `kata_sandi`='$password' WHERE email = '$email'";
        
        $result = mysqli_query($conn, $sqlquery);
        
        if($result) {
        
            $response = array("status"=>"success", "message"=>"berhasil mengubah password");
        
        } else {
            $response = array("status"=>"error", "message"=>"gagal mengubah password");
        }
    }
   
}

$conn -> close();

echo json_encode($response);

?>