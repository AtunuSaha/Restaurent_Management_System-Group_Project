<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');
require_once('../Model/user_info_model.php');
require_once('../Model/order_info_model.php');
require_once('../Model/menu_model.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>  

    
    <div style="background-color: #94c7c0cf;">
    <br><br>
    <form style="padding-left: 30px ">
      <input style="background-color:#477e77; border: none; padding: 8px 15px; border-radius: 5px" type="button"
        value="Back!" onclick="history.back()">
    </form>
    <h2 style="text-align:center">OVER VIEW</h2>
    <table name="overview" width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                Number of Customers : <?php echo numberOfCustomer(); ?><br><br>
                Number of Delivery Persons : <?php echo numberOfDeliveryMan(); ?><br><br>
                Number of Items : <?php echo numberOfItem(); ?><br><br>
                Number of Orders : <?php echo numberOfOrder(); ?><br><br>
                Total Revenue : <?php echo totalRevenue(); ?><br>
            </td>
        </tr>
    </table>
    </div> 
    <?php  require_once('footer.php')?>
</body>
</html>