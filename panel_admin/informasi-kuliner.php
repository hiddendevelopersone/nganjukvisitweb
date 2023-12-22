<?php
session_start();
include('../koneksi.php');

$sqlquery = "SELECT * FROM informasi_kuliner";
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
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
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Halo,selamat datang!</h4>
                            <p class="mb-0">di Informasi Kuliner</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Informasi</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Kuliner</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <h5 class="judul-tambahdata">Tambah Data</h5>
                    <a href="tambah-kuliner.php">
                        <img src="./images/OIP.jpg" class="img-tambah" alt="Ikon">
                    </a>
                    <!-- <form action="" method="GET">
                        <input type="text" name="keyword" placeholder="Masukkan Pencarian" autocomplete="off" autofocus>
                        <button type="submit" name="cari">Cari</button>
                    </form> -->
                </div>
                <br>
                <form action="informasi-kuliner.php" method="GET">
                    <div class="form-group" style="display: flex; gap: 10px;">
                        <input type="text" name="cari" class="form-control" id="searchInput"
                            style="width: 50%; display: flex-end;" placeholder="Cari kuliner"
                            value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
                        <button type="submit" class="btn btn-info" id="searchButton">Cari</button>
                        <?php if (isset($_GET['cari'])): ?>
                            <a href="informasi-kuliner.php" class="btn btn-secondary">Hapus Pencarian</a>
                        <?php endif; ?>
                    </div>
                </form>

                <script>
                    document.getElementById('searchButton').addEventListener('click', function (event) {
                        var searchInput = document.getElementById('searchInput');

                        if (searchInput.value === '') {
                            event.preventDefault(); // Mencegah pengiriman form jika field pencarian kosong
                            searchInput.placeholder = 'Kolom pencarian tidak boleh kosong!';
                            searchInput.style.borderColor = 'red'; // Mengubah warna border field

                        } else {
                            searchInput.style.borderColor = '';
                        }
                    });

                    document.getElementById('searchInput').addEventListener('click', function () {
                        var searchInput = document.getElementById('searchInput');
                        searchInput.placeholder = 'Cari kuliner'; // Mengembalikan placeholder ke default saat input diklik
                        searchInput.style.borderColor = ''; // Mengembalikan warna border ke default saat input diklik
                    });
                </script>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Linkmaps</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['reset'])) {
                            // Pengguna menekan tombol "Hapus Pencarian"
                            // header("Location: informasi-kuliner.php"); // Mengarahkan ke halaman tanpa parameter pencarian
                            echo '<script>window.location.href = "informasi-penginapan.php";</script>';
                            exit();
                        }
                        $jumlahDataPerHalaman = 1;

                        // Perform the query to get the total number of rows
                        $queryCount = mysqli_query($conn, "SELECT COUNT(*) as total FROM informasi_kuliner");
                        $countResult = mysqli_fetch_assoc($queryCount);
                        $jumlahData = $countResult['total'];

                        // Calculate the total number of pages
                        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

                        // Get the current page
                        $page = (isset($_GET["page"])) ? $_GET["page"] : 1;

                        // Calculate the starting data index for the current page
                        $awalData = ($page - 1) * $jumlahDataPerHalaman;

                        if (isset($_GET['cari'])) {
                            $searchTerm = $conn->real_escape_string($_GET['cari']);
                            $sql = "SELECT * FROM informasi_kuliner WHERE nama_kuliner LIKE '%$searchTerm%' limit $awalData,$jumlahDataPerHalaman";
                        } else {
                            $sql = "SELECT * FROM informasi_kuliner ORDER BY id_kuliner DESC limit $awalData,$jumlahDataPerHalaman";
                        }
                        $q2 = mysqli_query($conn, $sql);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2['id_kuliner'];
                            $nama = $r2['nama_kuliner'];
                            $lokasi = $r2['lokasi'];
                            $linkmaps = $r2['linkmaps'];
                            $deskripsi = $r2['deskripsi'];
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $urut++ ?>
                                </th>
                                <!-- <td>Mark</td> -->
                                <td scope="row">
                                    <?php echo $nama ?>
                                </td>
                                <td scope="row">
                                    <?php echo $lokasi ?>
                                </td>
                                <td scope="row">
                                <a href="<?php echo $linkmaps ?>"><?php echo $linkmaps ?></a>
                                </td>
                                <td scope="row">
                                    <?php echo $deskripsi ?>
                                </td>
                                <td scope="row">
                                    <div class="d-inline-flex">
                                        <a href="edit-kuliner.php?id_kuliner=<?php echo $id ?>">
                                            <div class="btn btn-primary mr-1 " name="edit">Edit</div>
                                        </a>
                                        <a href="hapusdatakuliner.php?id_kuliner=<?php echo $id ?>" onclick="
                return confirm ('apakah anda yakin ingin menghapusnya')">
                                            <div class="btn btn-danger" name="delete">Hapus</div>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Pagination code -->
                <ul class='pagination'>
                    <!-- Previous page link -->
                    <?php
                    if ($page > 1) {
                        echo "<li class='page-item'><a class='page-link' href='informasi-kuliner.php?page=" . ($page - 1) . "'>&laquo; Previous</a></li>";
                    }

                    // Numbered pagination links
                    for ($i = 1; $i <= $jumlahHalaman; $i++) {
                        echo "<li class='page-item " . (($page == $i) ? 'active' : '') . "'><a class='page-link' href='informasi-kuliner.php?page=$i'>$i</a></li>";
                    }

                    // Next page link
                    if ($page < $jumlahHalaman) {
                        echo "<li class='page-item'><a class='page-link' href='informasi-kuliner.php?page=" . ($page + 1) . "'>Next &raquo;</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


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