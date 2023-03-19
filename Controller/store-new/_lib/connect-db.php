<?php

$host_name = "localhost";
$user_name = "root";
$password = "";
$db = "salesachieved";

$conn = new mysqli($host_name, $user_name, $password, $db);

if ($conn->connect_error) {
    die("Unable to connect to database due to an error: " . $conn->connect_error);
}
