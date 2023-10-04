<?php  
require "functions.php";

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tabelakunstyle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
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
</body>
</html>