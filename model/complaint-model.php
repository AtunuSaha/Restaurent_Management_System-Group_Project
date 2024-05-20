                          <!-- CUSTOMER -->
<?php

require_once('database.php');

function sendComplaint($fullname, $complaint){
    $con = dbConnection();
    $sql = "INSERT INTO Complaint (CustomerName, Complaint) VALUES ('$fullname', '$complaint')";
    return mysqli_query($con, $sql);
}

?>
