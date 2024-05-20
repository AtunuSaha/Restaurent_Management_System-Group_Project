                      <!-- CUSTOMER -->
<?php

    session_start();

if($_SESSION['flag'] == true){
    session_destroy();
    header("location:../view/sign-in.php");
  
}
else
{
    header("location:../view/sign-in.php");
}

    
?>