                        <!-- CUSTOMER.... -->
<?php

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'notFound': {
        $error_msg = "Email does not exist in our database.";
        break;
      }
      case 'accessDenied': {
        $error_msg = "Please provide an email first.";
        break;
      }
    case 'empty': {
        $error_msg = "Email can not be empty.";
        break;
      }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/sign-up.css">
    <link rel="stylesheet" href="css/textbox.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/button.css">
    <style>
     tr{background-color: LavenderBlush;}
    </style>
    <script src="javascript/forgot-password.js"></script>
</head>
<body>

    
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/forgot-password-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    
                    <h1>Password Assistance</h1>

                    <div class="textbox-container">
                    <b>Email:</b>
                    <input type="email" name="email" placeholder="Enter Your Email">
                    </div>
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="emailError"></font><br>
                    <button class = "b2" name="submit">Continue</button>
                   

                </form>
            </td>
        </tr>
    </table>
    <br><br>
                    
    <center><a class="c" href="sign-in.php"><button name="c">Go Back</button></a></center>

    

</body>
</html>