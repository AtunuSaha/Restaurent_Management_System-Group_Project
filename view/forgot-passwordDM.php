<?php
session_start();
$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'notFound': {
        $error_msg = "Email does not exist in our database.";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controllers/forgot-password-controller.php" novalidate autocomplete="off">
                    <h1>Password Assistance</h1>
                    Email
                    <input type="email" name="email" size="43px">
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
                    <br><br>
                    <button name="submit">Continue</button>
                </form>
            </td>
        </tr>
    </table>

</body>
</html>