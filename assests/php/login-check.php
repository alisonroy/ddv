<?php
require "config.php";
$name = $_POST["username"];

$check =  "EXISTS(SELECT username FROM `STRTjSSGl1`.`user_details` WHERE username = '$name')";
$condition = $conn->query("SELECT " . $check . ";");
$check_array = $condition->fetch_assoc();
if ($check_array[$check] == 1) {
    echo json_encode("success");
} else {
    echo json_encode("false");
}
