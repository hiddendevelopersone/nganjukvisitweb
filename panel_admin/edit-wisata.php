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

$id = $_GET["id_wisata"];
$sqlquery = "SELECT * FROM informasi_wisata where id_wisata = '$id'";

$rows = [];
$result = mysqli_query($conn, $sqlquery);

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

if(isset($_POST["simpan"])) {
    $nama_wisata = $_POST['nama_wisata'];
    $alamat = $_POST['alamat'];
    $harga_tiket = $_POST['harga_tiket'];
    $jadwal = $_POST['jadwal'];
    $coordinate = $_POST['coordinate'];
    $linkmaps = $_POST['linkmaps'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = upload();

    $sqlquerySimpan = "UPDATE `informasi_wisata` SET `nama_wisata`='$nama_wisata',`id_user`='U1000001',`deskripsi`='$deskripsi',`alamat`='$alamat',`harga_tiket`='$harga_tiket',`jadwal`='$jadwal',`gambar`='$gambar',`coordinate`='$coordinate',`linkmaps`='$linkmaps' WHERE id_wisata='$id'";
    $result = mysqli_query($conn, $sqlquerySimpan);

    if($result) {
        $_SESSION["notifikasiedit"] = "1";
        // echo "<script>alert('Data Berhasil Disimpan')</script>";
        header("Location: informasi-wisata.php");
    }else {
        $_SESSION["notifikasiedit"] = "0";
        echo "<script>alert('Data Gagal Diperbarui')</script>";
    }

    $conn->close();

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
$conn->close();
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
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off" enctype="multipart/form-data">
              
                <div class="mb-3">
        <label for="nama_wisata" class="form-label">Nama Wisata</label>
        <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" value="<?= $rows[0]["nama_wisata"];?>">
        </div>
        <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $rows[0]["alamat"];?>">
        </div>
        <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga_tiket" value="<?= $rows[0]["harga_tiket"];?>">
        </div>
        <div class="mb-3">
        <label for="coordinate" class="form-label">Coordinate</label>
        <input type="text" class="form-control" id="coordinate" name="coordinate" value="<?= $rows[0]["coordinate"];?>">
        </div>
        <div class="mb-3">
        <label for="jadwal" class="form-label">Jadwal</label>
        <input type="text" class="form-control" id="jadwal" name="jadwal" value="<?= $rows[0]["jadwal"];?>">
        </div>
        <div class="mb-3">
        <label for="linkmaps" class="form-label">Link Maps</label>
        <input type="text" class="form-control" id="linkmaps" name="linkmaps" value="<?= $rows[0]["linkmaps"];?>">
        </div>
        <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"><?= $rows[0]["deskripsi"];?></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="gambar" name="gambar" value="<?=$row[0]["gambar"];?>" >
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