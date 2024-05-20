<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');

    require_once('../Model/user_info_model.php'); 

    $id = $_COOKIE['id'];
    $row = userInfo($id);
    $flag = 0;
    if(isset($_GET['id'])){
    $id2 = $_GET['id'];
    $row2 = userInfo($id2);
    if($id!=$id2) $flag = 1;
    } 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Information</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
   <div style="background-color: #94c7c0cf;">
   <br><br>
   <form style="padding-left: 30px ">
      <input style="background-color:#477e77; border: none; padding: 8px 15px; border-radius: 5px" type="button"
        value="Back!" onclick="history.back()">
    </form>
    <?php

if ($flag == 0) {
    echo "<img class=\"pro\" src=\"../{$row['ProfilePicture']}\">";
} else {
    echo "<img class=\"pro\" src=\"../{$row2['ProfilePicture']}\" >";
}

    ?>
    
    <br><br>
   </div>
    
            <?php

if ($flag == 0) {
    echo "
        <div class='user-info'>
            Full Name : <span class='fullname'>{$row['Fullname']}</span><br><br>
            Address   : <span class='address'>{$row['Address']}</span><br><br>
            Username  : <span class='username'>{$row['Username']}</span><br><br>
            DOB       : <span class='dob'>{$row['DOB']}</span><br><br>
            Religion  : <span class='religion'>{$row['Religion']}</span><br><br>
            Phone     : <span class='phone'>{$row['Phone']}</span><br><br>
            Email     : <span class='email'>{$row['Email']}</span><br><br>
        </div>";
} 
else {
    echo "
        <div class='user-info'>
            Full Name : <span class='fullname'>{$row2['Fullname']}</span><br><br>
            Username  : <span class='username'>{$row2['Username']}</span><br><br>
            DOB       : <span class='dob'>{$row2['DOB']}</span><br><br>
            Religion  : <span class='religion'>{$row2['Religion']}</span><br><br>
            Phone     : <span class='phone'>{$row2['Phone']}</span><br><br>
            Email     : <span class='email'>{$row2['Email']}</span><br><br>
            Address   : <span class='address'>{$row2['Address']}</span><br>
        </div>";
}
?>


<?php  require_once('footer.php')?>
       
</body>
</html>