                     <!-- CUSTOMER -->
<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'RestaurantManagementSystem');
    return $conn;
    
}

?>
