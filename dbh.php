<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "thinktank";

//Create connection
$connection = new mysqli($serverName, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";

?>