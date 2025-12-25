<?php

$host = "mysql-rauf.alwaysdata.net";
$user = "rauf_driving";
$password = "rauf123";
$database = "rauf_driving";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");