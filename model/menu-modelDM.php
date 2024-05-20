<?php

    require_once('database.php');

    $row;

    function getAllItem(){

        $con = dbConnection();
        $sql = "select * from Menu;";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }
    function getAllAvailableItem(){

        $con = dbConnection();
        $sql = "select * from Menu where Stock > 0;";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }

    function itemInfo($id){

        $con=dbConnection();
        $sql="select * from Menu where ItemID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }

    function updateStock($id, $stock){

        $con=dbConnection();
        $sql = "update Menu set Stock = '$stock' where ItemID = '$id'";

        if(mysqli_query($con,$sql)===true) return true;
        else return false; 

    }

    function getItemNameByID($id){

        $con = dbConnection();
        $sql = "select ItemName from Menu where ItemID = '$id'";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row['ItemName'];

    }

    function searchItem($itemName){

        $con = dbConnection();
        $sql = "select * from Menu where ItemName like '%{$itemName}%';";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }

?>