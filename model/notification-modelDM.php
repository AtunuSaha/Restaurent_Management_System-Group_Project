<?php

    require_once('database.php');

    $row;

    function getDeliverymanNotification(){

        $con = dbConnection();
        $sql = "select * from Notification where Receiver = 'Delivery Man';";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }

    function customerNotification($userID, $notification, $receiver){

        $con = dbConnection();
        $sql = "insert into Notification values('', {$userID} ,'{$notification}', '{$receiver}')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }

?>