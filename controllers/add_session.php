<?php

include "../koneksi.php";

$email = $_POST["email"];
$deviceToken = $_POST['device_token'];

$sqlcheck = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

$result = $conn->query($sqlcheck);

if (mysqli_num_rows($result) > 0) {

    $datauser = mysqli_fetch_assoc($result);
    $sql = "INSERT INTO session VALUES ('','" .$datauser['id_user']. "', '$deviceToken')";

    $result1 = $conn -> query($sql);

    if ($result1) {
        $response = array('status' => 'success', 'message' => 'Success Add to Session');
    } else {
        $response = array('status' => 'fail', 'message' => 'Failed');
    }
    
} else {
    $response = array('status' => 'fail2', 'message' => 'Fail Get User');
}

$conn -> close();

echo json_encode($response);

?>