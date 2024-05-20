                       <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
require_once('../model/user-info-model.php'); 
$id = $_SESSION['id'];
$row = userInfo($id);
$error_msg = '';


if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'empty': {
        $error_msg = "No file selected.";
        break;
      }
    case 'failed': {
        $error_msg = "Profile picture update failed.";
        break;
      }
  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'uploaded': {
        $success_msg = "Profile picture successfully updated.";
        break;
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Update Profile Picture</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/return.css">
    <style>
     tr{background-color: MistyRose;}
    </style>
    <script src="javascript/update-pfp.js"></script>
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
    <center>
    <form action="../controller/update-pfp-controller.php" method="POST" novalidate autocomplete="off" enctype="multipart/form-data" onsubmit="return isValid(this);">
    <br><br>
        <h1>Update Profile Picture</h1><br><br>
        <hr color="black" width="530px">
        <br><br><br>
        <table cellspacing="0" cellpadding="10" border=1>
            <tr>
                <td>
                    <input type="file" name="myfile" accept=".png,.jpg,.jpeg"> <br>
                    <font color="red" align="center" id="pictureError"></font>
                    <br>
                    <input type="submit" value="Upload Image" name="submit">
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                        <br><br>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br><br>
                    <?php } ?>
                    
                </td>
            </tr>
        </table>
    </form>
    </center>
    <br> <br>
    <center><a class="c" href="profile.php"><button name="c">Go Back</button></a></center>
    
</body>
</html>