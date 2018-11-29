<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "thinktank";

//Create connection
$connection = new mysqli($serverName, $username, $password, $dbName);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

//echo "Connected successfully";

?>