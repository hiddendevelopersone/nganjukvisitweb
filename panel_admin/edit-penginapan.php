<?php
include('../koneksi.php');

// $nama_wisata="";
// $id_user="";
// $deskripsi="";
// $alamat="";
// $harga_tiket="";
// $jadwal="";
// $gambar="";
// $coordinate ="";
// $linkmaps="";

$id = $_GET["id_penginapan"];
$sqlquery = "SELECT * FROM informasi_penginapan where id_penginapan = '$id'";

$rows = [];
$result = mysqli_query($conn, $sqlquery);

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

if(isset($_POST["simpan"])) {
    $nama_penginapan = $_POST['nama_penginapan'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];

    $sqlquerySimpan = "UPDATE `informasi_penginapan` SET `nama_penginapan`='$nama_penginapan',`id_wisata`='2',`deskripsi`='$deskripsi',`lokasi`='$lokasi' WHERE id_penginapan='$id'";
    $result = mysqli_query($conn, $sqlquerySimpan);

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan')</script>";
    }else {
        echo "<script>alert('Data Gagal Diperbarui')</script>";
    }

    $conn->close();

    header("Location: informasi-penginapan.php");
}

// echo $rows["nama_wisata"];




// echo json_encode($rows["nama_wisata"]);
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
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/label.css">

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
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as
                                                        unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="./page-login.html" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!-- **********************************
            Sidebar start
        ***********************************-->
        <?php include("sidebar.php"); ?>
        <!--**********************************
            Sidebar end
        *********************************** -->

        <!--**********************************
            Content body start
        ***********************************-->
        <!-- <div class="content-body">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nama Wisata</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control input-default " placeholder="input-default">
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div id="body" class="content-body">
            <div class="container">
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
              
                <div class="mb-3">
        <label for="nama_penginapan" class="form-label">Nama Penginapan</label>
        <input type="text" class="form-control" id="nama_penginapan" name="nama_penginapan" value="<?= $rows[0]["nama_penginapan"];?>">
        </div>
        <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $rows[0]["lokasi"];?>">
        </div>
        <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"><?= $rows[0]["deskripsi"];?></textarea>
                </div>
                <div class="col-12">
                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>

        <!-- <div class="content-body">
            <div class="container">
                <h5 class="informasi-wisata">Informasi Wisata</h5>
                <form action="" method="post" enctype="multipart/form-data autocomplete="off">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Nama Wisata</label>
                        <input type="text" name="" class="form-control" placeholder="Masukan Nama Wisata">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Jam Operasional</label>
                        <input type="text" name="" class="form-control" placeholder="Masukan Jam Operasional">
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="" class="form-control" placeholder="Masukan Alamat">
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Harga Tiket Masuk</label>
                        <input type="text" name="" class="form-control" placeholder="Masukan Harga Tiket Masuk">
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="gambar">Pilih gambar:</label>
                    <input type="file" name="gambar" id="gambar">
                    <br>
                    <small>Upload File dengan Ukuran Maksimal 2 MB</small>
                    <br>
                    <input type="submit" value="Upload" name="submit">
                </form>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
                </form>
            </div>
        </div> -->
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