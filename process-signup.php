<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (empty($_POST["username"])){
    die("Name is required");
}

if( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if(strlen($_POST["password"])<8){
    die("Password must be at least 8 characters long.");
}

if(! preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain atleast one letter");
}

if(! preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain atleast one number ");
}
 $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/db.php";


// Check if the email already exists in the database
$check_sql = "SELECT COUNT(*) FROM users WHERE email = ?";
$check_stmt = $mysqli->prepare($check_sql);
$check_stmt->bind_param("s", $_POST["email"]);
$check_stmt->execute();
$check_stmt->bind_result($email_count);
$check_stmt->fetch();
$check_stmt->close();

if ($email_count > 0) {
    die("Email is already taken");
}

$sql = "INSERT INTO users (username, email, password_hash) 
        VALUES (?,?,?)";

$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["username"], $_POST["email"], $password_hash);

if ($stmt->execute()) {
    header("Location: successful-signup.html");
}
else {
    if ($mysqli->errno === 1062){
        die("email already taken");
    }
    die($mysqli->error . " " . $mysqli->errno);
}


