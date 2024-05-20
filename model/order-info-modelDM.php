<?php

    require_once('database.php');

    $row;

    function createOrder($customerName, $deliveryManName, $address, $bill, $deliveryDate, $orderDate, $orderStatus){

        $con = dbConnection();
        $sql = "insert into OrderInfo values('', '{$customerName}' ,'{$deliveryManName}' ,'{$address}', {$bill}, '{$deliveryDate}', '{$orderDate}', '{$orderStatus}')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }
    function getAllOrder(){

        $con = dbConnection();
        $sql = "select * from OrderInfo;";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }

    function getOrderHistory($fullname){

        $con = dbConnection();
        $sql = "select * from OrderInfo where CustomerName = '{$fullname}' and OrderStatus = 'Completed';";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }

    function getAllPendingOrder(){

        $con = dbConnection();
        $sql = "select * from OrderInfo where OrderStatus = 'Pending';";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }
    function takeOrder($orderID, $deliveryManName){

        $con=dbConnection();
        $sql = "update OrderInfo set DeliveryManName = '$deliveryManName', OrderStatus = 'In-Progress' where OrderID = '$orderID'";

        if(mysqli_query($con,$sql)===true) return true;
        else return false; 

    }

    function confirmDelivery($orderID, $deliveryDate){

        $con=dbConnection();
        $sql = "update OrderInfo set DeliveryDate = '$deliveryDate', OrderStatus = 'Completed' where OrderID = '$orderID'";

        if(mysqli_query($con,$sql)===true) return true;
        else return false; 

    }

    function getOrderInfo($orderID){

        $con = dbConnection();
        $sql = "select * from OrderInfo where OrderID = '{$orderID}';";
    
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);

        return $row;

    }

    function getAllOrderInProgress($deliveryManName){

        $con = dbConnection();
        $sql = "select * from OrderInfo where OrderStatus = 'In-Progress' and DeliveryManName = '{$deliveryManName}';";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }



?>