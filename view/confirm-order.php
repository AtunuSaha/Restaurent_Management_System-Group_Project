                         <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');

    require_once('../model/cart-model.php'); 

    $id = $_SESSION['id'];


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
            $success_msg = "Your order has been confirmed.";
            break;
        }
    }
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Confirm Order</title>
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/button.css">

    <style>
     tr{background-color: Lavender;}
    </style>
</head>
<body>

    <table width="35%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
        <td>
            <h1 align="center">Confirm Order Page</h1>
            <b>Total Bill : </b><?php echo getTotalBill(); ?>
            <br><br>
            <form method="post" action="../controller/confirm-order-controller.php" novalidate autocomplete="off">
            <b>Enter Your Password To Confirm Order<b> <br><br><input type="password" name="password">
            <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
            <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
            <br><br><br>
            <button class="b3">Confirm Order</button>

            </form>
        </form>
        </td>
        </tr>
    </table>
    <br><br>
    <center><a class="c" href="cart.php"><button name="c">Go Back</button></a></center>
    
</body>
</html>