                             <!-- CUSTOMER.... -->
<?php 
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    $error_msg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];

    switch ($err_msg) {
        case 'empty': {
            $error_msg = "Please type something first.";
            break;
        }
    }
    }

    $success_msg = '';

    if (isset($_GET['success'])) {

    $s_msg = $_GET['success'];

    switch ($s_msg) {
        case 'posted': {
            $success_msg = "Complaint sent to admin successfully.";
            break;
        }
    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Complaint</title>
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/return.css">
    <script src="javascript/complaint.js"></script>
</head>
<body>

    <center>
    <form method="post" action="../controller/complaint-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
        <h1>Write a complaint to admin</h1>
        <textarea name="complaint" cols="50" rows="20"></textarea><br><font color="red" align="center" id="complaintError"></font><br>
        <input type="submit">
    </form>
    <?php if (strlen($error_msg) > 0) { ?>
        <br><br>
        <font color="red" align="center"><?= $error_msg ?></font>
        <br>
    <?php } ?>
    <?php if (strlen($success_msg) > 0) { ?>
        <br><br>
        <font color="green" align="center"><?= $success_msg ?></font>
        <br>
    <?php } ?>
    </center>

    <br><br>
   <!-- <center><a class="c" href="customer-home.php"><button name="c">Go Back</button></a></center>-->
    
    
</body>
</html>