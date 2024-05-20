                            <!-- CUSTOMER.... -->
<?php

$fullname = $email = $phone = $address = $dob = $religion = $username = '';
$fullnameMsg = $emailMsg = $phoneMsg = $addressMsg =  $dobMsg =  $religionMsg =  $usernameMsg = $passwordMsg =  $cpasswordMsg =  '';

if (isset($_GET['err'])) {
  $err_msg = $_GET['err'];
  
  
  if (isset($_GET['fullname'])) $fullname = $_GET['fullname'];
  if (isset($_GET['email'])) $email = $_GET['email'];
  if (isset($_GET['phone'])) $phone = $_GET['phone'];
  if (isset($_GET['address'])) $address = $_GET['address'];
  if (isset($_GET['dob'])) $dob = $_GET['dob'];
  if (isset($_GET['religion'])) $religion = $_GET['religion'];
  if (isset($_GET['username'])) $username = $_GET['username'];

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
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/sign-up.css">
    <link rel="stylesheet" href="css/textbox.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/button.css">
    <script src="javascript/sign-up.js"></script>
    <style>
        tr { background-color: LavenderBlush; }
    </style>
</head>
<body>
<?php require 'header.php'; ?>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/sign-up-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h1 align='center'>Registration Page</h1>
                    <div class="textbox-container">
                        <b>Full Name:</b>
                        <input type="text" name="fullname" size="43px" placeholder="Enter Your Full Name" value="<?= htmlspecialchars($fullname) ?>">
                        <?php if (strlen($fullnameMsg) > 0) { ?>
                            <br><br>
                            <font color="red"><?= $fullnameMsg ?></font>
                        <?php } ?>
                        <br><font color="red" id="fullnameError"></font><br>
                        <b>Phone Number: </b><br>
                        <input type="text" name="phone" size="43px" placeholder="Enter Your Phone Number" value="<?= htmlspecialchars($phone) ?>">
                        <?php if (strlen($phoneMsg) > 0) { ?>
                            <br><br>
                            <font color="red"><?= $phoneMsg ?></font>
                        <?php } ?>
                        <br><font color="red" id="phoneError"></font><br>
                        <b>Email:</b><br>
                        <input type="email" name="email" size="43px" placeholder="Enter Your Email" value="<?= htmlspecialchars($email) ?>">
                        <?php if (strlen($emailMsg) > 0) { ?>
                            <br><br>
                            <font color="red"><?= $emailMsg ?></font>
                        <?php } ?>
                        <br><font color="red" id="emailError"></font><br>
                        <b>Address:</b>
                        <input type="text" name="address" size="43px" placeholder="Enter Your Address" value="<?= htmlspecialchars($address) ?>">
                        <?php if (strlen($addressMsg) > 0) { ?>
                            <br><br>
                            <font color="red"><?= $addressMsg ?></font>
                        <?php } ?>
                        <br><font color="red" id="addressError"></font><br>
                        <b>Date of Birth: </b> &nbsp;&nbsp;&nbsp;
                        <input type="date" name="dob" size="43px" value="<?= htmlspecialchars($dob) ?>">
                        <?php if (strlen($dobMsg) > 0) { ?>
                            <br><br>
                            <font color="red"><?= $dobMsg ?></font>
                        <?php } ?>
                        <br><font color="red" id="dobError"></font><br>
                        <b>Religion: </b>&nbsp;&nbsp;&nbsp;
                        <select name="religion">
                            <option disabled selected hidden value="Not Selected">Choose Your Religion</option>
                            <option value="Islam" <?= $religion == 'Islam' ? 'selected' : '' ?>>Islam</option>
                            <option value="Hindu" <?= $religion == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                            <option value="Christian" <?= $religion == 'Christian' ? 'selected' : '' ?>>Christian</option>
                        </select>
                        <?php if (strlen($religionMsg) > 0) { ?>
                            <br><br>
                            <font color="red"><?= $religionMsg ?></font>
                        <?php } ?>
                        <br><br>
                        <b>Username:</b> <br>
                        <input type="text" name="username" size="43px" placeholder="Enter Your Username" value="<?= htmlspecialchars($username) ?>">
                        <?php if (strlen($usernameMsg) > 0) { ?>
                            <br><br>
                            <font color="red"><?= $usernameMsg ?></font>
                        <?php } ?>
                        <br><font color="red" id="usernameError"></font><br>
                        <b>Password:</b><br>
                        <input type="password" name="password" size="43px" placeholder="Enter Your Password">
                        <?php if (strlen($passwordMsg) > 0) { ?>
                            <br><br>
                            <font color="red"><?= $passwordMsg ?></font>
                        <?php } ?>
                        <br><font color="red" id="passwordError"></font><br>
                        <b>Confirm Password:</b><br>
                        <input type="password" name="cpassword" size="43px" placeholder="Enter Your Confirm Password">
                        <?php if (strlen($cpasswordMsg) > 0) { ?>
                            <br><br>
                            <font color="red"><?= $cpasswordMsg ?></font>
                        <?php } ?>
                        <br><font color="red" id="cpasswordError"></font><br></div>
                    <center><button class="b3">Create Account</button></center>
                </form>
            </td>
        </tr>
    </table>
    <br><br>
    <center><a class="c" href="sign-in.php"><button name="c">Go Back</button></a></center>
    
</body>
</html>
