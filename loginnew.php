<?php

if(isset($_SESSION["loginundefined"])) {
  echo "<script>alert('email atau password tidak cocok')</script>";
  unset($_SESSION["loginundefined"]);
}
if(isset($_SESSION["registersuccess"])) {
  if($_SESSION["registersuccess"] = "1") {
    echo "<script>alert('akun anda berhasil dibuat, wkwwkwk')</script>";
  }
  unset($_SESSION["registersuccess"]);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Login Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss/stylelogin.css">

    </head>
  <body>
    <img class="img-bg" src="gambar/sedudobg.jpg" alt="bgimage">
    <div class="background-overlay"></div>
    <section class="wrapper">
        <div class="container-fluid bg-light kontenbox">
            <div class="row">
                <div class="col-sm-7 bg-light">
                    <div class="leftcontent">
                        <div class="judul font-weight-bold">Welcome To Nganjuk Visit</div>
                        <p>Welcome Back Admin, Please Login to Your Account</p>
                        <form action="proseslogin.php" method="POST">
                            <div class="form-group">
                              <label for="useremail">Email</label>
                              <input type="text" class="form-control" id="useremail" name="useremail" placeholder="Enter email" required>
                            </div>
                            <div class="form-group mb-4">
                              <label for="userpwd">Password</label>
                              <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="Enter Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2" name="login">Login</button>
                            <a href="registernew.php">
                              <div class="btn btn-outline-primary">sign up</div>
                            </a>
                          </form>
                    </div>
                </div>
                <div class="col-sm-5">
                  <div class="rightcontent">
                    <div class="container-fluid">
                      <div class="container text-center">
                        <div class="d-flex align-items-center justify-content-center pr-2 mt-5">
                          <img src="gambar/location.png" id="iconlogos" alt="Icon" class="mr-2">
                          <H1>NGANJUKVISIT</H1>
                        </div>
                          <p>Explore the World,</p>
                          <p>One Destination at a Time</p>
                          <img src="gambar/image_logos.png" id="illus" alt="ilustration image">
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>