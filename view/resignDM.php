<?php
session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:sign-in.php?err=loginFirst');
    require_once('../models/user-info-model.php'); 

    $id = $_SESSION['LoggedIn'];
    $row = userInfo($id);

    $error_msg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];

    switch ($err_msg) {
        case 'empty': {
            $error_msg = "Please enter your password first.";
            break;
        }
        case 'mismatch': {
            $error_msg = "Wrong password.";
            break;
        }
    }
    }

    $success_msg = '';

    if (isset($_GET['success'])) {

    $s_msg = $_GET['success'];

    switch ($s_msg) {
        case 'confirmed': {
            $success_msg = "Your resign application has been submitted.";
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
    <title>Confirm Order</title>
</head>
<body>
    <table width="35%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
        <td>
            <h1>Resign</h1>
            <?php echo $row['Fullname']; ?>
            <br><br>
            <form method="post" action="../controllers/resign-controller.php?id=<?php echo $id; ?>" novalidate autocomplete="off">
            Enter Your Password To Confirm Resignation <br><br><input type="password" name="password">
            <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
            <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
            <br><br><br>
            <center><button>Resign</button></center>
            </form>
        </form>
        </td>
        </tr>
    </table>
</body>
</html>