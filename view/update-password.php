                           <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/user-info-model.php');    
  
    $id = $_SESSION['id'];
    $row = userInfo($id);

    $prevpasswordMsg = $passwordMsg = $cpasswordMsg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'prevpasswordEmpty': {
            $prevpasswordMsg = "Previous password can not be empty.";
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
        case 'passwordError': {
            $prevpasswordMsg = "Incorrect password.";
            break;
        }
        case 'invalid': {
            $passwordMsg = "Invalid password.";
            break;
        }
        case 'mismatch': {
            $cpasswordMsg = "Passwords do not match.";
            break;
        }
    }
    }

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'updated': {
        $success_msg = "Password successfully updated.";
        break;
      }
  }
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Update Password</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/textbox.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/button.css">
    <style>
     tr{background-color: MistyRose;}
    </style>
    <script src="javascript/update-password.js"></script>
</head>
<body>
<?php require 'header2.php'; ?>
<center>
    <div class="colorful-text">
    <?php
                echo "<td>
                    <center> {$row['Fullname']}'s Profile </font><br><br></center>
                   
                </td>";
    ?></div>
    
</center>

    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/update-password-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h1 align="center">Update Password</h1>
                    <br><br>
                    
                    <div class="textbox-container">
                    <b>Previous Password:</b>
                    <input type="password" name="prevpassword" size="43px"placeholder="Enter Your Previous Password">
                    <?php if (strlen($prevpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $prevpasswordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="prevPasswordError"></font><br>
                    <b>New Password:</b>
                    <input type="password" name="password" size="43px"placeholder="Enter Your New Password">
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="passwordError"></font><br>
                    <b>Confirm New Password:</b>
                    <input type="password" name="cpassword" size="43px"placeholder="Enter Your Confirm Password">
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
                    </div>
                    <br><font color="red" align="center" id="cpasswordError"></font><br>
                    <button class="b4"name="submit">Change Password</button>
                    
                </form>
            </td>
        </tr>
    </table>
    <br><br>
    <center><a class="c" href="profile.php"><button name="c">Go Back</button></a></center>
    
</body>
</html>