                              <!-- CUSTOMER -->
<?php
 session_start();
    require_once('../model/user-info-model.php');
    require_once('../model/order-info-model.php');
    require_once('../model/cart-model.php');
    require_once('../model/notification-model.php');

            
    $id = $_SESSION['id'];
   
    $row = userInfo($id);


    $password = $_POST['password'];

  

    if(empty($password)){
        header('location:../view/confirm-order.php?err=empty'); 
        exit();
    }

    if($password != $row['Password']){
        
        header('location:../view/confirm-order.php?err=mismatch'); 
        exit();
        
        
    }


$customerName = $row['Fullname'];
$DeliveryManName = "N/A";
$address = $row['Address'];
$bill = getTotalBill();
$deliveryDate = "Not Delivered Yet";
$orderDate = date("Y-m-d");
$orderStatus = "Pending";
$status = createOrder($customerName, $DeliveryManName, $address, $bill, $deliveryDate, $orderDate, $orderStatus);
if($status){

    clearCart();
    customerNotification($id, "Thank you for ordering. We will inform you when a delivery man is assigned.", "Customer");
    deliverymanNotification($id, "A new order has been placed. Please check order list for details", "Delivery Man");
    header('location:../view/confirm-order.php?success=confirmed');
    //header('location:../view/customer-home.php?success=confirmed');

} 




?>