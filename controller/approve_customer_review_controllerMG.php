<?php

    require_once('../Model/customer_review_model.php'); 
    
    $id = $_GET['id'];
    
     if(approveReview($id)) header('location:../View/approve_customer_review.php');

?>