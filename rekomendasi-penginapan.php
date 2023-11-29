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

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "nganjukvisit";
  
  
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  if(!$conn){
      die("error : " . mysqli_error($conn));
  }
  // Fetch data from the informasi_wisata table
  $sql = "SELECT * FROM informasi_penginapan";
  $result = $conn->query($sql);

  // Display each row as a card
  while ($row = $result->fetch_assoc()) {
    echo '<div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="gambar/download.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">' . $row['nama_penginapan'] . '</h5>
                  <p class="card-text">' . $row['lokasi'] . '</p>
                  <p class="card-text">' . $row['linkmaps'] . '</p>
                  <p class="card-text"><small class="text-muted">Last updated ' . $row['deskripsi'] . '</small></p>
                </div>
              </div>
            </div>
          </div>';
  }

  // Close the database connection
  $conn->close();
  ?>
  </div>
</body>
</html>