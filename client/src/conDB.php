<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "library_management_system";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "Connection failed!";
}
