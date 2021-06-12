<?php
$servername = "remotemysql.com";
$username = "ML7FyYXtyJ";
$password = "0YTiiv12RO";
$database = "ML7FyYXtyJ";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
