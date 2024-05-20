<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');
    require_once('../Model/user_info_model.php');    
  
    $id = $_COOKIE['id'];
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
  <body>
        <div class="update-pass-body">
        <div class="form-sign-up">
        <form name="editinfo-form" method="post" action="../Controller/update_pass_controller.php" novalidate>
        <h1 style="text-align: center">Update Password</h1>
        <div class="sign-up-form">
                    
                    <br><br>
                    Old Password
                    <input type="password" name="prevpassword" placeholder="Please Enter Your Old Password" size="43px">
                    <?php if (strlen($prevpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $prevpasswordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    New Password
                    <input type="password" name="password" placeholder="Please Enter New Password"size="43px">
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Confirm New Pass
                    <input type="password" name="cpassword"  placeholder="Please Enter Confirm New Password "size="43px">
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
                    <button name="submit">Change Password</button>
                    <br><br>
                    </div>
                    
                </form>
                <br><br><br>
        </div>
        </div>
                <?php  require_once('footer.php')?>
</body>
</html>