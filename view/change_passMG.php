<?php
session_start();

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'empty': {
        $error_msg = "Enter you DOB first.";
        break;
      }
    case 'dobError': {
        $error_msg = "The DOB's does not match.";
        break;
      }
    case 'invalid': {
        $error_msg = "Password is invalid.";
        break;
      }
    case 'mismatch': {
        $error_msg = "Passwords do not match.";
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
    <title>OTP Confirmation</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<div style="background-color: #94c7c0cf">

<br><br><br>
<center>
                <form name="editinfo-form" method="post" action="../Controller/change_pass_controller.php" novalidate autocomplete="off">
                    <h1>Create New Password</h1>
                    <br>
                    In order the change your password, you need to enter your birth year correctly.
                    <br><br>
                    Enter DOB <br>
                    <input type="date" name="dob">
                    <br><br>
                    New Password
                    <input type="password" name="password">
                    <br><br>
                    Confirm New Password
                    <input type="password" name="cpassword">
                    <?php if (!empty($error_msg)) echo "<br><br>" . $error_msg?>
                    <br><br>
                    <button name="submit">Change Password</button>
                </form>
                </center>
                <br><br>
                
        <br><br>
        <br><br>
</div>
                <?php  require_once('footer.php')?>
</body>
</html>