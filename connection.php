<?php
// Database configuration
$host = 'localhost';      // or the database server hostname
$username = 'root';       // your MySQL username
$password = '';           // your MySQL password
$database = 'excel_sheets'; // the name of your database

// Create connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>
