<?php
require "config.php";
$name = $_POST["username"];
$auth_token = $_POST["auth_token"];
$password = hash('sha256', $_POST["password"]);
$check =  "SELECT password , auth_token FROM `STRTjSSGl1`.`user_details` WHERE username = '$name'";
$tab = $conn->query($check);
while ($row = $tab->fetch_assoc()) {
    if ($row['password'] == $password) {
        if ($row['auth_token'] == NULL) {
            date_default_timezone_set('Asia/Kolkata');
            $time = date('Y-m-h H:i:s');
            $auth_token = uniqid();
            $updt = "UPDATE `STRTjSSGl1`.`user_details` SET `auth_token` = '$auth_token', `login_time` = '$time' WHERE (`username` = '$name');";
            echo ($updt);
            $conn->query($updt);
            echo json_encode($auth_token);
        } elseif ($row['auth_token'] === $auth_token) {
            echo json_encode("success");
        } else {
            echo json_encode("failed");
        }
    } else {
        echo json_encode("false");
    }
}
