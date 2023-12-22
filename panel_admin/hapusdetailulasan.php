<?php
session_start();

include "../koneksi.php";

$id_ulasan = $_GET["id_ulasan"];
$id_wisata = $_GET["id_wisata"];

// Fungsi untuk menghapus ulasan
function hapusUlasan($id_ulasan, $id_wisata, $conn) {
    $id_ulasan = mysqli_real_escape_string($conn, $id_ulasan);

    // Query untuk menghapus ulasan berdasarkan ID
    $queryHapusUlasan = "DELETE FROM ulasan WHERE id_ulasan = '$id_ulasan'";
    $resultHapusUlasan = mysqli_query($conn, $queryHapusUlasan);

    if ($resultHapusUlasan) {
        $_SESSION["deletionstatus"] = "1";
        echo "<script>alert('Ulasan Berhasil Dihapus')</script>";
    } else {
        $_SESSION["deletionstatus"] = "0";
        echo "<script>alert('Ulasan Gagal Dihapus')</script>";
    }

    // Redirect kembali ke halaman detail-ulasan.php
    // header("Location: detail-ulasan.php?id_wisata=$id_wisata");
    echo '<script>window.location.href = "detail-ulasan.php";</script>';
            exit();
}
// Cek apakah pengguna sudah mengonfirmasi penghapusan
if (isset($_GET['confirm']) && $_GET['confirm'] == '1') {
    // Panggil fungsi hapusUlasan jika pengguna mengonfirmasi
    hapusUlasan($id_ulasan, $id_wisata, $conn);
} else {
    // Jika belum ada konfirmasi, tampilkan pesan konfirmasi menggunakan JavaScript
    echo "<script>
            var konfirmasi = confirm('Anda yakin ingin menghapus ulasan ini?');
            if (konfirmasi) {
                window.location.href = 'hapusdetailulasan.php?id_ulasan=$id_ulasan&id_wisata=$id_wisata&confirm=1';
            } else {
                window.location.href = 'detail-ulasan.php?id_wisata=$id_wisata';
            }
          </script>";
}

// Tutup koneksi
$conn->close();
// header("Location: detail-ulasan.php");
?>
