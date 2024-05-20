                       <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/notification-model.php');
  
    $id = $_SESSION['id'];
    $result = getCustomerNotification($id);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Notification</title>
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/return.css">
    <style>
     tr{background-color: Lavender;}
    </style>
</head>
<body>

    <br><br>
    <center><h1>Notification</h1>
        <?php 
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">";
                while($w=mysqli_fetch_assoc($result)){
                    $notification=$w['Notification'];
                    echo "    
                    <tr><td>$notification</td></tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Notifications Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <br><br>
       <!-- <center><a class="c" href="customer-home.php"><button name="c">Go Back</button></a></center>-->
        
        
</body>
</html>