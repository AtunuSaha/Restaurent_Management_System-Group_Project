                            <!-- CUSTOMER -->
<?php 
 session_start();
    require_once('../model/user-info-model.php');
    

    $id = $_SESSION['id'];
    $row=  userInfo($id);

    $fullname =$_POST['fullname'];
    $email = $_POST['email'];
    $phone =$_POST['phone'];
    $address =$_POST['address'];
    $religion = $_POST['religion'];
    $username = $_POST['username'];

    if(empty($fullname)){
        header('location:../view/edit-information.php?err=fullnameEmpty'); 
        exit();
    }
    if(empty($phone)){
        header('location:../view/edit-information.php?err=phoneEmpty'); 
        exit();
    }
    if(empty($email)){
        header('location:../view/edit-information.php?err=emailEmpty'); 
        exit();
    }
    if(empty($address)){
        header('location:../view/edit-information.php?err=addressEmpty'); 
        exit();
    }
    if(empty($religion)){
        header('location:../view/edit-information.php?err=religionEmpty'); 
        exit();
    }
    if(empty($username)){
        header('location:../view/edit-information.php?err=usernameEmpty'); 
        exit();
    }

    
    if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        header('location:../view/edit-information.php?err=fullnameInvalid'); 
        exit();
    }

    if($phone[0] == "0" && $phone[1] == "1") {}
    else{
        header('location:../view/edit-information.php?err=phoneInvalid'); 
        exit();
    }
    if(is_numeric($phone)){
        if(strlen($phone)==11){}
        else {
            header('location:../view/edit-information.php?err=phoneInvalid'); 
            exit();
        }
    }
    else {
        header('location:../view/edit-information.php?err=phoneInvalid'); 
        exit();
    }
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:../view/edit-information.php?err=emailInvalid'); 
        exit();
    }
    if( uniqueEmail1($email,$id)==false){
        header('location:../view/edit-information.php?err=emailExists'); 
        exit();
    }
    if (!preg_match("/^[a-zA-Z-']*$/", $username)){
        header('location:../view/edit-information.php?err=usernameInvalid'); 
        exit();
    }
    
    
    if(updateUserInfo($id, $fullname, $email, $phone, $address, $religion, $username) === true){
        header('location:../view/edit-information.php?success=changed'); 
        exit();
    }


?>