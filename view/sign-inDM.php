<?php
session_start();
$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'mismatch': {
        $error_msg = "Wrong username or password.";
        break;
      }
    case 'bannedUser': {
        $error_msg = "Your account is currently banned.";
        break;
      }
    case 'empty': {
        $error_msg = "Field(s) can not be empty.";
        break;
      }
    case 'loginFirst': {
        $error_msg = "Log in first.";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Sign In</title>
</head>
<body>

    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controllers/sign-in-controller.php" novalidate autocomplete="off">
                    <h1>Sign In</h1>
                    Email
                    <input type="email" name="email">
                    <br><br>
                    Password
                    <input type="password" name="password">
                    <br><br>
                    <a href="forgot-password.php">Forgot Password?</a>
                    <br>
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br>
                        <div class="error-msg"><?= $error_msg ?></div>
                        <br><br>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br>
                        <div class="success-msg"><?= $success_msg ?></div>
                        <br><br>
                    <?php } ?>
                    <button type="submit" name="submit">Sign In</button>
                    <br><br>
                </form>
                <hr>
                <div class="text-center">Don't have an account?</div>
                <br>
                <a href="sign-up.php"><button>Sign Up</button></a>
            </td>
        </tr>
    </table>

</body>
</html>
