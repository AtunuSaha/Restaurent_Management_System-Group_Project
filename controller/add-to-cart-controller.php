                            <!-- CUSTOMER -->
<?php

    require_once('../model/cart-model.php');
    require_once('../model/menu-model.php');

    $itemID = $_GET['id'];
    $userID = $_SESSION['id'];
    $row = itemInfo($itemID);
    $price = $row['Price'];
    $quantity = $_POST['quantity'];

    if(empty($quantity)){

        header('location:../view/add-to-cart.php?err=empty&id='.$itemID);
        exit;

    }
    if(is_numeric($quantity)){
        if($quantity > 0 && $quantity <= $row['Stock']){}
        else {
            header('location:../view/add-to-cart.php?err=limitExceeded&id='.$itemID); 
            exit();
        }
    }
    else {
        header('location:../view/add-to-cart.php?err=invalid&id='.$itemID);
        exit();
    }

    $price = (int)$price * (int)$quantity;

    $status = addToCart($itemID, $userID, $quantity, $price);
    if($status){

        $newStock = $row['Stock'] - (int)$quantity;
        updateStock($itemID, $newStock);
        header('location:../view/add-to-cart.php?success=added&id='.$itemID);

    } 

?>