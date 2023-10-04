<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "nganjukvisit";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("error : " . mysqli_error($conn));
}

?>