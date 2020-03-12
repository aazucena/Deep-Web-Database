<?php
include 'login.php';

$sql = "INSERT INTO Clients (email, username, passwd)
VALUES ('john@example.com', 'Doe', 'TESTPASS')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>