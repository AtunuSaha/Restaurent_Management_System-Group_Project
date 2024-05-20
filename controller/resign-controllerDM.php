
<?php
session_start();

    require_once('../models/user-info-model.php');
            
    $id = $_SESSION['LoggedIn'];
    $row = userInfo($id);

    $password = $_POST['password'];

    if(empty($password)){
        header('location:../views/resign.php?err=empty'); 
        exit();
    }

    if($password != $row['Password']){
        header('location:../views/resign.php?err=mismatch'); 
        exit();
    }

    $status = resign($id);
    if($status) header('location:../views/resign.php?success=confirmed');

?>