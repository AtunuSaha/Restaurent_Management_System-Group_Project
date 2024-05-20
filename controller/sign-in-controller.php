                              <!-- CUSTOMER -->
<?php

session_start();

    require_once('../model/user-info-model.php');

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $remember;
 
        if(isset($_POST['rememberMe'])){
            $remember="true";
        }
        if(!isset($_POST['rememberMe'])){
            $remember="false";
        }

        if(strlen(trim($email)) == 0 || strlen(trim($password)) == 0){

            header('location:../view/sign-in.php?err=empty');
            return;

        }

        $status = login($email, $password);

        if($status!=false){
            if($status['Role'] == "Customer" and $status['Status'] == "Active" ){

                $_SESSION['flag'] = true;
                
                $_SESSION['id'] = $status['UserID'];
                if($remember=="true") {
                    $flag="true";
                }
                if($remember=="false"){

                    $flag="false";
                }
                header('location:../view/customer-home.php');

            }
            else header('location:../view/sign-in.php?err=bannedUser');

        }else header('location:../view/sign-in.php?err=mismatch');
        
    }

?>