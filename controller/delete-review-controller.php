                              <!-- CUSTOMER -->
<?php

    require_once('../model/customer-review-model.php');

    $rid = $_GET['rid'];
    $id = $_GET['id'];


    $status = deleteReview($rid);
    if($status) header('location:../view/item-page.php?id='.$id);


?>