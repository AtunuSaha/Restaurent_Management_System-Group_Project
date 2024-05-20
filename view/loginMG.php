<?php

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];

  switch ($err_msg) {


    case 'wrong': {
      $error_msg = "Wrong username or password.";
      break;
    }

    case 'empty': {
      $error_msg = "Fill_up all information.";
      break;
    }

    case 'banned_User': {
      $error_msg = "Your account is currently banned.";
      break;
    }

    case 'login': {
      $error_msg = "Login for access.";
      break;
    }

  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'created': {
      $success_msg = "Account creation successful. Please login.";
      break;
    }
    case 'changed': {
      $success_msg = "Password change successful. Please login.";
      break;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
  <link rel="stylesheet" href="CSS/style.css">
  <script src="JS/script.js"></script>
</head>

<body>

  <div id="login-header">
    <a class="sign_up" href="sign_up.php"><button name="sign_up">Create Account</button></a>
    <center>
      <div class="form">
      <form method="post" id="form" action="../Controller/login_controller.php" onsubmit="return validateLogin(this);">
        <h1>Please Login </h1><br>
        <b>Email</b><br>
        <input type="email" placeholder="Enter Your Email..." name="email" size="42px">
        <p id="emailError"></p>
        <b>Password </b><br>
        <input type="password" placeholder="Enter Your Password..." name="password" size="42px" id="password">
        <p id="passwordError"></p><br><br>

        <?php if (!empty($error_msg))
          echo $error_msg . "<br><br>" ?>
        <?php if (!empty($success_msg))
          echo $success_msg . "<br><br>" ?>

          <input type="checkbox" name="rememberMe">Remember This Account <br><br>
          <button name="submit" id="login">Login</button><br><br>
          <br>
        </form>
        <a class="forgot_pass-link" href="forgot_pass.php"><button name="forgot_pass">Forgot Password</button></a>
      </div>
      </center>
      <br><br><br>
    </div>

  <?php require_once ('footer.php') ?>

</body>

</html>