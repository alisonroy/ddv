<?php
require "config.php";
$name = $_POST["username"];
$auth_token = $_POST["auth_token"];
$answer = (int)$_POST["answer"];
$answer_no = $_POST["answer_no"];

$check =  "SELECT auth_token FROM `STRTjSSGl1`.`user_details` WHERE username = '$name'";
$tab = $conn->query($check);
$row = mysqli_fetch_assoc($tab);
if ($row['auth_token'] == $auth_token) {
    $ans_check =  "SELECT $answer_no FROM `STRTjSSGl1`.`user_details` WHERE username = 'admin'";
    $ans_tab = $conn->query($ans_check);
    $ans_row = mysqli_fetch_assoc($ans_tab);
    if ($answer_no == "answer2") {
        if (($ans_row[$answer_no] - 5 < $answer) and ($ans_row[$answer_no] + 5 > $answer)) {
            $updt = "UPDATE `STRTjSSGl1`.`user_details` SET `$answer_no` = '$answer' WHERE (`username` = '$name');";
            $conn->query($updt);
            echo json_encode("mons");
        } else {
            echo json_encode("wrong");
        }
    } elseif ($answer_no == "answer3") {
        $ans = explode("-", $ans_row[$answer_no]);
        if (($ans[0] == $answer) or ($ans[1] == $answer)) {
            $updt = "UPDATE `STRTjSSGl1`.`user_details` SET `$answer_no` = '$answer' WHERE (`username` = '$name');";
            $conn->query($updt);
            echo json_encode("mons");
        } else {
            echo json_encode("wrong");
        }
    } else {
        if ($ans_row[$answer_no] == $answer) {
            $updt = "UPDATE `STRTjSSGl1`.`user_details` SET `$answer_no` = '$answer' WHERE (`username` = '$name');";
            $conn->query($updt);
            $arr = ["comp", "mons", "map", "net", "bermuda", "credit"];
            echo json_encode($arr[((int)$answer_no[6]) - 1]);
        } else {
            echo json_encode("wrong");
        }
    }
} else {
    echo json_encode("false");
}
