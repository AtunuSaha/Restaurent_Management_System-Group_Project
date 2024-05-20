                             <!-- CUSTOMER.... -->
<?php

session_start();

if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/user-info-model.php'); 

    $id = $_SESSION['id'];
    $row = userInfo($id);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>View Information</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/return.css">
    <style>
     tr{background-color: MistyRose;}
    </style>
</head>
<body>
<?php require 'header2.php'; ?>
<center>
    <div class="colorful-text">
    <?php
                echo "<td>
                    <center> {$row['Fullname']}'s Profile </font><br><br></center>
                   
                </td>";
    ?></div>
    
</center>
<h1 align="center">Your Information</h1>
    <br><br>
    <center>
    <?php echo "<img src=\"../{$row['ProfilePicture']}\" width=\"100px\">"; ?>
    </center>
    <br><br>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <?php
                echo "<td>
                    Full Name : {$row['Fullname']} </font><br><br>
                    Username  : {$row['Username']} </font><br><br>
                    DOB       : {$row['DOB']} </font><br><br>
                    Religion  : {$row['Religion']} </font><br><br>
                    Phone     : {$row['Phone']} </font><br><br>
                    Email     : {$row['Email']} </font><br><br>
                    Address   : {$row['Address']} </font><br>
                </td>";
            ?>
             
        </tr>
    </table>
    <br><br>
    <center><a class="c" href="profile.php"><button name="c">Go Back</button></a></center>
   
    
</body>
</html>