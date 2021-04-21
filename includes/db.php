<?php
$servername = "127.0.0.1";
$username = "root";
$password = "sql12345";
$database = "comp353";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
