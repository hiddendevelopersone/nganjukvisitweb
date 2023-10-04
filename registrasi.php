<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="registrasistyle.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg" style="  background-color: #D9D9D9;">
        <div class="container-fluid">
         <img src="gambar/Seal_of_Nganjuk_Regency 1.png" alt="" style="width: 70px; height: 70px; margin-left: 20px; margin-top: 12px; margin-right: 20px;">
         <img src="gambar/Pesona-Indonesia-Logo 1.png" alt="" style="margin-right: 200px;">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02"
            aria-expanded="false"
            aria-label="Toggle navigation"
            style="margin-top: 0px; background-color: white; color-scheme: #000000;"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
              <li class="nav-item">
                <a class="nav-link " href="aktivitas.html" >Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Wisata
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kuliner
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" >Offers</a>
              </li>
            </ul>
            <button type="button" class="btn btn-primary">login admin</button>
            </a>
            </form>
          </div>
        </div>
      </nav>
      <div class="global-container">
        <div class="card registrasi-form">
          <div class="card-body">
            <h1 class="card-title text-center"></h1>
          </div>
          <div class="card-text">
            <form action="prosesregist.php" method="post">
              <div class="mb-3">
                <label for="userusername" class="form-label">Username</label>
                <input type="username" class="form-control" id="userusername" name="userusername">
                
              </div>
              <div class="mb-3">
                <label for="userfullname" class="form-label">FullName</label>
                <input type="text" class="form-control" id="userfullname" name="userfullname">
              </div>
              <div class="mb-3">
                <label for="userpwd" class="form-label">Password</label>
                <input type="password" class="form-control" id="userpwd" name="userpwd">
              </div>
              <div class="mb-3">
                <label for="useremail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="useremail" name="useremail">
                
              </div>
              <div class="mb-3">
                <label for="useralamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="useralamat" name="useralamat">
              </div>  
              <div class="mb-3">
                <label for="usernotelp" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="usernotelp" name="usernotelp">
              </div>  
              <button type="submit" class="btn btn-primary">Sign Up</button>
             
            </form>
          </div>
        </div>
      </div> 
</body>
</html>