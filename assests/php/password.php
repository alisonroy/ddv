<?php
require "config.php";
$name = $_POST["username"];
$password = hash('sha256', $_POST["password"]);
$check =  "SELECT password , auth_token,login_time FROM `STRTjSSGl1`.`user_details` WHERE username = '$name'";
$tab = $conn->query($check);
$row = mysqli_fetch_assoc($tab);
if ($row['password'] == $password) {
    if ($row['auth_token'] == NULL and $row['login_time'] == NULL) {
        date_default_timezone_set('Asia/Kolkata');
        $time = date('Y-m-h H:i:s');
        $auth_token = hash("sha256", rand());
        $updt = "UPDATE `STRTjSSGl1`.`user_details` SET `auth_token` = '$auth_token', `login_time` = '$time' WHERE (`username` = '$name');";
        $conn->query($updt);
        echo json_encode($auth_token);
    } else {
        $auth_token = hash("sha256", rand());
        $updt = "UPDATE `STRTjSSGl1`.`user_details` SET `auth_token` = '$auth_token' WHERE (`username` = '$name');";
        $conn->query($updt);
        echo json_encode($auth_token);
    }
} else {
    echo json_encode("false");
}
