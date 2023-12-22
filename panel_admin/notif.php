<?php

include "../koneksi.php";

$sqlquery = "SELECT * FROM session ORDER BY id_session DESC";
$result = mysqli_query($conn, $sqlquery);

if (mysqli_num_rows($result) > 0) {
    // echo "berhasil mengambil data";
} else {
    die("error");
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
                <!-- <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;">
                    <h5 class="text-center" style="margin-top: 5px;">Tabel Admin</h5>
                </div> -->
                <div class="table table-striped">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">nomor</th>
                                <th scope="col">id_user</th>
                                <th scope="col">device token</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                $no = 0;
                while ($rows = mysqli_fetch_array($result)) {
                  $id = $rows['id_session'];
                  $iduser = $rows['id_user'];
                  $devicetoken = $rows['device_token'];
  
                  $no += 1;
              ?>
              <tr>
                <th >
                  <?= $no?>
                </th>
                <td>
                  <?=$iduser?>
                </td>
                <td>
                  <?=$devicetoken ?>
                </td>
                <td>
                <a href="form-kirim.php?device_token=<?php echo $devicetoken ?>&id_user=<?php echo $iduser?>">
                    <div class="btn btn-primary mr-1" name="edit">kirim</div>
                </a>
                </td>
              </tr>
              <?php
                }
              ?>
                        </tbody>
                    </table>
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