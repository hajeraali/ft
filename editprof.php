<?php 
session_start();
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
</head>
<body>
    <section id="main">
        <hr class="mt-4 mb-4">

<div class="row">
<div class="col-xl-4">

<div class="card mb-4 mb-xl-0">
<div class="card-header">Profile Picture</div>
<div class="card-body text-center">

<img class="img-account-profile rounded-circle mb-2" src="images/pfpicon2.png" alt>

<div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

<button class="btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#imageUploadModal">Upload new image</button>
</div>
</div>
</div>
<!-- Image Upload Modal -->
<div class="modal fade" id="imageUploadModal" tabindex="-1" aria-labelledby="imageUploadModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="imageUploadModalLabel">Upload New Image</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
        <form method="post" id="userProfileForm" action="save.php">
        <div class="row gx-3 mb-3">

        <div class="col-md-6">
        <label class="small mb-1" for="inputFirstName" >First name</label>
        <input class="form-control"  name="fname" id="inputFirstName" type="text" 
        placeholder="Enter your first name" required>
        </div>
        
        <div class="col-md-6">
        <label class="small mb-1" for="inputLastName">Last name</label>
        <input class="form-control" id="inputLastName" name="lname" type="text" 
        placeholder="Enter your last name" required>
        </div>
        </div>
        
        <div class="row gx-3 mb-3">
        
        <div class="col-md-6">
        <label class="small mb-1" for="inputGender">Gender</label>
            <select class="form-control" id="inputGender" name="gender" required>
                <option value="">Select a option</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        
        <div class="col-md-6">
        <label class="small mb-1" for="inputLocation">Location</label>
        <input class="form-control" id="inputLocation" name="location" type="text" 
        placeholder="Enter your location" required>
        </div>
        </div>
    
        <div class="row gx-3 mb-3">
        
        <div class="col-md-6">
        <label class="small mb-1" for="inputPhone">Phone number</label>
        <input class="form-control" id="inputPhone" type="tel" name="phone" 
        placeholder="Enter your phone number" required>
        </div>
        
        <div class="col-md-6">
        <label class="small mb-1" for="inputBirthday">Date Of Birthday</label>
        <input class="form-control" id="inputBirthday" type="text" name="dob" 
        placeholder="Enter your birthday" required>
        </div>
        </div>
        
        <div class="row gx-3 mb-3">
        
            <div class="col-md-6">
                <label class="small mb-1" for="inputAge">Age</label>
                <input class="form-control" id="inputAge" name="age" type="number" 
                placeholder="Enter your age" required>
            </div>
            <div class="col-md-6">
                <label class="small mb-1" for="inputbmi">Bmi</label>
                <input class="form-control" id="input" name="bmi" type="number" 
                placeholder="BMI SCORE" required>
            </div>
        </div>
        
        <div class="row gx-3 mb-3">
            <div class="col-md-6">
                <label class="small mb-1" for="inputHeight">Height (in cm)</label>
                <input class="form-control" id="inputHeight" name="height" type="number" 
                placeholder="Enter your height" required>
            </div>
            <div class="col-md-6">
                <label class="small mb-1" for="inputHeight">Weight (in kg)</label>
                <input class="form-control" id="inputWeight" type="number" name="weight"
                placeholder="Enter your weight" required>
            </div>
            <div class="col-md-6">
               <label style="padding-top: 5%;"><input type="checkbox" name="agree">I agree to save changes</label>
            </div>
        </div>
        <button class="btn-primary"  id="saveButton">Save Changes</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>
</body>
</html>