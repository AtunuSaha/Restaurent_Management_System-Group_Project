<?php 
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div id="managerhome-head">
                <button name="x"><a class="home" href="view_info.php">View Information</a></button>
                <br><br>
                <button name="x"><a class="home" href="edit_info.php">Edit Information</a></button>
                <br><br>
                <button name="x"><a class="home" href="update_profile_pic.php">Update Profile Picture</a></button>
                <br><br>
                <button name="x"><a class="home" href="update_pass.php">Update Password</a></button>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                
                
                
    </div>            

                <?php  require_once('footer.php')?>
</body>
</html>