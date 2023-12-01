<?php

include "../../koneksi.php";

$sqlquery = "SELECT * FROM session ORDER BY id_session DESC";
$result = mysqli_query($conn, $sqlquery);

if (mysqli_num_rows($result) > 0) {
  // echo "berhasil mengambil data";
} else{
  die ("error"); 
}

$conn -> close();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Session</title>
  </head>
  <body>
    
    <div class="container-fluid p-3">

      
      <table class="table table-striped">
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
              <th>
                <?= $no?>
              </th>
              <td>
                <?=$iduser?>
              </td>
              <td>
                <?=$devicetoken ?>
              </td>
              <td>
              <a href="form_kirim.php?device_token=<?php echo $devicetoken ?>&id_user=<?php echo $iduser?>">
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