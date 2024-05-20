                            <!-- CUSTOMER -->
<?php

require_once('database.php');

function getAllReviews($id){
    $con = dbConnection();
    $sql = "SELECT * FROM CustomerReview WHERE ItemID = '$id' AND Status = 'Active'";
    return mysqli_query($con, $sql);
}

function postReview($itemID, $userID, $review, $status){
    $con = dbConnection();
    $sql = "INSERT INTO CustomerReview (ItemID, UserID, Review, Status) VALUES ('$itemID', '$userID', '$review', '$status')";
    return mysqli_query($con, $sql);
}

function deleteReview($id){
    $con = dbConnection();
    $sql = "DELETE FROM CustomerReview WHERE ReviewID = '$id'";
    return mysqli_query($con, $sql);
}

?>
