<?php
require "config.php";
$name = $_POST["username"];
$auth_token = $_POST["auth_token"];
$check =  "SELECT auth_token FROM `STRTjSSGl1`.`user_details` WHERE username = '$name'";
$tab = $conn->query($check);
$row = mysqli_fetch_assoc($tab);
if ($row['auth_token'] == $auth_token) {
    echo json_encode("success");
} else {
    echo json_encode("false");
}
