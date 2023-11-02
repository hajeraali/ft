<?php
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $mysqli = require __DIR__ . "/db.php";

     $sql = sprintf("SELECT * FROM users 
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: dashboard.php");
            exit;


        }

    }

    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <section class="user">
        <div class="user_options-container">
          <div class="user_options-text">
            <div class="user_options-unregistered">
              <h2 class="user_unregistered-title">Don't have an account?</h2>
              <p class="user_unregistered-text">Create now!</p>
              <button class="user_unregistered-signup" id="signup-button">Sign up</button>
            </div>
      
            <div class="user_options-registered">
              <h2 class="user_registered-title">Already have a account!</h2>
              <p class="user_registered-text">Get started..</p>
              <button class="user_registered-login" id="login-button">Login</button>
            </div>
          </div>
          
          <div class="user_options-forms" id="user_options-forms">
            <div class="user_forms-login">
              <h2 class="forms_title">Login</h2>
              <?php if ($is_invalid): ?>
                <em>Invalid login</em>
              <?php endif; ?>
              <form class="forms_form" method="post" novalidate>
                <fieldset class="forms_fieldset">
                  <div class="forms_field">
                    <input type="email" placeholder="Email" class="forms_field-input" name="email" id="email" 
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" autofocus />
                  </div>
                  <div class="forms_field">
                    <input type="password" placeholder="Password" class="forms_field-input" name="password" id="password" required />
                  </div>
                </fieldset>
                <div class="forms_buttons">
                  <button type="button" class="forms_buttons-forgot">Forgot password?</button>
                  <input type="submit" value="Log In" class="forms_buttons-action">
                </div>
              </form>
            </div>
            <div class="user_forms-signup">
              <h2 class="forms_title">Sign Up</h2>
              <form class="forms_form" action="process-signup.php" method="post" novalidate>
                <fieldset class="forms_fieldset">
                  <div class="forms_field">
                    <input type="text" placeholder="User Name" class="forms_field-input" name="username" id="username" required />
                  </div>
                  <div class="forms_field">
                    <input type="email" placeholder="Email" class="forms_field-input" name="email" id="email" required />
                  </div>
                  <div class="forms_field">
                    <input type="password" placeholder="Password" class="forms_field-input" name="password" id="password" required />
                  </div>
                </fieldset>
                <div class="forms_buttons">
                  <input type="submit" value="Sign up" class="forms_buttons-action">
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    <script>
  const signupButton = document.getElementById("signup-button"),
  loginButton = document.getElementById("login-button"),
  userForms = document.getElementById("user_options-forms");

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener(
  "click",
  ()=>{
    userForms.classList.remove("bounceRight");
    userForms.classList.add("bounceLeft");
  },
  false
);

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceLeft");
    userForms.classList.add("bounceRight");
  },
  false
);
    </script>      
</body>
</html>