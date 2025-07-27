<?php
// Database connection script
$host = "localhost";
$db = "electricitybillingsystem";
$user = "root";
$password = "";
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>