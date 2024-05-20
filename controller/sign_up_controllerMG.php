<?php 

    require_once('../Model/user_info_model.php');
    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    $fullname = sanitize($_POST['fullname']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);
    $dob = sanitize($_POST['dob']);
    $dob = date("d-m-Y", strtotime($dob));
    $religion = sanitize($_POST['religion']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $cpassword = sanitize($_POST['cpassword']);
    $role = "Manager";

    if(empty($fullname)){
        header('location:../View/sign_up.php?err=fullnameEmpty'); 
        exit();
    }
    if(empty($phone)){
        header('location:../View/sign_up.php?err=phoneEmpty'); 
        exit();
    }
    if(empty($email)){
        header('location:../View/sign_up.php?err=emailEmpty'); 
        exit();
    }
    if(empty($address)){
        header('location:../View/sign_up.php?err=addressEmpty'); 
        exit();
    }
    if(empty($dob)){
        header('location:../View/sign_up.php?err=dobEmpty'); 
        exit();
    }
    if(empty($religion)){
        header('location:../View/sign_up.php?err=religionEmpty'); 
        exit();
    }
    if(empty($username)){
        header('location:../View/sign_up.php?err=usernameEmpty'); 
        exit();
    }
    if(empty($password)){
        header('location:../View/sign_up.php?err=passwordEmpty'); 
        exit();
    }
    if(empty($cpassword)){
        header('location:../View/sign_up.php?err=cpasswordEmpty'); 
        exit();
    }

    $namepart = explode(' ', $fullname);
    if(count($namepart) < 2) {
        header('location:../View/sign_up.php?err=fullnameInvalid'); 
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        header('location:../View/sign_up.php?err=fullnameInvalid'); 
        exit();
    }
    
    if(strlen($phone)!=11) {
        header('location:../View/sign_up.php?err=phoneInvalid'); 
        exit();
    }
    if($phone[0] == "0" && $phone[1] == "1") {}
    else{
        header('location:../View/sign_up.php?err=phoneInvalid'); 
        exit();
    }
    if(is_numeric($phone)){
        if(strlen($phone)==11){}
        else {
            header('location:../View/sign_up.php?err=phoneInvalid'); 
            exit();
        }
    }
    else {
        header('location:../View/sign_up.php?err=phoneInvalid'); 
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:../View/sign_up.php?err=emailInvalid'); 
        exit();
    }
    if(uniqueEmail($email)==false){
        header('location:../View/sign_up.php?err=emailExists'); 
        exit();
    }
    if (!preg_match("/^[a-zA-Z-']*$/", $username)){
        header('location:../View/sign_up.php?err=usernameInvalid'); 
        exit();
    } 

    if (strlen($password) < 8){
        header('location:../View/sign_up.php?err=passwordInvalid'); 
        exit();
    }
    if ($password != $cpassword){
        header('location:../View/sign_up.php?err=passwordMismatch'); 
        exit();
    }
    
    
    $status = addUser($fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role);
    if($status) header('location:../View/login.php?success=created');

?>