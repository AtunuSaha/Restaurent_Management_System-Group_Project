                           <!-- CUSTOMER -->
<?php

require_once('../model/user-info-model.php');
session_start();

if(isset($_POST['submit'])){

    $mail = $_POST['email'];

    if(empty($mail)) {
        header('location:../view/forgot-password.php?err=empty');
        exit();
    }
    if(uniqueEmail($mail)) {
        header('location:../view/forgot-password.php?err=notFound');
        exit();
    }

    $_SESSION['mail'] = $mail;

    header('location:../view/change-password.php');

}


?>