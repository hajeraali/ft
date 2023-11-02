<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$locat = $_POST["location"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];
$age = $_POST["age"];
$bmi = $_POST["bmi"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$check = $_POST["agree"];

if (!isset($check)) {
    // Data has been received and stored.
    // Perform further operations as required.
    echo "You need to agree to the terms and conditions to proceed.";
}
else {
    $host = "localhost:3308";
    $database = "sem5";
    $username = "root";
    $password = " ";
    // Create connection
    $conn = mysqli_connect($host, $username, $password, $database);

    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO users_profile(fname, lname, gender, locat, phone, dob, age, bmi, height, weight) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    
    if ( ! mysqli_stmt_prepare($stmt, $sql)) {
     
        die(mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($stmt, "ssssisiiii",
    $fname, $lname, $gender, $locat, $phone, $dob, $age, $bmi, $height, $weight);
        if (mysqli_stmt_execute($stmt)) {
            echo "Record saved!";
        } else {
            die("Error inserting data: " . mysqli_error($conn));
        }
}
        


