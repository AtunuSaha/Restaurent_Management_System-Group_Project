<?php

$fullnameMsg = $emailMsg = $phoneMsg = $addressMsg = $dobMsg = $religionMsg = $usernameMsg = $passwordMsg = $cpasswordMsg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];

  switch ($err_msg) {
    case 'fullnameEmpty': {
      $fullnameMsg = "Fullname can not be empty.";
      break;
    }
    case 'phoneEmpty': {
      $phoneMsg = "Phone number can not be empty.";
      break;
    }
    case 'addressEmpty': {
      $addressMsg = "Address can not be empty.";
      break;
    }
    case 'emailEmpty': {
      $emailMsg = "Email can not be empty.";
      break;
    }
    case 'dobEmpty': {
      $dobMsg = "Date of birth can not be empty.";
      break;
    }
    case 'religionEmpty': {
      $religionMsg = "Religion can not be empty.";
      break;
    }
    case 'usernameEmpty': {
      $usernameMsg = "Username can not be empty.";
      break;
    }
    case 'passwordEmpty': {
      $passwordMsg = "Password can not be empty.";
      break;
    }
    case 'cpasswordEmpty': {
      $cpasswordMsg = "Confirm password can not be empty.";
      break;
    }
    case 'fullnameInvalid': {
      $fullnameMsg = "Fullname is not valid.";
      break;
    }
    case 'phoneInvalid': {
      $phoneMsg = "Phone number is not valid.";
      break;
    }
    case 'emailInvalid': {
      $emailMsg = "Email is not valid.";
      break;
    }
    case 'emailExists': {
      $emailMsg = "Email already exists.";
      break;
    }
    case 'usernameInvalid': {
      $usernameMsg = "Username is not valid.";
      break;
    }
    case 'passwordInvalid': {
      $passwordMsg = "Password is not valid.";
      break;
    }
    case 'passwordMismatch': {
      $cpasswordMsg = "Passwords do not match.";
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
  <title>Sign Up</title>
  <link rel="stylesheet" href="CSS/style.css">
  <script src="JS/script.js"></script>
</head>

<body>
  <div class="sign_up-body">
    <center>
      <div class="form-sign_up">
        <form name="editinfo-form" method="post" action="../Controller/sign_up_controller.php"
          onsubmit="return validateSignUp(this);">
          <h1>Sign Up</h1>
          <br><br><br>
          <div class="sign-up-form">
          FullName
          <input type="text" name="fullname" placeholder="Please Enter Your Full Name" size="50px">
          <?php if (!empty($fullnameMsg))
            echo "<br><br>" . $fullnameMsg ?>
            <br>
            <p id="fullnameError"></p><br>
            Phone
            <input type="text" name="phone" placeholder="Please Enter Your Phone Number" size="50px">
          <?php if (!empty($phoneMsg))
            echo "<br><br>" . $phoneMsg ?>
            <br>
            <p id="phoneError"></p><br>
            Email
            <input type="email" name="email" placeholder="Please Enter Your Email" size="50px">
          <?php if (!empty($emailMsg))
            echo "<br><br>" . $emailMsg ?>
            <br>
            <p id="emailError"></p><br>
            Address
            <input type="text" name="address" placeholder="Please Enter Your Full Address" size="50px">
          <?php if (!empty($addressMsg))
            echo "<br><br>" . $addressMsg ?>
            <br>
            <p id="addressError"></p><br>
            Date Of Birth
            <input type="date" name="dob" size="50px">
          <?php if (!empty($dobMsg))
            echo "<br><br>" . $dobMsg ?>
            <br>
            <p id="dobError"></p><br>
            Religion
            <select name="religion">
              <option disabled selected hidden value="Not Selected">Choose Your Religion</option>
              <option value="Islam">Islam</option>
              <option value="Hindu">Hindu</option>
              <option value="Christian">Christian</option>
            </select>
          <?php if (!empty($religionMsg))
            echo "<br><br>" . $religionMsg ?>
            <br><br>
            Username
            <input type="text" name="username" placeholder="Please Enter Valid Username" size="50px">
          <?php if (!empty($usernameMsg))
            echo "<br><br>" . $usernameMsg ?>
            <br>
            <p id="usernameError"></p><br>
            Password
            <input type="password" name="password" placeholder="Please Enter Valid Password" size="50px">
          <?php if (!empty($passwordMsg))
            echo "<br><br>" . $passwordMsg ?>
            <br>
            <p id="passwordError"></p><br>
            Confirm Password
            <input type="password" name="cpassword" placeholder="Please Enter Your Confirm Password" size="50px">
          <?php if (!empty($cpasswordMsg))
            echo "<br><br>" . $cpasswordMsg ?>
            <br>
            <p id="cpasswordError"></p>
            </div>
            <br>
            <button name="submit">Create Account</button>
          </form>
        </div>
      </center><br><br>
    </div>

  <?php require_once ('footer.php') ?>
</body>

</html>