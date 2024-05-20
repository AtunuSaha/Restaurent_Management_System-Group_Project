                          <!-- CUSTOMER.... -->
<?php

session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');

    require_once('../model/order-info-model.php');
    require_once('../model/user-info-model.php');
  
    $id = $_SESSION['id'];
    $row = userInfo($id);
    $fullname = $row['Fullname'];
    $result = getOrderHistory($fullname);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Order History</title>
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/return.css">
    <style>
     tr{background-color: Lavender;}
    </style>
</head>
<body>

    <br><br>
    <center><h1>Order History</h1>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    <b>Customer Name</b>
                </td>
                <td>
                    <b>Delivery Man Name</b>
                </td>
                <td>
                    <b>Delivery Address</b>
                </td>
                <td>
                    <b>Bill</b>
                </td>
                <td>
                    <b>Delivery Date</b>
                </td>
                <td>
                    <b>Order Date</b>
                </td>
                <hr width=auto color = purple><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $customerName=$w['CustomerName'];
                    $deliverymanName=$w['DeliveryManName'];
                    $address=$w['Address'];
                    $bill=$w['Bill'];
                    $ddate=$w['DeliveryDate'];
                    $odate=$w['OrderDate'];
                    echo "    
                    <tr><td>$customerName</td>
                    <td>$deliverymanName</td>
                    <td>$address</td> 
                    <td>$bill</td>
                    <td>$ddate</td> 
                    <td>$odate</td>      
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Order History Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <br><br>
      <!--  <center><a class="c" href="customer-home.php"><button name="c">Go Back</button></a></center>-->
        
        
</body>
</html>