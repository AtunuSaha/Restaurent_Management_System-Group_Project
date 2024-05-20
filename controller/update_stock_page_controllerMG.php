<?php

$id = $_GET['id'];

require_once('../Model/menu_model.php');

function sanitize($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;

}

if(isset($_POST['submit'])){

    $stock = sanitize($_POST['stock']);

    if(empty($stock)){
        header('location:../View/update_stock_page.php?err=stockEmpty&id='.$id); 
        exit();
    }
    if(is_numeric($stock)){
        if($stock>=0 && $stock<=100){}
        else {
            header('location:../View/update_stock_page.php?err=stockInvalid&id='.$id); 
            exit();
        }
    }
    else {
        header('location:../View/update_stock_page.php?err=stockInvalid&id='.$id); 
        exit();
    }

    if(updateStock($id, $stock)==true){
        header('location:../View/update_stock_page.php?success=updated&id='.$id); 
        exit();
    }
}

?>