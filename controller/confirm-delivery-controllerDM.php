
<?php
session_start();
    require_once('../models/user-info-model.php');
    require_once('../models/order-info-model.php');
    require_once('../models/notification-model.php');
            
    $orderID = $_GET['id'];
    $row2 = getOrderInfo($orderID);
    $cid = getIDByFullname($row2['CustomerName']);
    $deliveryDate = date("d-m-Y");

    $status = confirmDelivery($orderID, $deliveryDate);
    if($status){
        
        customerNotification($cid, "Your order has been delivered successfully. If you have not recieved it yet, file a complaint to admin", "Customer");
        header('location:../views/confirm-delivery.php');

    } 


?>