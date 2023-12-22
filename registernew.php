<?php
session_start();

if (isset($_SESSION["registersuccess"])) {
  if($_SESSION["registersuccess"] == "0"){
    echo "<script>alert('registrasi gagal, email atau username ini sudah terdaftar!')</script>";
  }
  unset($_SESSION["registersuccess"]);
}
if (isset($_SESSION["validator"])) {
  if($_SESSION["validator"] == "inv_email"){
    echo "<script>alert('email invalid')</script>";
  }else if($_SESSION["validator"] == "inv_pwd"){
    echo "<script>alert('invalid, password harus menggunakan kombinasi huruf besar, kecil dan angka dan minimal harus 8 karakter')</script>";
  }else if($_SESSION["validator"] == "inv_usrname"){
    echo "<script>alert('invalid, username minimal harus 6 karakter maksimal 20 karakter')</script>";
  }else if($_SESSION["validator"] == "inv_fullname"){
    echo "<script>alert('invalid, username minimal harus 2 karakter maksimal 50 karakter')</script>";
  }
  unset($_SESSION["validator"]);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Register Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss/styleregist.css">

    </head>
  <body>
    <img class="img-bg" src="gambar/sedudobg.jpg" alt="bgimage">
    <div class="background-overlay"></div>
    <section class="wrapper">
        <div class="container-fluid bg-light kontenbox">
            <div class="row">
                <div class="col-sm-4">
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
                <div class="col-sm-8 bg-light">
                    <div class="leftcontent">
                        <form action="prosesregist.php" method="POST">
                            <div class="form-group">

                                <div class="d-flex justify-content-between">
                                    <div class="container pl-0 mr-2">
                                        <label for="userusername">Username</label>
                                    </div>
                                    <div class="container pl-0">
                                        <label for="userfullname">Nama</label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                  <input type="text" class="form-control mr-2" id="userusername" name="userusername" placeholder="Masukkan username" required>
                                  <input type="text" class="form-control" id="userfullname" name="userfullname" placeholder="Masukkan nama" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="d-flex justify-content-between">
                                  <div class="container pl-0 mr-2">
                                    <label for="useremail">Email</label>
                                  </div>
                                  <div class="container pl-0">
                                    <label for="usernotelp">No. Telepon</label>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <input type="text" class="form-control mr-2" id="useremail" name="useremail" placeholder="Masukkan email" required>
                                  <input type="text" class="form-control" id="usernotelp" name="usernotelp" placeholder="Masukkan nomor telepon" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="useralamat">Alamat</label>
                                <textarea class="form-control" id="useralamat" name="useralamat" placeholder="Masukkan alamat" required></textarea>
                              </div>  
                            <div class="form-group mb-4">
                              <label for="userpwd">Password</label>
                              <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="Masukkan password" required>
                            </div>
                            <div class="container pr-0">
                              <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary align-items-right" name="daftar">Daftar</button>
                              </div>
                            </div>
                          
                          </form>
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