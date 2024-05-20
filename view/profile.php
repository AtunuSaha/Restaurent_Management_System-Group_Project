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
    
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/link2.css">
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

    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
               <h1 align="center">Update Your Profile</h1>
               
                <center><a class="b" href="view-information.php"><button name="b">View Information</button></a></center>
                <br><br>
                <center><a class="b" href="edit-information.php"><button name="b">Edit Information</button></a></center>
                <br><br>
                <center><a class="b" href="update-pfp.php"><button name="b">Update Profile Picture</button></a></center>
                <br><br>
                <center><a class="b" href="update-password.php"><button name="b">Update Password</button></a></center>
                <br><br>
               
            </td>
        </tr>
    </table>
    <br><br>
    <center><a class="c" href="customer-home.php"><button name="c">Go Back</button></a></center>

</body>
</html>