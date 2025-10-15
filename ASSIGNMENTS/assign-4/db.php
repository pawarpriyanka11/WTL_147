<?php
$host = "127.0.0.1";
$user = "root";     // XAMPP default user
$pass = "";         // XAMPP default password is empty
$db   = "student_db";
$port = 4306;

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
