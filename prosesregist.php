<?php

// validator
function validateEmail($email) {
    // Gunakan filter_var() dengan FILTER_VALIDATE_EMAIL untuk memeriksa apakah email valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
function validatePassword($password) {
    // Tentukan kriteria validasi kata sandi
    $minLength = 8;
    $hasUppercase = preg_match('/[A-Z]/', $password);
    $hasLowercase = preg_match('/[a-z]/', $password);
    $hasNumber = preg_match('/[0-9]/', $password);

    // Cek apakah kata sandi memenuhi semua kriteria
    if (strlen($password) >= $minLength && $hasUppercase && $hasLowercase && $hasNumber) {
        return true;
    } else {
        return false;
    }
}
function validateUsername($username) {
    $minLength = 6;
    $maxLength = 20;
    
    if (strlen($username) >= $minLength && strlen($username) <= $maxLength) {
        return true;
    } else {
        return false;
    }
}
function validateFullname($fullname) {
    $minLength = 2;
    $maxLength = 50;

    if (strlen($fullname) >= $minLength && strlen($fullname) <= $maxLength) {
        return true;
    } else {
        return false;
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){                    // untuk menendang pengguna
    echo "NOT FOUND 404, you mean register.php ?";
}
if(isset($_POST["daftar"])){
    session_start();
    
    include "koneksi.php"; 
    
    $numquery = "SELECT max(id_user) as kodeTerbesar FROM user";
    $hasil = mysqli_query($conn, $numquery);
    $datas = mysqli_fetch_array($hasil);
     
    $maxcode = $datas['kodeTerbesar'];
    $urutan = (int) substr($maxcode, 1, 7);
    $urutan++;
    $huruf = "U";
    $kodee = $huruf . $urutan;
    
    global $conn;
    $username = htmlspecialchars($_POST["userusername"]);
    $password = $_POST["userpwd"];
    $email = htmlspecialchars($_POST["useremail"]); 
    $fullname = htmlspecialchars($_POST["userfullname"]);
    $alamat = htmlspecialchars($_POST["useralamat"]);
    $notelp = htmlspecialchars($_POST["usernotelp"]);
    
    // password encrypt
    $epassword = password_hash($password, PASSWORD_BCRYPT);
    
    // check username is available
    $ruser = mysqli_query($conn, "SELECT username FROM user WHERE email = '$email' OR username = '$username' LIMIT 1");
    
    if ( mysqli_fetch_assoc($ruser) ) {
        $_SESSION["registersuccess"] = "0";
        echo "<script>window.history.back();</script>";
        exit();
    }else {

        if(!validateEmail($email)) {
            $_SESSION["validator"] = "inv_email"; 
            echo "<script>window.history.back();</script>";
            exit();
        }
        else if(!validatePassword($password)) {
            $_SESSION["validator"] = "inv_pwd"; 
            echo "<script>window.history.back();</script>";
            exit();    
        }
        else if(!validateUsername($username)) {
            $_SESSION["validator"] = "inv_usrname";
            echo "<script>window.history.back();</script>";
            exit();    
        }
        else if(!validateFullname($fullname)) {
            $_SESSION["validator"] = "inv_fullname";
            echo "<script>window.history.back();</script>";
            exit();    
        }
        else {
            mysqli_query($conn, "INSERT INTO user (id_user, level, username, fullname, alamat, no_telepon, email, kata_sandi)VALUES ('$kodee', 'ADMIN', '$username', '$fullname', '$alamat', '$notelp', '$email','$epassword')");
            $_SESSION["registersuccess"] = "1";
            header("Location: loginnew.php");
            exit();
        }
        
    }
    
    $conn->close();

}

?>