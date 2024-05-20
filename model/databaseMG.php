<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'manager_data');
    return $conn;
    
}

?>