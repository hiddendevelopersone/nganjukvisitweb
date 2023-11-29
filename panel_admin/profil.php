<?php
session_start();

if (!isset($_SESSION['useremail'])) {
    // Redirect user to the login page if they are not logged in
    header("Location: /webnganjukvisit/proseslogin.php");
    exit();
}

include('../koneksi.php'); // Include your database connection code here

$email = $_SESSION['useremail'];

$sql = mysqli_query($conn, "SELECT username, level FROM user WHERE email = '$email'");
if ($sql) {
    $user_data = mysqli_fetch_assoc($sql);
    $name = $user_data['username'];
    $level = $user_data['level'];
    // Simpan level pengguna dalam sesi
} else {
    // Handle database error
    die("Database error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tabel.css">
    <link href="./vendor/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex">
                    <i class="icon icon-single-04 text-black" style="color: black; font-size: 24px;"></i>
                        <h5 class="m-0 font-weight-bold" style="color: #02406d;">Profil Akun
                        </h5>
                    </div>
                    <div class="card-body">
                        <h6><strong>Username:</strong>
                            <?php echo $name ?>
                        </h6>
                        <h6><strong>Email:</strong>
                            <?php echo $email ?>
                        </h6>
                        <h6 name="level"><strong>Level:</strong><span id="levelText">
                                <?php echo $level; ?>
                            </span></h6>

                        <a href="../loginnew.php">
                            <button class="btn-danger"
                                style="border: none; border-radius: 5px; width: 70px; height: auto;">Logout</button></a>
                    </div>
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