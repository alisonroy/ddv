<?php
require "config.php";
$name = $_POST["username"];
$auth_token = $_POST["auth_token"];
$answer = $_POST["answer"];
$answer_no = $_POST["answer_no"];

$check =  "SELECT auth_token FROM `STRTjSSGl1`.`user_details` WHERE username = '$name'";
$tab = $conn->query($check);
$row = mysqli_fetch_assoc($tab);
if ($row['auth_token'] == $auth_token) {
    $ans_check =  "SELECT $answer_no FROM `STRTjSSGl1`.`user_details` WHERE username = 'admin'";
    $ans_tab = $conn->query($ans_check);
    $ans_row = mysqli_fetch_assoc($ans_tab);
    if ($ans_row['answer1'] == $answer) {
        $updt = "UPDATE `STRTjSSGl1`.`user_details` SET `$answer_no` = '$answer' WHERE (`username` = '$name');";
        $conn->query($updt);
        $arr = ["sub", "comp", "mons", "map", "net", "bermuda"];
        echo json_encode($arr[((int)$answer_no[6]) - 1]);
    }
} else {
    echo json_encode("false");
}
