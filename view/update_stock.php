<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');
    require_once('../Model/menu_model.php');
  
    $result = getAllItem();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<div class="update-stock">
<br><br>

<form style="padding-left: 30px ">
      <input style="background-color:#477e77; border: none; padding: 8px 15px; border-radius: 5px" type="button"
        value="Back!" onclick="history.back()">
    </form>
    <center><h1>Menu</h1>
    <?php 
           
        if(mysqli_num_rows($result)>0){
            echo" <table width=\"85%\" cellspacing=\"0\" cellpadding=\"15\">
        <tr>
            <td>
                Item ID
            </td>
            <td>
                Item Name
            </td>
            <td>
                Stock
            </td>
            <td>
                Action
            </td>
            <hr width=auto><br>
        </tr>";
            while($w=mysqli_fetch_assoc($result)){
                $itemid=$w['ItemID'];
                $name=$w['ItemName'];
                $stock=$w['Stock'];
                echo "    
                <tr><td>$itemid</td>
                <td>$name</td>
                <td>$stock</td>
                <td><a href=\"update_stock_page.php?id={$itemid}\">Update Stock</a></td>     
                </tr>";
            }
        }else{
                echo"<tr><td align=\"center\">Menu is empty.</td></tr>";
            }
    ?>
    </table>
    </center>
    <br><br><br><br><br><br>
</div>
    <?php  require_once('footer.php')?>
</body>
</html>