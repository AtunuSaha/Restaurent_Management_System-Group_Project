<?php
session_start();
if (!isset($_SESSION['flag']))
  header('location:login.php?err=login');
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

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'created': {
      $success_msg = "Account creation successful.";
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
  <title>Recruit Delivery Person</title>
  <link rel="stylesheet" href="CSS/style.css">
  <script src="JS/script.js"></script>
</head>

<body>
  <div id="recruit-delevary-person">
  <br><br>
  <form style="padding-left: 30px ">
      <input style="background-color:#477e77; border: none; padding: 8px 15px; border-radius: 5px" type="button"
        value="Back!" onclick="history.back()">
    </form>
    <form name="editinfo-form" method="post" action="../Controller/recruit_delivery_person_controller.php"
      onsubmit="return validateSignUp(this);">
      
      <div class="sign_up-form">
        <h1 style="text-align: center">Recruit Delivery Person</h1>
        Fullname
        <input type="text" name="fullname" placeholder="Please Enter Your Full Name" size="43px">
        <?php if (strlen($fullnameMsg) > 0) { ?>
          <br><br>
          <p><?= $fullnameMsg ?></p>
        <?php } ?>
        <br>
        <p id="fullnameError"></p><br>
        Phone
        <input type="text" name="phone" placeholder="Please Enter Your Phone Number" size="43px">
        <?php if (strlen($phoneMsg) > 0) { ?>
          <br><br>
          <p><?= $phoneMsg ?></p>
        <?php } ?>
        <br>
        <p id="phoneError"></p><br>
        Email
        <input type="email" name="email" placeholder="Please Enter Your Email" size="43px">
        <?php if (strlen($emailMsg) > 0) { ?>
          <br><br>
          <p><?= $emailMsg ?></p>
        <?php } ?>
        <br>
        <p id="emailError"></p><br>
        Address
        <input type="text" name="address" placeholder="Please Enter Your Address" size="43px">
        <?php if (strlen($addressMsg) > 0) { ?>
          <br><br>
          <p color="red"><?= $addressMsg ?></p>
        <?php } ?>
        <br>
        <p id="addressError"></p><br>
        Date Of Birth &nbsp;&nbsp;&nbsp;
        <input type="date" name="dob" size="43px">
        <?php if (strlen($dobMsg) > 0) { ?>
          <br><br>
          <p color="red"><?= $dobMsg ?></p>
        <?php } ?>
        <br>
        <p id="dobError"></p><br>
        Religion &nbsp;&nbsp;&nbsp;
        <select name="religion">
          <option disabled selected hidden value="Not Selected">Choose Your Religion</option>
          <option value="Islam">Islam</option>
          <option value="Hindu">Hindu</option>
          <option value="Christian">Christian</option>
        </select>
        <?php if (strlen($religionMsg) > 0) { ?>
          <br><br>
          <p color="red"><?= $religionMsg ?></p>
        <?php } ?>
        <br><br>
        Username
        <input type="text" name="username" placeholder="Please Enter Valid User Name" size="43px">
        <?php if (strlen($usernameMsg) > 0) { ?>
          <br><br>
          <p color="red"><?= $usernameMsg ?></p>
        <?php } ?>
        <br>
        <p id="usernameError"></p><br>
        Password
        <input type="password" name="password" placeholder="Please Enter Valid Password" size="43px">
        <?php if (strlen($passwordMsg) > 0) { ?>
          <br><br>
          <p color="red"><?= $passwordMsg ?></p>
        <?php } ?>
        <br>
        <p id="passwordError"></p><br>
        Confirm Password
        <input type="password" name="cpassword" placeholder="Please Enter Confirm Password" size="43px">
        <?php if (strlen($cpasswordMsg) > 0) { ?>
          <br><br>
          <p color="red"><?= $cpasswordMsg ?></p>
        <?php } ?>
        <br>
        <p id="cpasswordError"></p><br>
        <?php if (strlen($success_msg) > 0) { ?>
          <font color="green" align="center"><?= $success_msg ?></font>
          <br><br>
        <?php } ?>
      </div>

      <button name="button">Create Account</button>
    </form>
  </div>
  <?php require_once ('footer.php') ?>
</body>

</html>