<?php
session_start();
include('../koneksi.php');
// require '../functions.php';
$idWisata = $_GET["id_wisata"];

$sqlquery = "SELECT * FROM informasi_wisata";
$result = $conn->query($sqlquery);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
if (isset($_SESSION["notifikasitambah"])) {
    if ($_SESSION["notifikasitambah"] === "1") {
        echo "<script>alert('Berhasil memasukan data baru')</script>";
    } else if ($_SESSION["notifikasitambah"] === "0") {
        echo "<script>alert('Gagal memasukan data baru')</script>";
    } else {
        echo "<script>alert('Gagal memasukan data baru')</script>";
    }
    unset($_SESSION["notifikasitambah"]);
}

if (isset($_SESSION["notifikasiedit"])) {
    if ($_SESSION["notifikasiedit"] === "1") {
        echo "<script>alert('Berhasil merubah data')</script>";
    } else if ($_SESSION["notifikasiedit"] === "0") {
        echo "<script>alert('Gagal merubah data')</script>";
    } else {
        echo "<script>alert('Gagal merubah data2')</script>";
    }
    unset($_SESSION["notifikasiedit"]);
}

if (isset($_SESSION["deletionstatus"])) {
    if ($_SESSION["deletionstatus"] === "1") {
        echo "<script>alert('Berhasil menghapus data')</script>";
    } else if ($_SESSION["deletionstatus"] === "0") {
        echo "<script>alert('Gagal menghapus data')</script>";
    } else {
        echo "<script>alert('Gagal menghapus data2')</script>";
    }
    unset($_SESSION["deletionstatus"]);
}
// if (isset($_POST["cari"])) {
//     $informasi_wisata = cari($_POST["keyword"]);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tabel.css">

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include("navheader.php"); ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php include("header.php"); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include("sidebar.php"); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->


        <div class="content-body warnatable">

            <div class="container mt-3">
<?php
            if (isset($_GET['id_wisata'])) {
    $id_wisata = $_GET['id_wisata'];

    // Query untuk mendapatkan informasi wisata berdasarkan ID
    $queryWisata = "SELECT * FROM informasi_wisata WHERE id_wisata = '$id_wisata'";
    $resultWisata = mysqli_query($conn, $queryWisata);

    // Periksa apakah informasi wisata ditemukan
    if ($rowWisata = mysqli_fetch_assoc($resultWisata)) {
        $nama_wisata = $rowWisata['nama_wisata'];

        // Fungsi untuk mengambil ulasan untuk objek wisata tertentu
        function getUlasanForWisata($id_wisata, $conn) {
            $id_wisata = mysqli_real_escape_string($conn, $id_wisata);

            $query = "SELECT * FROM ulasan WHERE id_wisata = '$id_wisata'";
            $result = mysqli_query($conn, $query);

            $ulasan = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $ulasan[] = $row;
            }

            return $ulasan;
        }

        // Ambil ulasan untuk objek wisata yang diberikan
        $ulasan = getUlasanForWisata($id_wisata, $conn);

        // Tampilkan nama wisata
        echo '<h4>Nama Wisata: ' . $nama_wisata . '</h4>';

        // Tampilkan ulasan menggunakan looping
        foreach ($ulasan as $ulas) {
            echo '<div class="comment mt-3 komentar-border p-3">';
            echo '<div class="d-flex justify-content-between">';
            echo '<strong>' . $ulas['nama'] . '</strong>';
            echo '<small>' . $ulas['tanggal'] . '</small>';
            echo '</div>';
            echo '<p>' . $ulas['comment'] . '</p>';
            echo '<a href="hapusdetailulasan.php?id_ulasan=' . $ulas['id_ulasan'] . '&id_wisata=' . $ulas['id_wisata'] . '">';
            echo '<div class="btn btn-danger mr-1" name="delete">Hapus</div>';
            echo '</a>';
            echo '</div>';
        }

        // Tutup koneksi ke database
        mysqli_close($conn);
    } else {
        echo "Informasi Wisata tidak ditemukan.";
    }
} else {
    echo "ID Wisata tidak ditemukan.";
}
?>
                


            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <div class=""></div>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
</body>

</html>