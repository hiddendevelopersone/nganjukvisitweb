<?php
session_start();
include('../koneksi.php');

$sqlquery = "SELECT * FROM informasi_penginapan";
$result = $conn->query($sqlquery);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
$nama_penginapan = "";
$lokasi = "";
$linkmaps = "";
$deskripsi = "";
$telepon = "";
$error;
$success;
if (isset($_POST['simpan'])) {
    $nama_penginapan = $_POST['nama_penginapan'];
    $lokasi = $_POST['lokasi'];
    $linkmaps = $_POST['linkmaps'];
    $deskripsi = $_POST['deskripsi'];
    $telepon = $_POST['telepon'];
    $gambar = upload();

        if ($nama_penginapan && $lokasi && $deskripsi) {
        $sql1 = "insert into informasi_penginapan(nama_penginapan,lokasi,linkmaps,id_wisata,deskripsi,gambar,telepon) values ('$nama_penginapan','$lokasi','$linkmaps','2','$deskripsi','$gambar','$telepon')";
        $q1 = mysqli_query($conn, $sql1);
        if ($q1) {
            $_SESSION["notifikasitambah"] = "1";
            header("Location: informasi-penginapan.php");
            // echo "<script>alert('Berhasil memasukan data baru')</script>";
        } else {
            $_SESSION["notifikasitambah"] = "0";
            echo "<script>alert('Gagal memasukkan data')</script>";
        }
    } else {
        echo "<script>alert('data belum lengkap')</script>";
        header("Location: tambah-penginapan.php");
    }
}
function upload() {
    $phpFileUploadErrors = array(
        // 0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
    );

    $filenames = $_FILES["gambar"]["name"];
    $filesize = $_FILES["gambar"]["size"];
    $errcode = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // error code
    // if($errcode === 4){
    //     echo "<script> 
    //         alert('$phpFileUploadErrors[4]')
    //         </script>";
    //     return false;
    // }

    // error code checker alternate
    if( array_key_exists($errcode, $phpFileUploadErrors) ){
            echo "<script> 
                alert('$phpFileUploadErrors[$errcode]')
                </script>";
            return false;
        }
        
        // size handler
        if ($filesize >= 1000000) {
            echo "<script> 
                alert('ukuran file tidak boleh lebih dari 1MB')
                </script>";
            return false;            
        }
        
        // validate image datatype
        $datatypeAllowed = ['jpg', 'jpeg', 'png'];
        $fileExtention = explode('.', $filenames);
        $fileExtention = strtolower(end($fileExtention));

        if( !in_array($fileExtention, $datatypeAllowed) ):
            echo "<script> 
                alert('file yang anda masukkan tidak sesuai')
                </script>";
            return false;
        endif;    
    
    // file pass the selection, next ready to upload
    move_uploaded_file($tmpName, '../resource_mobile/' . $filenames);
    return $filenames;
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
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off"  enctype="multipart/form-data">
              
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Penginapan</label>
                <input type="text" class="form-control" id="nama_penginapan" placeholder="Masukan Nama Penginapan" name="nama_penginapan" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" placeholder="Masukan Lokasi" name="lokasi" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Linkmaps</label>
                    <input type="text" class="form-control" id="linkmaps" placeholder="Masukan Linkmaps" name="linkmaps" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" placeholder="Masukan Telepon" name="telepon" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="gambar" name="gambar" required>
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