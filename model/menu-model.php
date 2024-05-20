               <!-- CUSTOMER -->
<?php

require_once('database.php');

function getAllItem(){
    $con = dbConnection();
    $sql = "SELECT * FROM Menu";
    return mysqli_query($con, $sql);
}

function getAllAvailableItem(){
    $con = dbConnection();
    $sql = "SELECT * FROM Menu WHERE Stock > 0";
    return mysqli_query($con, $sql);
}

function itemInfo($id){
    $con = dbConnection();
    $sql = "SELECT * FROM Menu WHERE ItemID = '$id'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

function updateStock($id, $stock){
    $con = dbConnection();
    $sql = "UPDATE Menu SET Stock = '$stock' WHERE ItemID = '$id'";
    return mysqli_query($con, $sql);
}

function getItemNameByID($id){
    $con = dbConnection();
    $sql = "SELECT ItemName FROM Menu WHERE ItemID = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['ItemName'];
}

function searchItem($itemName){
    $con = dbConnection();
    $sql = "SELECT * FROM Menu WHERE ItemName LIKE '%$itemName%'";
    return mysqli_query($con, $sql);
}

?>
