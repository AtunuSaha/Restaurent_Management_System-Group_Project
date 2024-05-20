
<?php

    require_once('../models/user-info-model.php');
    
    $id = $_COOKIE['id'];
    $src = $_FILES['myfile']['tmp_name'];

    if(empty($src)){

        header('location:../views/update-pfp.php?err=empty');
        exit();

    }

    $fileName = 'Uploads/Images/'.$_FILES['myfile']['name'];
    $des = "Uploads/Images/".$_FILES['myfile']['name'];

    if(move_uploaded_file($src, $des)){ 

        updateProfilePicture($fileName, $id);
        header('location:../views/update-pfp.php?success=uploaded');
        exit();

    }
    else{
        header('location:../views/update-pfp.php?err=failed');
        exit();
    }


?>