                         <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['mail'])) header('location:forgot-password.php?err=accessDenied');


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
   
    <title>Change Password</title>
    <link rel="stylesheet" href="css/sign-up.css">
    <link rel="stylesheet" href="css/textbox.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/button.css">


    <style>
     tr{background-color: LavenderBlush;}
    </style>
</head>
<body>

    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/change-password-controller.php" novalidate autocomplete="off">
                    <h1>Create New Password</h1>
                    <br>
                    In order the change your password, you need to enter your birth year correctly.
                    <br><br>
                    
                    <div class="textbox-container">
                    <b>Enter DOB:</b> <br>
                    <input type="date" name="dob">
                    <br><br>
                    <hr width=auto>
                    <br>
                    <b>New Password:</b>
                    <input type="password" name="password" size="43px"placeholder="Enter Your Password">
                    <br><br>
                    <b>Confirm New Password:</b>
                    </div>
                    <input type="password" name="cpassword" size="43px"placeholder="Enter Your Confirm Password">
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
                    <br><br>
                    <button class= "b4" name="submit">Change Password</button>
                    
                </form>
            </td>
        </tr>
    </table>
    <br><br>
    <center><a class="c" href="forgot-password.php"><button name="c">Go Back</button></a></center>
    
</body>
</html>