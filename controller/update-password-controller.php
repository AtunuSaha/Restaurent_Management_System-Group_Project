                    <!-- CUSTOMER -->
<?php

require_once('../model/user-info-model.php');

          
$id=$_SESSION['id'];
$row=UserInfo($id);

if(isset($_POST['submit'])){

    $prevpassword = $_POST['prevpassword'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if(empty($prevpassword)){
        header('location:../view/update-password.php?err=prevpasswordEmpty'); 
        exit();
    }
    if(empty($password)){
        header('location:../view/update-password.php?err=passwordEmpty'); 
        exit();
    }
    if(empty($cpassword)){
        header('location:../view/update-password.php?err=cpasswordEmpty'); 
        exit();
    }

    if($prevpassword != $row['Password']){
        header('location:../view/update-password.php?err=passwordError'); 
        exit();
    }

    if(strlen($password)<8){
        header('location:../view/update-password.php?err=invalid'); 
        exit();
    }
    
    if($password!=$cpassword){
        header('location:../view/update-password.php?err=mismatch'); 
        exit();
    }


    if(changePassword($id,$password)==true){
        header('location:../view/update-password.php?success=updated'); 
        exit();
    }
}
?>