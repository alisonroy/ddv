<?php
require "config.php";
$name = $_POST["username"];
$auth_token = $_POST["auth_token"];
$check =  "SELECT auth_token,answer1,answer2,answer3,answer4,answer5,answer6,finish_time,time_elapsed,login_time FROM `STRTjSSGl1`.`user_details` WHERE username = '$name'";
$tab = $conn->query($check);
$row = mysqli_fetch_assoc($tab);
if ($row['auth_token'] == $auth_token) {
    if ($row["finish_time"] == NULL) {
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
            date_default_timezone_set('Asia/Kolkata');
            $time = date('Y-m-d H:i:s');
            $date1 = strtotime($time);
            $date2 = strtotime($row["login_time"]);
            $minutes = round((abs($date2 - $date1)) / 60, 2);
            $updt = "UPDATE `STRTjSSGl1`.`user_details` SET `time_elapsed` = '$minutes', `finish_time` = '$time' WHERE (`username` = '$name');";
            $conn->query($updt);
            echo json_encode("finished");
        }
    } else {
        echo json_encode("success");
    }
} else {
    echo json_encode("false");
}
