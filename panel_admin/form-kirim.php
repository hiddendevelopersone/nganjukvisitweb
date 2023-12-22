<?php

require '../koneksi.php';
require '../controllers/notif/Notification.php';

$getdevtoken = $_GET["device_token"];
$getuserid = $_GET["id_user"];

if (isset($_POST["kirim"])) {
    $titleNotif = $_POST["judul"];
    $bodyNotif = $_POST["badan"];
    // $tokenNotif = $_POST["detoken"];
    $tokenNotif = $getdevtoken;


    $data = [
        'key_1' => 'data 1',
        'key_2' => 'data 2'
    ];

    $notif = new Notification();
    $status = $notif->sendNotif($tokenNotif, $titleNotif, $bodyNotif, $data);

    // echo $status;

    // getting info success or not
    $dataRespons = json_decode($status, true);

    if ($dataRespons['success'] == 1) {

        $queryins = "INSERT INTO notifikasi VALUES ('', '$titleNotif', '$bodyNotif', '$getuserid', NOW())";

        $resultqueryins = mysqli_query($conn, $queryins);

        if ($resultqueryins) {
            // echo "berhasil mengirim notifikasi";
            // echo "berhasil menyimpan ke database";
            echo "<script>alert('berhasil mengirim notifikasi')</script>";
        } else {
            echo "<script>alert('gagal mengirim notifikasi')</script>";
        }
    } else {
        echo "<script>alert('gagal mengirim notifikasi2')</script>";
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
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Halo,selamat datang!</h4>
                            <p class="mb-0">di Notifikasi</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Tambahan</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Notifikasi</a></li>
                        </ol>
                    </div>
                </div>
                <div class="container p-3">
                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="judul" class="form-label">Title / Judul</label>
                            <input type="text" class="form-control" id="judul" placeholder="Masukan Judul Notifikasi"
                                name="judul" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="badan" class="form-label">Body / Pesan</label>
                            <input type="text" class="form-control" id="badan" placeholder="Masukan Pesan" name="badan"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="detoken" class="form-label">Device Token</label>
                            <input type="text" class="form-control" id="detoken" placeholder="Masukan Token"
                                value="<?= $getdevtoken ?>" name="detoken" disabled>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="kirim" value="kirim notif" class="btn btn-primary" required>
                        </div>
                    </form>
                </div>


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