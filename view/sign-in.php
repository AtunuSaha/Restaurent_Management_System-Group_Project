                            <!-- CUSTOMER.... -->
<?php

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'mismatch': {
        $error_msg = "Wrong email or password.";
        break;
      }
    case 'bannedUser': {
        $error_msg = "Your account is currently banned.";
        break;
      }
      case 'signInFirst': {
        $error_msg = "You need to sign in first.";
        break;
      }
    case 'empty': {
        $error_msg = "Field(s) can not be empty.";
        break;
      }
  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'created': {
        $success_msg = "Account creation successful. Please sign in.";
        break;
      }
    case 'changed': {
        $success_msg = "Password change successful. Please sign in.";
        break;
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Login Page</title>
    <link rel="stylesheet" href="css/cover.css">
    <link rel="stylesheet" href="css/textbox.css">
    <link rel="stylesheet" href="css/button.css">
    <script src="javascript/sign-in.js"></script>
    <style>
     tr{background-color: Pink;}
    </style>
    
</head>
<body>
<?php require 'header.php'; ?>

    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center"> 
        <tr>
            <td>
                <form method="post" action="../controller/sign-in-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h1 align="center">Login Page</h1>

                    <div class="textbox-container">
                    <b>Email: </b><br><br>
                    <input type="email" name="email" size="43px" placeholder="Enter Your Email">
                    
                    <br><center><font color="red" id="emailError"></font></center><br>

                    <b> Password: </b><br><br>
                    <input type="password" name="password" size="43px"placeholder="Enter Your Password">
                   </div>
                    <br><center><font color="red" id="passwordError"></font></center><br>
                    <center><a href= "forgot-password.php"><b>Forgot Password?</b></a></center>
                    
                    <br>
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br>
                        <center><font color="red" align="center"><?= $error_msg ?></font></center>
                        <br><br>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br>
                        <center><font color="green" align="center"><?= $success_msg ?></font></center>
                        <br><br>
                    <?php } ?>
                    
                    
                    <center><input type="checkbox" name="rememberMe"> Stay Logged-in </center>
                    
                    
                    <br><br>

                    
                    <center><button class = "b2" size="250px" name="submit">Login</button></center>
                    
                    
                    <br><br>
                    </form>
                    <hr width="auto" color = "purple">
                    <center><b>Don't have an account?</b></center>
                    <br><br>
                    <a href="sign-up.php"><center><button class= "button">Register Now!!!</button></a></center>
                    
            </td>
        </tr>
    </table>
    <?php require 'footer.php'; ?>
</body>
</html>