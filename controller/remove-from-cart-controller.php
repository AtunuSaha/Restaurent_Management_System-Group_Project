                       <!-- CUSTOMER -->
<?php

    require_once('../model/menu-model.php'); 
    require_once('../model/cart-model.php');
    
    $id = $_GET['id'];
    $row = getCart($id);
    $itemID = $row['ItemID'];
    $row2 = itemInfo($itemID);
    
    if(removeFromCart($id)){

        $newStock = $row['Quantity'] + $row2['Stock'];
        updateStock($itemID, $newStock);
        header('location:../view/cart.php');

    } 

?>