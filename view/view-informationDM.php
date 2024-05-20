<?php
session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:sign-in.php?err=loginFirst');
    require_once('../models/user-info-model.php'); 

    $id = $_SESSION['LoggedIn'];
    $row = userInfo($id);
    $flag = 0;
    if(isset($_GET['id'])){
    $id2 = $_GET['id'];
    $row2 = UserInfo($id2);
    if($id!=$id2) $flag = 1;
    } 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/View-Info.css">
    <title>View Information</title>
</head>
<body>
    <br><br>
    <br><br>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <?php

                if($flag==0){

                echo "<td>
                    Full Name : {$row['Fullname']} </font><br><br>
                    Username  : {$row['Username']} </font><br><br>
                    DOB       : {$row['DOB']} </font><br><br>
                    Religion  : {$row['Religion']} </font><br><br>
                    Phone     : {$row['Phone']} </font><br><br>
                    Email     : {$row['Email']} </font><br><br>
                    Address   : {$row['Address']} </font><br>
                </td>";

                }else{

                echo "<td>
                    Full Name : {$row2['Fullname']} </font><br><br>
                    Username  : {$row2['Username']} </font><br><br>
                    DOB       : {$row2['DOB']} </font><br><br>
                    Religion  : {$row2['Religion']} </font><br><br>
                    Phone     : {$row2['Phone']} </font><br><br>
                    Email     : {$row2['Email']} </font><br><br>
                    Address   : {$row2['Address']} </font><br>
                </td>";

                }

            ?>
        </tr>
    </table>
</body>
</html>