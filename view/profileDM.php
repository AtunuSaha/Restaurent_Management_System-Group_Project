<?php
session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:sign-in.php?err=loginFirst');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <a href="view-information.php">View Information</a>
                <br><br>
                <a href="edit-information.php">Edit Information</a>
                <br><br>
                <a href="update-password.php">Update Password</a>
            </td>
        </tr>
    </table>

</body>
</html>