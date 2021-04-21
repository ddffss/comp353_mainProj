<?php
$servername = "hec353.encs.concordia.ca";
$username = "hec353_4";
$password = "e3HkA577";
$database = "hec353_4";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
