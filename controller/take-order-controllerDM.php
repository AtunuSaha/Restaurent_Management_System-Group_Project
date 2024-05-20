
<?php
session_start();
    require_once('../models/user-info-model.php');
    require_once('../models//order-info-model.php');
    require_once('../models/notification-model.php');
            
    $id = $_SESSION['LoggedIn'];
    $row = userInfo($id);
    $orderID = $_GET['id'];

    $row2 = getOrderInfo($orderID);

    $cid = getIDByFullname($row2['CustomerName']);

    $status = takeOrder($orderID, $row['Fullname']);
    if($status){
        
        customerNotification($cid, "Our delivery man, {$row['Fullname']} has picked up your order. Please wait for it to arrive", "Customer");
        header('location:../views/order-list.php');

    } 


?>