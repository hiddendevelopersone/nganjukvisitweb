<?php
include('../koneksi.php');

$sqlquery = "SELECT * FROM informasi_wisata";
$result = $conn->query($sqlquery);

$rows= [];
while($row = mysqli_fetch_assoc($result)){
  $rows[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Wisata</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <!-- <th scope="col">Gambar</th> -->
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Harga</th>
                <th scope="col">Coordinate</th>
                <th scope="col">Jadwal</th>
                <th scope="col">Link Maps</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ( $rows as $lastresult ) : ?>
              <tr>
                <th scope="row"><?=$i?></th>
                <!-- <td>Mark</td> -->
                <td><?= $lastresult["nama_wisata"];?></td>
                <td><?= $lastresult["alamat"];?></td>
                <td><?= $lastresult["harga_tiket"];?></td>
                <td><?= $lastresult["coordinate"];?></td>
                <td><?= $lastresult["jadwal"];?></td>
                <td><?= $lastresult["linkmaps"];?></td>
                <td>
                  <div class="d-inline-flex">
                    <a href="../utility/delete.php?id_wisata=<?= $lastresult['id_wisata'] ?>">
                    <div class="btn btn-primary mr-1">Edit</div></a>
                    <div class="btn btn-danger">Hapus</div>
                  </div>
                </td>
              </tr>
              <?php 
              $i++;
              endforeach;
              ?>
            </tbody>
          </table>

    </div>
</body>
</html>