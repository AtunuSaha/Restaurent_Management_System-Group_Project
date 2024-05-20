<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');
    require_once('../Model/user_info_model.php');
  
    $result = getAllDeliveryPerson();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Delivery Person</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div id="view-all-delevary-person">
    <br><br>
    <form style="padding-left: 30px ">
      <input style="background-color:#477e77; border: none; padding: 8px 15px; border-radius: 5px" type="button"
        value="Back!" onclick="history.back()">
    </form>
    <center><h1></h1>Delivery Person List</h1>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    Name
                </td>
                <td>
                    Username
                </td>
                <td>
                    Email
                </td>
                <td>
                    Action
                </td>
                <hr width=auto><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $userid=$w['UserID'];
                    $name=$w['Fullname'];
                    $username=$w['Username'];
                    $email=$w['Email'];
                    echo "    
                    <tr><td>$name</td>
                    <td>$username</td>
                    <td>$email</td> 
                    <td><a href=\"view_info.php?id={$userid}\">Show Details</a></td>          
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Delivery Person Found</td></tr>";
            }
        ?>
        </table>
        </center>

        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>

        <?php  require_once('footer.php')?>
    </div>
</body>
</html>