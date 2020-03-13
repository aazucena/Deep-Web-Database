<?php
session_start();
$host = "vconroy.cs.uleth.ca";
$username = "jacj3660";
$password = "tznigy";
$dbname = "jacj3660";
$conn = mysqli_connect($host, $username, $password, $dbname);
if($conn -> connect_error) {
 die('Could not connect: ' . mysql_error());
}

?>
