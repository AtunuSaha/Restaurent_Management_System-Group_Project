                            <!-- CUSTOMER -->
<?php

require_once('database.php');

function createOrder($customerName, $deliveryManName, $address, $bill, $deliveryDate, $orderDate, $orderStatus){
    $con = dbConnection();
    $sql = "INSERT INTO orderinfo (CustomerName,DeliveryManName,Address,Bill,DeliveryDate,OrderDate,OrderStatus) VALUES ('$customerName', '$deliveryManName', '$address', '$bill', '$deliveryDate', '$orderDate', '$orderStatus')";
    return mysqli_query($con, $sql);
}

function getAllOrder(){
    $con = dbConnection();
    $sql = "SELECT * FROM OrderInfo";
    return mysqli_query($con, $sql);
}

function getOrderHistory($fullname){
    $con = dbConnection();
    $sql = "SELECT * FROM orderinfo WHERE CustomerName = '$fullname' AND OrderStatus = 'Completed'";
    return mysqli_query($con, $sql);
}

?>
