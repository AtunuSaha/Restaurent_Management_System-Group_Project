<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');
    require_once('../Model/customer_review_model.php');
    require_once('../Model/user_info_model.php');
    require_once('../Model/menu_model.php');
  
    $result = getPendingReview();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Customer Review</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="approve-customer-review">
    <br><br>
    <form style="padding-left: 30px ">
      <input style="background-color:#477e77; border: none; padding: 8px 15px; border-radius: 5px" type="button"
        value="Back!" onclick="history.back()">
    </form>
    <center><h1>Pending Review List</h1>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    Item Name
                </td>
                <td>
                    Customer Name
                </td>
                <td>
                    Review
                </td>
                <td>
                    Action
                </td>
                <hr width=auto><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $reviewID = $w['ReviewID'];
                    $customerName = getUsernameByID($w['UserID']);
                    $itemName = getItemNameByID($w['ItemID']);
                    $review = $w['Review'];
                    echo "    
                    <tr><td>$itemName</td>
                    <td>$customerName</td>
                    <td>$review</td> 
                    <td><a href=\"../Controller/approve_customer_review_controller.php?id={$reviewID}\">Approve Review</a></td>          
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Pending Reviews.</td></tr>";
            }
        ?>
        </table>
        </center>
                
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
    </div>

        <?php  require_once('footer.php')?>
</body>
</html>