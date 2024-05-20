<?php

    require_once('database.php');

    $row;

    function numberOfItem(){

        $con = dbConnection();
        $sql = "select * from Menu";

        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);

    }

    function itemInfo($id){

        $con=dbConnection();
        $sql="select* from Menu where ItemID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }

    function getAllItem(){

        $con = dbConnection();
        $sql = "select * from Menu";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function updateStock($id, $stock){

        $con=dbConnection();
        $sql = $con -> prepare("update Menu set Stock = ? where ItemID = ?");
        $sql -> bind_param("is", $stock, $id); 

        if($sql -> execute()===true) return true;
        else return false; 

    }

    function getItemNameByID($id){

        $con = dbConnection();
        $sql = "select ItemName from Menu where ItemID = '$id'";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row['ItemName'];

    }

?>