<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    echo "NOT FOUND 404";
}
if(isset($_POST["login"])){

    session_start();
    // sisipkan class koneksi.php untuk menghubungkan ke database
    include("koneksi.php");
    
    // Ambil data dari form login
    $email = $_POST['useremail'];
    $password = $_POST['userpwd'];
    
    // Query untuk memeriksa pengguna dalam database
    $query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
    $result = $conn->query($query);
    
    
    if ($result->num_rows > 0) {
        $userdata = $result->fetch_assoc();
        // Pengguna berhasil login
        // Redirect ke halaman beranda
        if (password_verify($password, $userdata["kata_sandi"])){
            header("Location: tabelakun.php");
            exit(); // Penting untuk menghentikan eksekusi skrip setelah mengalihkan
        }else {
            header("Location: loginnew.php");
            $_SESSION["loginundefined"] = "0";
            exit();
        }
    } else {
        $_SESSION["loginundefined"] = "0";
        header("Location: loginnew.php");
        exit();
    }
    
    $conn->close();

}
?>