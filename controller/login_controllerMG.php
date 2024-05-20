<?php

session_start();

require_once('../Model/user_info_model.php');



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

        header('location:../View/login.php?err=empty');
        return;

    }

    $status = login($email, $password);

    if($status!=false){
        if($status['Role'] == "Manager" and $status['Status'] == "Active" ){

            if($remember=="true") setcookie("flag", "true", time()+999999999,"/");
            if($remember=="false") setcookie("flag","false",time()+3600,"/");
            $_SESSION['flag'] = "true";
            setcookie("id", $status['UserID'], time()+86400, "/");
            header('location:../View/manager-homepage.php');

        }
        else header('location:../View/login.php?err=bannedUser');

    }else header('location:../View/login.php?err=wrong');
    
}

?>