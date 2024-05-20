<?php

    require_once('database.php');

    $row;

    function getPendingReview(){

        $con = dbConnection();
        $sql = "select * from customer_review where Status = 'Inactive'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function approveReview($id){

        $con = dbConnection();
        $sql = "update customer_review set status = 'Active' where ReviewID = '$id'";
        $result = mysqli_query($con,$sql);
        
        if($result) return $result;
        else return false;
        
    }


?>