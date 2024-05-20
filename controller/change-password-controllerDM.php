
<?php

require_once('../models/user-info-model.php');

session_start();

if(isset($_POST['submit'])){

    $mail = $_SESSION['mail'];
    $row = getUserByMail($mail); 
    $id = $row['UserID'];
    $dob = $_POST['dob'];
    $dob = date("d-m-Y", strtotime($dob));
    $cdob = $row['DOB'];
    
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if(empty($_POST['dob'])){
        header('location:../views/change-password.php?err=empty');
        exit();
    }

    if($dob != $cdob){
        header('location:../views/change-password.php?err=dobError');
        exit();
    }

    if(strlen($password)<8){
        header('location:../views/change-password.php?err=invalid');
        exit();
    }

    if($password!=$cpassword){
        header('location:../views/change-password.php?err=mismatch');
        exit();
    }

    else{
        if(changePassword($id, $password) === true){
            header('location:../views/sign-in.php?success=changed');
            exit();
        }
    }
    
}

?>