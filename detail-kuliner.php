<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styleindex.css">
  <link rel="stylesheet" href="stylecss/dashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar Start -->
<?php include("navbar.php"); ?>
  <!-- Navbar End -->
  <div class="container pt-5 pt-5 mt-5">
  <?php
  // Assuming you have a database connection established

  
  
  
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  if(!$conn){
      die("error : " . mysqli_error($conn));
  }
  // Fetch data from the informasi_wisata table
  $sql = "SELECT * FROM informasi_kuliner";
  $result = $conn->query($sql);

  // Display each row as a card
  while ($row = $result->fetch_assoc()) {
    ?>
    <div class="card rounded mb-3 p-md-3 cardfillcolor">
            <div class="row g-0 align-items-center">
              <div class="col-md-4 d-flex align-items-center justify-content-center image-container-cover">
                <img src="resource_mobile/<?=$row['gambar']?>" class="gambar-cover img-fluid align-self-center" alt="cover-image">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">nama:</h5>
                  <p class="card-text"><?=$row['nama_kuliner'];?></p>
                  <h5 class="card-title">lokasi:</h5>
                  <p class="card-text"><?=$row['lokasi'];?></p>
                  <h5 class="card-title">deskripsi:</h5>
                  <p class="card-text"><?=$row['deskripsi'];?></p>
                </div>
              </div>
            </div>
          </div>
          <?php
  }

  // Close the database connection
  $conn->close();
  ?>
  </div>
</body>
</html>