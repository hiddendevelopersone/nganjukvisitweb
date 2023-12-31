<?php
session_start();
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

$id = $_GET["id_event"];
$sqlquery = "SELECT * FROM event where id_event = '$id'";

$rows = [];
$result = mysqli_query($conn, $sqlquery);

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

if (isset($_POST["simpan"])) {
    $nama_event = $_POST['nama_event'];
    $jadwal = $_POST['jadwal'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $hari = $_POST['hari'];

    $sqlquerySimpan = "UPDATE `event` SET `nama_event`='$nama_event',`jadwal`='$jadwal',`lokasi`='$lokasi',`deskripsi`='$deskripsi',`hari`='$hari' WHERE id_event='$id'";
    $result = mysqli_query($conn, $sqlquerySimpan);

    if ($result) {
        $_SESSION["notifikasiedit"] = "1";
        // echo "<script>alert('Data Berhasil Disimpan')</script>";
        // header("Location: informasi-event.php");
        echo '<script>window.location.href = "informasi-event.php";</script>';
            exit();
    } else {
        $_SESSION["notifikasiedit"] = "0";
        echo "<script>alert('Data Gagal Diperbarui')</script>";
    }

    $conn->close();

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
        <?php include("header.php");?>
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
                        <label for="nama_event" class="form-label">Nama event</label>
                        <input type="text" class="form-control" id="nama_event" name="nama_event"
                            value="<?= $rows[0]["nama_event"]; ?>" Required>
                    </div>
                    <div class="mb-3">
                        <label for="hari" class="form-label">Pilih Hari:</label>
                        <select id="hari" name="hari">
                            <option value="senin" <?php echo ($rows[0]['hari'] == 'senin') ? 'selected' : '' ?> >Senin</option>
                            <option value="selasa" <?php echo ($rows[0]['hari'] == 'selasa') ? 'selected' : '' ?> >Selasa</option>
                            <option value="rabu" <?php echo ($rows[0]['hari'] == 'rabu') ? 'selected' : '' ?> >Rabu</option>
                            <option value="kamis" <?php echo ($rows[0]['hari'] == 'kamis') ? 'selected' : '' ?>>Kamis</option>
                            <option value="jumat" <?php echo ($rows[0]['hari'] == 'jumat') ? 'selected' : '' ?>>Jumat</option>
                            <option value="sabtu" <?php echo ($rows[0]['hari'] == 'sabtu') ? 'selected' : '' ?>>Sabtu</option>
                            <option value="minggu" <?php echo ($rows[0]['hari'] == 'minggu') ? 'selected' : '' ?>>Minggu</option>
                        </select>
                        <!-- value="<?= $rows[0]["hari"]; ?>" Required> -->
                    </div>
                    <div class="mb-3">
                        <label for="jadwal" class="form-label">Jadwal</label>
                        <input type="datetime-local" class="form-control" id="jadwal" name="jadwal"
                            value="<?= $rows[0]["jadwal"]; ?>" Required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi"
                            value="<?= $rows[0]["lokasi"]; ?>" Required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3"
                            name="deskripsi" Required><?= $rows[0]["deskripsi"]; ?></textarea>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <input type="text" class="form-control" id="hari" name="hari" value="<?= $rows[0]["hari"]; ?>" Required>
                    </div> -->
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