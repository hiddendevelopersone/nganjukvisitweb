<?php
session_start();
include('../koneksi.php');

$sqlquery = "SELECT * FROM event";
$result = $conn->query($sqlquery);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
$nama_event = "";
$jadwal = "";
$lokasi = "";
$deskripsi = "";
$hari = "";
$error;
$success;
if (isset($_POST['simpan'])) {
    $nama_event = $_POST['nama_event'];
    $jadwal = $_POST['jadwal'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $hari = $_POST['hari'];
    // echo json_encode($_POST);
    // exit();
        if ($nama_event && $jadwal && $lokasi && $deskripsi && $hari) {
        $sql1 = "insert into event(nama_event,jadwal,lokasi,deskripsi,id_wisata,hari) values ('$nama_event','$jadwal','$lokasi','$deskripsi','2','$hari')";
        $q1 = mysqli_query($conn, $sql1);
        if ($q1) {
            $_SESSION["notifikasitambah"] = "1";
            header("Location: informasi-event.php");
            // echo "<script>alert('Berhasil memasukan data baru')</script>";
        } else {
            $_SESSION["notifikasitambah"] = "0";
            echo "<script>alert('Gagal memasukkan data')</script>";
        }
    } else {
        echo "<script>alert('data belum lengkap')</script>";
        header("Location: tambah-event.php");
    }
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
        <?php include("navheader.php");?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php include("header.php");?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include("sidebar.php");?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
              
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nama Event</label>
              <input type="text" class="form-control" id="nama_event" placeholder="Masukan Nama Event" name="nama_event" autofocus Required>
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Jadwal</label>
                  <input type="datetime-local" class="form-control" id="jadwal" placeholder="Masukan Jadwal" name="jadwal" Required>
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Lokasi</label>
                  <input type="text" class="form-control" id="lokasi" placeholder="Masukan lokasi" name="lokasi" Required>
              </div>
              <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" Required></textarea>
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Hari</label>
                  <input type="text" class="form-control" id="hari" placeholder="Masukan Hari" name="hari" Required>
              </div>
              <div class="col-12">
                  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
              </div>
              </form>
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