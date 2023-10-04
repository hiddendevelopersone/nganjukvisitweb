<?php
// sisipkan class koneksi.php untuk menghubungkan ke database
include("koneksi.php");

// Ambil data dari form login
$email = $_POST['useremail'];
$password = $_POST['userpwd'];

// Query untuk memeriksa pengguna dalam database
$query = "SELECT * FROM user WHERE email = '$email' AND kata_sandi = '$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Pengguna berhasil login
    // Redirect ke halaman beranda
    header("Location: tabelakun.php");
    exit(); // Penting untuk menghentikan eksekusi skrip setelah mengalihkan
} else {
    // Gagal login
    echo "<script>
    alert('email atau password tidak cocok')
    </script>";
}

$conn->close();
?>