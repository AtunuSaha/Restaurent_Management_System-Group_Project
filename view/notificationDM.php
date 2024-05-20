<?php
session_start();
if (!isset($_SESSION['LoggedIn'])) header('location:sign-in.php?err=loginFirst');
require_once('../models/notification-model.php');

$result = getDeliverymanNotification();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Notification.css">
    <title>Notification</title>
</head>
<body>
    <div class="center-container">
        <h1>Notification</h1>
        <?php 
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                while ($w = mysqli_fetch_assoc($result)) {
                    $notification = $w['Notification'];
                    echo "<tr><td>$notification</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<table><tr><td align='center'>No Notifications Found</td></tr></table>";
            }
        ?>
    </div>
</body>
</html>
