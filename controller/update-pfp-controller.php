                         <!-- CUSTOMER -->
<?php

    require_once('../model/user-info-model.php');
    
    $id = $_SESSION['id'];
    $src = $_FILES['myfile']['tmp_name'];

    if(empty($src)){

        header('location:../view/update-pfp.php?err=empty');
        exit();

    }

    $fileName = 'Uploads/Images/'.$_FILES['myfile']['name'];
    $des = "../Uploads/Images/".$_FILES['myfile']['name'];

    if(move_uploaded_file($src, $des)){ 

        updateProfilePicture($fileName, $id);
        header('location:../view/update-pfp.php?success=uploaded');
        exit();

    }
    else{
        header('location:../view/update-pfp.php?err=failed');
        exit();
    }


?>