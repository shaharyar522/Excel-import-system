<?php
$servername = "localhost"; // or "127.0.0.1"
$username = "root";        // default username for local XAMPP/WAMP
$password = "";            // default password is empty for local
$dbname = "excel";         // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
