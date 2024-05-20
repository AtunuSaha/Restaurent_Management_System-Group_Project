                        <!-- CUSTOMER -->
<?php

    require_once('../model/menu-model.php');
    

    $search = $_POST['search']; 

    if(empty($search)) {
        header('location:../view/menu.php');
        exit;
    }

    header('location:../view/menu.php?search='.$search);

?>