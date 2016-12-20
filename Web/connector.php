<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn =mysql_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
?>