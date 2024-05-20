                         <!-- CUSTOMER -->
<?php

    require_once('../model/customer-review-model.php');

    $itemID = $_GET['id'];
    $userID = $_SESSION['id'];
    $status = "Inactive";
    $review = $_POST['review'];

    if(empty($review)){

        header('location:../view/item-page.php?err=empty&id='.$itemID);
        exit;

    }


    $status = postReview($itemID, $userID, $review, $status);
    if($status) header('location:../view/item-page.php?success=posted&id='.$itemID);

?>