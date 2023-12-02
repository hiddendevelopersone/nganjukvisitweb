<?php

require '../../koneksi.php';
require '../../controllers/notif/Notification.php';

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
        }else {
            echo "<script>alert('gagal mengirim notifikasi')</script>";
        }
    } else {
        echo "<script>alert('gagal mengirim notifikasi2')</script>";
    }
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container p-3">
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
              
              <div class="mb-3">
                  <label for="judul" class="form-label">Title / Judul</label>
              <input type="text" class="form-control" id="judul" placeholder="Masukan Judul Notifikasi" name="judul" autofocus required>
              </div>
              <div class="mb-3">
                  <label for="badan" class="form-label">Body / Pesan</label>
                  <input type="text" class="form-control" id="badan" placeholder="Masukan Pesan" name="badan" required>
              </div>
              <div class="mb-3">
                  <label for="detoken" class="form-label">Device Token</label>
                  <input type="text" class="form-control" id="detoken" placeholder="Masukan Token" value="<?=$getdevtoken?>" name="detoken" disabled>
              </div>
              <div class="col-12">
                  <input type="submit" name="kirim" value="kirim notif" class="btn btn-primary" required>
              </div>
              </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>