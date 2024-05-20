                      <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/cart-model.php');
    require_once('../model/menu-model.php');
  
    $id = $_SESSION['id'];
    $result = cartInfo();
    $flag = 0;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Cart</title>
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/return.css">


    <style>
     tr{background-color: Lavender;}
    </style>
</head>
<body>

    <br><br>
    <center><h1>Cart</h1>
    <?php 
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    <b>Item Name</b>
                </td>
                <td>
                    <b>Quantity</b>
                </td>
                <td>
                    <b>Price</b>
                </td>
                <td>
                    <b>Action</b>
                </td>
                <hr width=auto color = purple><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $cid=$w['CartID'];
                    $id=$w['ItemID'];
                    $name= getItemNameByID($id);
                    $quantity=$w['Quantity'];
                    $price=$w['Price'];
                    echo "    
                    <tr><td>$name</td>
                    <td>$quantity</td>
                    <td>$price</td>
                    <td><a href=\"../controller/remove-from-cart-controller.php?id={$cid}\">Remove From Cart</a></td>         
                    </tr>";
                }
            }else{
                $flag = 1;
                echo"<tr><td align=\"center\">No Item Found</td></tr>";
            }
        ?>
        </table>
        <br><br>
        <?php if($flag == 0) echo "<a href=\"confirm-order.php\">Confirm Order & See Total Bill</a>"; ?>
        </center>
        <br><br>
       <center> <a href="menu.php"><button style="border-radius: 8px;">Add Items</button></a></center><br>
       <!-- <center><a class="c" href="customer-home.php"><button name="c">Go Back</button></a><center>-->
        
</body>
</html>