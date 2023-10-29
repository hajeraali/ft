<?php

$host = "localhost:3308";
$database = "login_db";
$username = "root";
$password = " ";

// Create connection

$mysqli = new mysqli($host, $username, $password, $database);

if($mysqli->connect_errno){
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
