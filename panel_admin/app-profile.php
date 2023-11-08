<?php  
require "../functions.php";

// query sql
$sqlquery1 = "SELECT * FROM user WHERE LEVEL = 'ADMIN'";
$sqlquery2 = "SELECT * FROM user WHERE LEVEL = 'PENGELOLA'";
$sqlquery3 = "SELECT * FROM user WHERE LEVEL = 'USER'";

// make result in array using function from functions.php
$pengguna1 = startquery($sqlquery1);
$pengguna2 = startquery($sqlquery2);
$pengguna3 = startquery($sqlquery3);

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
    <!-- <link rel="stylesheet" href="../tabelakunstyle.css"> -->

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
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
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
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
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
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
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
                                                    <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
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
            <div class="container-fluid">
                 <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Halo,selamat datang!</h4>
                            <p class="mb-0">di Data Pengguna</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengguna</a></li>
                        </ol>
                    </div>
                </div>
            <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;">
        <h5 class="text-center" style="margin-top: 5px;">Tabel Admin</h5>
      </div>
      <div class="table-responsive">
        <table>
            <thead>
               <tr>
                <th>No</th>
                <th>Id Staff</th>
                <th>Fullname</th>
                <th>No Telp</th>
                <th>Alamat</th>
               </tr> 
            </thead>
            <tbody>
            <?php $i = 1; foreach ( $pengguna1 as $lastresult ) : ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$lastresult['id_user']?></td>
                    <td><?=$lastresult['fullname']?></td>
                    <td><?=$lastresult['no_telepon']?></td>
                    <td><?=$lastresult['alamat']?></td>
                </tr>
            <?php  $i++; endforeach;?>
            </tbody>
        </table>
      </div>
      <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;">
        <h5 class="text-center" style="margin-top: 5px;">Tabel Pengelola</h5>
      </div>
      <div class="table-responsive">
        <table>
            <thead>
               <tr>
                <th>No</th>
                <th>Id Pengelola</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>No Telp</th>
                <th>Alamat</th>
               </tr> 
            </thead>
            <tbody>
            <?php $i = 1; foreach ( $pengguna2 as $lastresult ) : ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$lastresult['id_user']?></td>
                    <td><?=$lastresult['fullname']?></td>
                    <td><?=$lastresult['email']?></td>
                    <td><?=$lastresult['no_telepon']?></td>
                    <td><?=$lastresult['alamat']?></td>
                </tr>
            <?php  $i++; endforeach;?>
            </tbody>
        </table>
      </div>

      <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;">
        <h5 class="text-center" style="margin-top: 5px;">Tabel Pengguna</h5>
      </div>
      <div class="table-responsive">
        <table>
            <thead>
               <tr>
                <th>No</th>
                <th>Id Pengelola</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>No Telp</th>
               </tr> 
            </thead>
            <tbody>
            <?php $i = 1; foreach ( $pengguna3 as $lastresult ) : ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$lastresult['id_user']?></td>
                    <td><?=$lastresult['fullname']?></td>
                    <td><?=$lastresult['email']?></td>
                    <td><?=$lastresult['no_telepon']?></td>
                </tr>
            <?php  $i++; endforeach;?>
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