                         <!-- CUSTOMER -->
<?php

require_once('database.php');

function customerNotification($userID, $notification, $receiver){
    $con = dbConnection();
    $sql = "INSERT INTO Notification (UserID, Notification, Receiver) VALUES ('$userID', '$notification', '$receiver')";
    return mysqli_query($con, $sql);
}

function deliverymanNotification($userID, $notification, $receiver){
    $con = dbConnection();
    $sql = "INSERT INTO Notification (UserID, Notification, Receiver) VALUES ('$userID', '$notification', '$receiver')";
    return mysqli_query($con, $sql);
}

function getCustomerNotification($id){
    $con = dbConnection();
    $sql = "SELECT * FROM Notification WHERE UserID = '$id' AND Receiver = 'Customer'";
    return mysqli_query($con, $sql);
}

?>
