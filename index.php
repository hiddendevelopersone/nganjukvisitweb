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
  <!-- Mashead header-->
  <header class="masthead">
    <div class="container px-5">
      <div class="row gx-5 align-items-center">
        <div class="col-lg-6">
          <!-- Mashead text and app badges-->
          <div class="mb-5 mb-lg-0 text-center text-lg-start">
            <h1 class="display-1 lh-1 mb-3">VISIT NGANJUK THE WIND CITY</h1>
            <p class="lead fw-normal text-muted mb-5">Nganjuk Explore memberikan pengalaman tak terlupakan dalam
              menjelajahi destinasi wisata di Kabupaten Nganjuk.</p>
            <div class="d-flex flex-column flex-lg-row align-items-center">
              <img src="gambar/Mobile app store badge.png" class="app-badge img-fluid" alt="..." />
              <!-- <a href=""><img class="app-badge img-fluid" src="gambar/Mobile app store badge.png" alt="..." /></a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <!-- Masthead device mockup feature-->

          <img src="gambar/Group 46.png" class="app-badge img-fluid" alt="Group" />
          <!-- <a class="me-lg-3 mb-4 mb-lg-0"><img class="app-badge" src="gambar/Group 46.png" alt="Group" -->
          <!-- style="height: 500px;" /></a> -->
          <!-- <div class="screen bg-black"> -->
          <!-- PUT CONTENTS HERE:-->
          <!-- * * This can be a video, image, or just about anything else.-->
          <!-- * * Set the max width of your media to 100% and the height to-->
          <!-- * * 100% like the demo example below.-->
          <!-- <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%"><source src="assets/img/demo-screen.mp4" type="video/mp4" /></video> -->
          <!-- </div> -->
        </div>
      </div>
    </div>

    </div>
    </div>
    </div>
  </header>
  <div class="main-container">


    <div class="container mt-5">
      <h5 class="judul-kategori">Category</h5>
      <div class="row text-center row-container" style="margin-left: 300px;">
        <div class="col-lg-2 col-md-3 col-sm-4 col-5" style="background-color: #FFFFFF;">
          <div class="menu-kategori">
            <a href="#wisata-populer"><img src="gambar/wisata.png" class="img-categori mt-3 "></a>
            <p>Wisata</p>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-5" style="background-color: #FFFFFF;">
          <div class="menu-kategori">
            <a href="#kuliner-populer"><img src="gambar/Kuliner.png" class="img-categori mt-3"></a>
            <p>Kuliner</p>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-5" style="background-color: #FFFFFF;">
          <div class="menu-kategori">
            <a href="#rekomendasi-penginapan"><img src="gambar/hotel.png" class="img-categori mt-3"></a>
            <p>Penginapan</p>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-5" style="background-color: #FFFFFF;">
          <div class="menu-kategori">
            <a href="#judul-event"><img src="gambar/event.png" class="img-categori mt-3"></a>
            <p>Event</p>
          </div>
        </div>
        <!-- <div class="col-lg-2 col-md-3 col-sm-4 col-5" style="background-color: #FFFFFF;">
          <div class="menu-kategori">
            <a href="#"><img src="gambar/shop.png" class="img-categori mt-3"></a>
            <p>Oleh-oleh</p>
          </div>
        </div> -->
      </div>

      <!--Awal carsoul-->
      <?php
      include "koneksi.php";
      // Assuming you have a database connection
      // $dbhost = "localhost";
      // $dbuser = "root";
      // $dbpass = "";
      // $dbname = "nganjukvisit";


      // $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      // if (!$conn) {
      //   die("error : " . mysqli_error($conn));
      // }

      // Fetch data from the database
      $sql = "SELECT * FROM informasi_wisata LIMIT 3";
      $result = $conn->query($sql);
      ?>


      <div class="m-5">
        <section id="wisata-populer">
          <h5 class="wisata-populer">Wisata Populer</h5>
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <?php
              $indicatorIndex = 0;
              while ($row = $result->fetch_assoc()) {
                $isActive = $indicatorIndex === 0 ? 'active' : '';
                ?>
                <button type="button" data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="<?php echo $indicatorIndex; ?>" class="<?php echo $isActive; ?>"
                  aria-label="Slide <?php echo $indicatorIndex + 1; ?>"></button>
                <?php
                $indicatorIndex++;
              }
              ?>
            </div>
            <div class="carousel-inner">
              <?php
              $itemIndex = 0;
              mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
              while ($row = $result->fetch_assoc()) {
                $isActive = $itemIndex === 0 ? 'active' : '';
                ?>
                <div class="carousel-item <?php echo $isActive; ?>">
                  <img src="resource_mobile/<?= $row['gambar'] ?>" class="gambar-cover img-fluid align-self-center"
                    alt="cover-image">
                </div>
                <?php
                $itemIndex++;
              }
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </section>
      </div>

      <?php
      // Close the database connection
      $conn->close();
      ?>

      <!--Awal carsoul-->
      <?php
      include "koneksi.php";
      // Assuming you have a database connection
      // $dbhost = "localhost";
      // $dbuser = "root";
      // $dbpass = "";
      // $dbname = "nganjukvisit";


      // $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      // if (!$conn) {
      //   die("error : " . mysqli_error($conn));
      // }

      // Fetch data from the database
      $sql = "SELECT * FROM informasi_kuliner Limit 3";
      $result = $conn->query($sql);
      ?>

      <section id="kuliner-populer">
        <div class="m-5">
          <h5 class="kuliner-populer">Kuliner Populer</h5>
          <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <?php
              $indicatorIndex = 0;
              while ($row = $result->fetch_assoc()) {
                $isActive = $indicatorIndex === 0 ? 'active' : '';
                ?>
                <button type="button" data-bs-target="#carouselExampleIndicators1"
                  data-bs-slide-to="<?php echo $indicatorIndex; ?>" class="<?php echo $isActive; ?>"
                  aria-label="Slide <?php echo $indicatorIndex + 1; ?>"></button>
                <?php
                $indicatorIndex++;
              }
              ?>
            </div>
            <div class="carousel-inner">
              <?php
              $itemIndex = 0;
              mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
              while ($row = $result->fetch_assoc()) {
                $isActive = $itemIndex === 0 ? 'active' : '';
                ?>
                <div class="carousel-item <?php echo $isActive; ?>">
                  <img src="resource_mobile/<?= $row['gambar'] ?>" class="gambar-cover img-fluid align-self-center"
                    alt="cover-image">
                </div>
                <?php
                $itemIndex++;
              }
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </section>

      <?php
      // Close the database connection
      $conn->close();
      ?>
      <!--Penginapan-->
      <div class="container">
        <?php
        // Assuming you have a database connection
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "nganjukvisit";

        // Create connection
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$conn) {
          die("error : " . mysqli_error($conn));
        }

        // Check connection
        
        // Assuming you have a query to retrieve data from the database
        $sql = "SELECT * FROM informasi_penginapan";
        $result = $conn->query($sql);

        // Assuming you want to display only the first row of data
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $card_title = $row["nama_penginapan"]; // Assuming "nama_penginapan" is the column in your table
          // $card_text = $row[""]; // Assuming "deskripsi_penginapan" is the column in your table
        } else {
          $card_title = "No data available";
          $card_text = "Please check back later";
        }

        $conn->close();
        ?>
        <!--Penginapan-->

        <?php
        include "koneksi.php";
        // Assuming you have a database connection
        // $dbhost = "localhost";
        // $dbuser = "root";
        // $dbpass = "";
        // $dbname = "nganjukvisit";

        // // Create connection
        // $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // if (!$conn) {
        //   die("error : " . mysqli_error($conn));
        // }

        // Assuming you have a query to retrieve data from the database
        $sql = "SELECT * FROM informasi_penginapan limit 3";
        $result = $conn->query($sql);

        // Assuming you want to display up to 4 rows of data
        $counter = 0;
        ?>
        <section id="rekomendasi-penginapan">
        <h5 class="rekomendasi-penginapan">Rekomendasi Penginapan</h5>
        
        <div class="row" style="border-radius: 20px; margin-left: -5px; margin-right: -5px;">
          <?php
          while ($row = $result->fetch_assoc() and $counter < 3) {
            $card_title = $row["nama_penginapan"]; // Assuming "nama_penginapan" is the column in your table
            // $card_text = $row[""]; // Assuming "deskripsi_penginapan" is the column in your table
            ?>
            <div class="col" style="padding-left: 5px; padding-right: 5px;">
              <div class="card h-200" style="border-radius: 10px">
                <img src="resource_mobile/<?= $row['gambar'] ?>" class="gambar-cover img-fluid align-self-center"
                  alt="cover-image">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo $card_title; ?>
                  </h5>
                  <!-- <p class="card-text"><?php echo $card_text; ?></p> -->
                </div>
              </div>
            </div>
            <?php
            $counter++;
          }
          ?>
        </div>
        <?php

        $conn->close();
        ?>

        <div class="mt-3">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="detail-penginapan.php">
              <button class="btn btn-primary me-md-2" style="border-radius: 20px;" type="button">Tampilkan Lebih
                Banyak</button></a>
          </div>
        </div>
        </section>
      </div>
      <!-- Event -->
      <!--Awal carsoul-->
      <?php
      include "koneksi.php";
      // Assuming you have a database connection
      // $dbhost = "localhost";
      // $dbuser = "root";
      // $dbpass = "";
      // $dbname = "nganjukvisit";


      // $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      // if (!$conn) {
      //   die("error : " . mysqli_error($conn));
      // }

      // Fetch data from the database
      $sql = "SELECT * FROM event limit 3";
      $result = $conn->query($sql);
      ?>

      <div class="m-5">
        <section id="judul-event">
        <h5 class="judul-event">Event</h5>
        <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <?php
            $indicatorIndex = 0;
            while ($row = $result->fetch_assoc()) {
              $isActive = $indicatorIndex === 0 ? 'active' : '';
              ?>
              <button type="button" data-bs-target="#carouselExampleIndicators2"
                data-bs-slide-to="<?php echo $indicatorIndex; ?>" class="<?php echo $isActive; ?>"
                aria-label="Slide <?php echo $indicatorIndex + 1; ?>"></button>
              <?php
              $indicatorIndex++;
            }
            ?>
          </div>
          <div class="carousel-inner">
            <?php
            $itemIndex = 0;
            mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
            while ($row = $result->fetch_assoc()) {
              $isActive = $itemIndex === 0 ? 'active' : '';
              ?>
              <div class="carousel-item <?php echo $isActive; ?>">
                <img src="resource_mobile/<?= $row['gambar'] ?>" class="gambar-cover img-fluid align-self-center"
                  alt="cover-image">
              </div>
              <?php
              $itemIndex++;
            }
            ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        </section>
      </div>

      <?php
      // Close the database connection
      $conn->close();
      ?>
    </div>
  </div>
</body>

</html>