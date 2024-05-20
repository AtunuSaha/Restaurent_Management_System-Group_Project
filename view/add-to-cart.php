                       <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/menu-model.php'); 
    require_once('../model/user-info-model.php'); 

    $id = $_GET['id'];
    $row = itemInfo($id);


    $error_msg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];

    switch ($err_msg) {
        case 'empty': {
            $error_msg = "Quantity can not be empty.";
            break;
        }
        case 'invalid': {
            $error_msg = "Invalid quantity.";
            break;
        }
        case 'limitExceeded': {
            $error_msg = "Please check available quantity first.";
            break;
        }
    }
    }

    $success_msg = '';

    if (isset($_GET['success'])) {

    $s_msg = $_GET['success'];

    switch ($s_msg) {
        case 'added': {
            $success_msg = "Item successfully added to cart.";
            break;
        }
    }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Add To Cart</title>
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/button.css">
    <script src="javascript/add-to-cart.js"></script>
    <style>
     tr{background-color: Lavender;}
    </style>
</head>
<body>

    <table width="35%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
        <td>
            <h3><?php echo $row['ItemName']; ?></h3>
            <b>Available Quantity : </b><?php echo $row['Stock']; ?>
            <br><br>
            <form method="post" action="../controller/add-to-cart-controller.php?id=<?php echo $row['ItemID']; ?>" novalidate autocomplete="off" onsubmit="return isValid(this);">
            
            
            <b>Enter Quantity :</b> <input type="text" name="quantity"placeholder="Enter Quantity">
            <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
            <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
            <br><font color="red" align="center" id="quantityError"></font><br><br>
            <button class="b3">Add To Cart</button>
            </form>
        </form>
        </td>
        </tr>
    </table>
    <br><br>
    <center><a class="c" href="menu.php"><button name="c">Go Back</button></a><center>
   
    
</body>
</html>