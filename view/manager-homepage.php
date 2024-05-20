<?php

session_start();
if (!isset($_COOKIE['flag']))
    header('location:login.php?err=login');

require_once ('../Model/user_info_model.php');

$id = $_COOKIE['id'];
$row = userInfo($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Home</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <div id="managerhome-head">
        <?php echo "<img class=\"profile-picture\" src=\" ../{$row['ProfilePicture']} \" width=\"40px\">"; ?>
        <br><br>


        <button name="y"><a class="home" href="profile.php">Profile</a></button>


        <button name="z"><a class="home" href="../Controller/logout_controller.php">Logout</a></button><br><br>


        <button name="x"><a class="home" href="view_all_delivery_person.php">View All Delivery Person</a></button>
        <br><br>

        <button name="x"><a class="home" href="recruit_delivery_person.php">Recruit Delivery Person</a></button>
        <br><br>

        <button name="x"><a class="home" href="overview.php">Overview</a></button>
        <br><br>

        <button name="x"><a class="home" href="update_stock.php">Update Stock</a></button>
        <br><br>

        <button name="x"><a class="home" href="approve_customer_review.php">Approve Customer Review</a></button>
        <br><br><br><br><br><br><br><br>

    </div>
    <?php require_once ('footer.php') ?>
</body>

</html>