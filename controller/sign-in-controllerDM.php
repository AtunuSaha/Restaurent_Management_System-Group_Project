
<?php
session_start();

    require_once('../models/user-info-model.php');
    
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(strlen(trim($email)) == 0 || strlen(trim($password)) == 0){

            header('location:../views/sign-in.php?err=empty');
            return;

        }

        $status = login($email, $password);

        if($status!=false){
            if($status['Role'] == "Delivery Man" and ($status['Status'] == "Active" or $status['Status'] == "Resigning")){

                $_SESSION['LoggedIn'] = $status['UserID'];
                header('location:../views/deliveryman-home.php');

            }
            else header('location:../views/sign-in.php?err=bannedUser');

        }else header('location:../views/sign-in.php?err=mismatch');
        
    }

?>