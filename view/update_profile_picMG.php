<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile Picture</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
   
    <div class="update-profile">
    <form action="../Controller/update_profile_pic_controller.php" method="POST" enctype="multipart/form-data">
        <h1>Update Profile Picture</h1>
        <br>
             <input type="file" name="myfile" accept=".png,.jpg,.jpeg"> <br> <br>
             <input type="submit" value="Upload Image" name="submit">
             <?php if (strlen($error_msg) > 0) { ?>
              <br><br>
              <font><?= $error_msg ?></font>
               <br><br>
               <?php } ?>
                <?php if (strlen($success_msg) > 0) { ?>
             <br><br>
            <font><?= $success_msg ?></font>
            <br><br>
            <?php } ?>
    </form>
    <br><br><br>
    </div>
    <?php  require_once('footer.php')?>
</body>
</html>