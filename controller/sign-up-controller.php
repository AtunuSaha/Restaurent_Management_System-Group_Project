                            <!-- CUSTOMER -->
<?php 

    require_once('../model/user-info-model.php');


    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address =$_POST['address'];
    $dob = $_POST['dob'];
    $dob = date("d-m-Y", strtotime($dob));
    $religion = $_POST['religion'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = "Customer";

    if(empty($fullname)){
        header('location:../view/sign-up.php?err=fullnameEmpty'); 
        exit();
    }
    if(empty($phone)){
        header('location:../view/sign-up.php?err=phoneEmpty'); 
        exit();
    }
    if(empty($email)){
        header('location:../view/sign-up.php?err=emailEmpty'); 
        exit();
    }
    if(empty($address)){
        header('location:../view/sign-up.php?err=addressEmpty'); 
        exit();
    }
    if(empty($dob)){
        header('location:../view/sign-up.php?err=dobEmpty'); 
        exit();
    }
    if(empty($religion)){
        header('location:../view/sign-up.php?err=religionEmpty'); 
        exit();
    }
    if(empty($username)){
        header('location:../view/sign-up.php?err=usernameEmpty'); 
        exit();
    }
    if(empty($password)){
        header('location:../view/sign-up.php?err=passwordEmpty'); 
        exit();
    }
    if(empty($cpassword)){
        header('location:../view/sign-up.php?err=cpasswordEmpty'); 
        exit();
    }

    
    if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        header('location:../view/sign-up.php?err=fullnameInvalid'); 
        exit();
    }
    if($phone[0] == "0" && $phone[1] == "1") {}
    else{
        header('location:../view/sign-up.php?err=phoneInvalid'); 
        exit();
    }
    if(is_numeric($phone)){
        if(strlen($phone)==11){}
        else {
            header('location:../view/sign-up.php?err=phoneInvalid'); 
            exit();
        }
    }
    else {
        header('location:../view/sign-up.php?err=phoneInvalid'); 
        exit();
    }
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:./view/sign-up.php?err=emailInvalid'); 
        exit();
    }
    if(uniqueEmail($email)==false){
        header('location:../view/sign-up.php?err=emailExists'); 
        exit();
    }
    if (!preg_match("/^[a-zA-Z-']*$/", $username)){
        header('location:../view/sign-up.php?err=usernameInvalid'); 
        exit();
    } 

    if (strlen($password) < 8){
        header('location:../view/sign-up.php?err=passwordInvalid'); 
        exit();
    }
    if ($password != $cpassword){
        header('location:../view/sign-up.php?err=passwordMismatch'); 
        exit();
    }
    
    
    $status = addUser($fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role);
    if($status) header('location:../view/sign-in.php?success=created');

?>