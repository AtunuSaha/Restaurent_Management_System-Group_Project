<?php
session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:sign-in.php?err=loginFirst');
    require_once('../models/menu-model.php');

    if (isset($_GET['search'])) $result = searchItem($_GET['search']);
    else $result = getAllAvailableItem();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <br><br>
    <center><h1>Menu</h1>
    <br>
    <form method="post" action="../controllers/search-item-controller.php" novalidate autocomplete="off"><input type="text" name="search">&nbsp;&nbsp;&nbsp;<button>Search</button></form><br><br>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    Item Name
                </td>
                <td>
                    Category
                </td>
                <td>
                    Price
                </td>
                <td>
                    Action
                </td>
                <hr width=auto><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $id=$w['ItemID'];
                    $name=$w['ItemName'];
                    $category=$w['Category'];
                    $price=$w['Price'];
                    echo "    
                    <tr><td>$name</td>
                    <td>$category</td>
                    <td>$price</td> 
                    <td><a href=\"item-page.php?id={$id}\">Show Details</a></td>          
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Item Found</td></tr>";
            }
        ?>
        </table>
        </center>
</body>
</html>