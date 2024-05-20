<?php
    session_start();
    if (!isset($_SESSION['LoggedIn'])) {
        header('location:sign-in.php?err=loginFirst');
    }
    require_once('../models/user-info-model.php');

    $id = $_SESSION['LoggedIn'];
    $row = userInfo($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Home.css">
    <title>Delivery Man Home</title>
</head>
<body class="background-image"> <!-- Add class "background-image" to enable background image -->
    <header>
        <a href="profile.php">Profile</a>
        <a href="../controllers/logout-controller.php">Logout</a>
    </header>
    <div class="main-container">
        <table border="1" cellspacing="0" cellpadding="25" align="center">
            <tr>
                <td>
                    <a href="notification.php">Notification</a>
                    <br><br>
                    <a href="order-list.php">Order List</a>
                    <br><br>
                    <a href="resign.php">Resign</a>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
