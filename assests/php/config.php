<?php

header('Access-Control-Allow-Origin: *');
error_reporting(0);

$server = "remotemysql.com";
$username = "STRTjSSGl1";
$password = "l3lrCnqDoF";
$db = "STRTjSSGl1";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";