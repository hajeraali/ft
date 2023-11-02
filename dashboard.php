<?php
  session_start();
  if (isset($_SESSION["user_id"])){

    $mysqli = require __DIR__ . "/db.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

      $result = $mysqli->query($sql);

      if ($result) {
          $user = $result->fetch_assoc();
      } else {
          // Handle the query error here, e.g., display an error message or log the error.
          echo "Error executing the SQL query: " . $mysqli->error;
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="user.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .btn-primary {
    width: 100%;
    color: #fff;
    background-color: #C27BA0;
    border-color: antiquewhite;
    margin-top: 10px;
    border-radius: 50px;
    
}
.navi .nav-links {
                  padding: 15px !important;
                  background-color: rgb(229, 222, 222) !important;
                  display: none;
                  position: absolute;
                  top: 100%;
                  left: 0;
                  border: 1px solid #ccc;
                  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
              }
</style>

<body>
    <section class="navi">
    <div class="menu-container">
        <button class="menu" onclick="toggleMenu()" aria-label="Main Menu">
            <svg width="50" height="auto" viewBox="0 0 100 100">
                <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                <path class="line line2" d="M 20,50 H 80" />
                <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
            </svg>
        </button>

        <!-- Navigation Links Container -->
        <div id="navLinks" class="nav-links">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.html">BMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="staymotivated.html">Motivation</a>
                  </li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">
                    Contact us</a></li>
                <li><a class="nav-link active" href="register.php">Login</a></li>
                <li><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                <li><a class="nav-link active" href="logout.php">Logout</a></li>
              </ul>
        </div>
        <div class="user-profile-icon" onclick="toggleDropdown()" 
        data-bs-toggle="dropdown" data-bs-target="#dropdownMenu">
          <img id="profileImageNavbar" src="images/pfpicon2.png" alt="User Profile">
          <div class="dropdown-menu">
              <!-- Dropdown menu options -->
              <ul>
                <li><a href="#">User Name</a></li>
                <li><a href="#">Edit Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
          </div>
      </div>
  </div>
</section>
<script type="text/javascript">
  function setProfileImageNavbar(imageSrc) {
      const profileImageNavbar = document.getElementById('profileImageNavbar');
      profileImageNavbar.src = imageSrc;
  }
  function toggleDropdown() {
    var dropdownMenu = document.querySelector('.dropdown-menu');
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
  }

  // Close the dropdown when clicking outside of it
  window.addEventListener('click', function (event) {
    if (!event.target.closest('.user-profile-icon')) {
      var dropdownMenu = document.querySelector('.dropdown-menu');
      dropdownMenu.style.display = 'none';
    }
  });
</script>

<!-- End Navbar Section-->
<section id="main">
<hr class="mt-4 mb-4">

<div class="row">
<div class="col-xl-4">

<div class="card mb-4 mb-xl-0">
<div class="card-header">Profile Picture</div>
<div class="card-body text-center">
    <img class="img-account-profile rounded-circle mb-2" src="images/pfpicon2.png" alt>
</div>
</div>
</div>
<!-- Image Upload Modal -->
<div class="modal fade" id="imageUploadModal" tabindex="-1" aria-labelledby="imageUploadModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="imageUploadModalLabel">Upload New Image</h5>
              <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!-- Place your image options here -->
              <div class="image-option" data-dismiss="modal" onclick="setProfileImage('images/pfpicon7.png'); 
                          setProfileImageNavbar('images/pfpicon7.png');">
                          <img src="images/pfpicon7.png" alt="Image 1"></div>
              <div class="image-option" data-dismiss="modal" onclick="setProfileImage('images/pfpicon1.png'); 
                          setProfileImageNavbar('images/pfpicon1.png');">
                          <img src="images/pfpicon1.png" alt="Image 2"></div>
              <div class="image-option" data-dismiss="modal" onclick="setProfileImage('images/pfpicon3.png'); 
                          setProfileImageNavbar('images/pfpicon3.png');">
                          <img src="images/pfpicon3.png" alt="Image 3"></div>
              <div class="image-option" data-dismiss="modal" onclick="setProfileImage('images/pfpicon4.png'); 
                          setProfileImageNavbar('images/pfpicon4.png');">
                          <img src="images/pfpicon4.png" alt="Image 4"></div>
              <div class="image-option" data-dismiss="modal" onclick="setProfileImage('images/pfpicon5.png'); 
                          setProfileImageNavbar('images/pfpicon5.png');">
                          <img src="images/pfpicon5.png" alt="Image 5"></div>
              <div class="image-option" data-dismiss="modal" onclick="setProfileImage('images/pfpicon6.png'); 
                          setProfileImageNavbar('images/pfpicon6.png');">
                        <img src="images/pfpicon6.png" alt="Image 6"></div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

<script type="text/javascript">
  function setProfileImage(imageSrc) {
      // Update the main profile image with the selected image source
      const profileImage = document.querySelector('.img-account-profile');
      profileImage.src = imageSrc;
  }
</script>
<div class="col-xl-8">

<div class="card mb-4">
<div class="card-header">User Details</div>
<div class="card-body">
<form method="post" id="DashboardForm" action="editprof.php">

<div class="mb-3">
<label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
<input class="form-control" name="inputUsername" id="inputUsername" type="text" placeholder="Enter your username"
           value="<?= isset($user['username']) ? htmlspecialchars($user['username']) : '' ?>">
</div>

<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputFirstName">First name</label>
<input class="form-control" name="inputFirstName" id="inputFirstName" type="text" placeholder="Enter your first name">
</div>

<div class="col-md-6">
<label class="small mb-1" for="inputLastName">Last name</label>
<input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name">
</div>
</div>

<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputGender">Gender</label>
    <select class="form-control" id="inputGender" name="gender">
        <option value="">Select a option</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>

<div class="col-md-6">
<label class="small mb-1" for="inputLocation">Location</label>
<input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" >
</div>
</div>

<div class="mb-3">
<label class="small mb-1" for="inputEmailAddress">Email address</label>
<input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address"
           value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>">
</div>

<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputPhone">Phone number</label>
<input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number">
</div>

<div class="col-md-6">
<label class="small mb-1" for="inputBirthday">Date Of Birthday</label>
<input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday">
</div>
</div>

<div class="row gx-3 mb-3">

    <div class="col-md-6">
        <label class="small mb-1" for="inputAge">Age</label>
        <input class="form-control" id="inputAge" type="number" placeholder="Enter your age">
    </div>
    <div class="col-md-6">
        <label class="small mb-1" for="inputbmi">Bmi</label>
        <input class="form-control" id="input" type="number" placeholder="BMI SCORE">
    </div>
</div>

<div class="row gx-3 mb-3">
    <div class="col-md-6">
        <label class="small mb-1" for="inputHeight">Height (in cm)</label>
        <input class="form-control" id="inputHeight" type="number" placeholder="Enter your height">
    </div>
    <div class="col-md-6">
        <label class="small mb-1" for="inputHeight">Weight (in kg)</label>
        <input class="form-control" id="inputHeight" type="number" placeholder="Enter your weight">
    </div>
</div>
<button class="btn-primary"  id="saveButton" action="editprofile.php">Edit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    function toggleMenu() {
        var menuContainer = document.querySelector('.menu-container');
        menuContainer.classList.toggle('opened');
    }

    function toggleDropdown() {
      var dropdownMenu = document.querySelector('.dropdown-menu');
      dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
  }
  
  // Close the dropdown when clicking outside of it
  window.addEventListener('click', function (event) {
      if (!event.target.closest('.user-profile-icon')) {
          var dropdownMenu = document.querySelector('.dropdown-menu');
          dropdownMenu.style.display = 'none';
      }
  });  
  const uploadButton = document.getElementById("uploadButton");
  const imagePopup = document.getElementById("imagePopup");
  const saveButton = document.getElementById("saveButton");
  
  uploadButton.addEventListener("click", () => {
      imagePopup.style.display = "block";
  });

  saveButton.addEventListener("click", () => {
      // Implement code to save the selected image and hide the pop-up
      imagePopup.style.display = "none";
  });
  
</script>
</body>
</html>