<?php
$servername = "vconroy.cs.uleth.ca";
$username = "jacj3660";
$password = "tznigy";
$dbname = "jacj3660";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>