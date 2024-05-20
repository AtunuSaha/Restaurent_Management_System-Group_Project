<?php

require_once('../Model/user_info_model.php');
session_start();

if(isset($_POST['submit'])){

    $mail = $_POST['email'];

    if(empty($mail)) {
        header('location:../View/forgot_pass.php?err=empty');
        exit();
    }
    if(uniqueEmail($mail)) {
        header('location:../View/forgot_pass.php?err=notFound');
        exit();
    }

    $_SESSION['mail'] = $mail;

    header('location:../View/change_pass.php');

}


?>