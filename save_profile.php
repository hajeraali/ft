<?php
session_start();

if (isset($_SESSION["user_id"])) {
  $mysqli = require __DIR__ . "/db.php";

  // Assuming you have added "name" attributes to your form fields
  $username = $_POST['inputUsername'];
  $firstName = $_POST['inputFirstName'];
  $lastName = $_POST['inputLastName'];
  $gender = $_POST['inputGender'];
  $location = $_POST['inputLocation'];
  $email = $_POST['inputEmailAddress'];
  $phone = $_POST['inputPhone'];
  $birthday = $_POST['inputBirthday'];
  $age = $_POST['inputAge'];
  $bmi = $_POST['inputBMI'];
  $height = $_POST['inputHeight'];
  $weight = $_POST['inputWeight'];

  $sql = "INSERT INTO user_profile (first_name, last_name, gender, location, phone, 
        birthday, age, bmi, height, weight) VALUES ( ? ? ? ? ? ? ? ? ? ?)";

    if ($mysqli->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $mysqli->error;
    }
}


