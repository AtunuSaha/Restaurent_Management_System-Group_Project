<?php 

    require_once('../Model/user_info_model.php');
    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    $id = $_COOKIE['id'];
    $row=  userInfo($id);

    $fullname = sanitize($_POST['fullname']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);
    $religion = sanitize($_POST['religion']);
    $username = sanitize($_POST['username']);

    if(empty($fullname)){
        header('location:../View/edit_info.php?err=fullnameEmpty'); 
        exit();
    }
    if(empty($phone)){
        header('location:../View/edit_info.php?err=phoneEmpty'); 
        exit();
    }
    if(empty($email)){
        header('location:../View/edit_info.php?err=emailEmpty'); 
        exit();
    }
    if(empty($address)){
        header('location:../View/edit_info.php?err=addressEmpty'); 
        exit();
    }
    if(empty($religion)){
        header('location:../View/edit_info.php?err=religionEmpty'); 
        exit();
    }
    if(empty($username)){
        header('location:../View/edit_info.php?err=usernameEmpty'); 
        exit();
    }

    $namepart = explode(' ', $fullname);
    if(count($namepart) < 2) {
        header('location:../View/edit_info.php?err=fullnameInvalid'); 
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        header('location:../View/edit_info.php?err=fullnameInvalid'); 
        exit();
    }

    if($phone[0] == "0" && $phone[1] == "1") {}
    else{
        header('location:../View/edit_info.php?err=phoneInvalid'); 
        exit();
    }
    if(is_numeric($phone)){
        if(strlen($phone)==11){}
        else {
            header('location:../View/edit_info.php?err=phoneInvalid'); 
            exit();
        }
    }
    else {
        header('location:../View/edit_info.php?err=phoneInvalid'); 
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:../View/edit_info.php?err=emailInvalid'); 
        exit();
    }
    if($email != $row['Email'] && uniqueEmail($email)==false){
        header('location:../View/edit_info.php?err=emailExists'); 
        exit();
    }
    if (!preg_match("/^[a-zA-Z-']*$/", $username)){
        header('location:../View/edit_info.php?err=usernameInvalid'); 
        exit();
    }
    
    
    if(updateUserInfo($id, $fullname, $email, $phone, $address, $religion, $username) === true){
        header('location:../View/edit_info.php?success=changed'); 
        exit();
    }


?>