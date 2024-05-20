<?php

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
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <div style="background-color: #94c7c0cf">
<center>
                
                <form name="editinfo-form" method="post" action="../Controller/forgot_pass_controller.php">
                    <h1>Password Assistance</h1><br><br>
                    Email
                    <input type="email" name="email" size="43px">
                    <?php if (!empty($error_msg)) echo "<br><br>" . $error_msg?>
                    <br><br>
                    <button name="submit">Continue</button>
                </form>
                
</center>
<br><br><br>
</div>
<?php  require_once('footer.php')?>
</body>
</html>