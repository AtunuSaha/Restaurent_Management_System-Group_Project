                            <!-- CUSTOMER -->
<?php

require_once('database.php');

function addToCart($itemID, $userID, $quantity, $price){
    $con = dbConnection();
    $sql = "INSERT INTO Cart (ItemID, UserID, Quantity, Price) VALUES ('$itemID', '$userID', $quantity, $price)";
    return mysqli_query($con, $sql);
}

function cartInfo(){
    $con = dbConnection();
    $sql = "SELECT * FROM Cart";
    return mysqli_query($con, $sql);
}

function getCart($cartID){
    $con = dbConnection();
    $sql = "SELECT * FROM Cart WHERE CartID = '$cartID'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

function removeFromCart($id){
    $con = dbConnection();
    $sql = "DELETE FROM Cart WHERE CartID = '$id'";
    return mysqli_query($con, $sql);
}

function getTotalBill(){
    $con = dbConnection();
    $sql = "SELECT SUM(Price) AS total FROM Cart";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

function clearCart(){
    $con = dbConnection();
    $sql = "DELETE FROM Cart";
    return mysqli_query($con, $sql);
}

?>
