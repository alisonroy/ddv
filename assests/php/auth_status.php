<?php
require "config.php";
$name = $_POST["username"];
$auth_token = $_POST["auth_token"];
$page_check = $_POST["page_check"];
$check =  "SELECT auth_token,answer1,answer2,answer3,answer4,answer5,answer6 FROM `STRTjSSGl1`.`user_details` WHERE username = '$name'";
$tab = $conn->query($check);
$row = mysqli_fetch_assoc($tab);
if ($row['auth_token'] == $auth_token) {
    if ($page_check == "true") {
        if ($row['answer1'] == NULL) {
            echo json_encode("/sub.html");
        } elseif ($row['answer2'] == NULL) {
            echo json_encode("/comp.html");
        } elseif ($row['answer3'] == NULL) {
            echo json_encode("/mons.html");
        } elseif ($row['answer4'] == NULL) {
            echo json_encode("/map.html");
        } elseif ($row['answer5'] == NULL) {
            echo json_encode("/net.html");
        } elseif ($row['answer6'] == NULL) {
            echo json_encode("/bermuda.html");
        } else {
            echo json_encode("/credit.html");
        }
    } else {
        echo json_encode("success");
    }
} else {
    echo json_encode("false");
}
