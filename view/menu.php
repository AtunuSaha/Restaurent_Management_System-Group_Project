                           <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/menu-model.php');

    if (isset($_GET['search'])) $result = searchItem($_GET['search']);
    else $result = getAllAvailableItem();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Menu</title>
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/button.css">

   

    <style>
     tr{background-color: Lavender;}
    </style>
</head>
<body>

    <br><br>
    <center><h1>Menu</h1>
    <br>
    <form method="post" action="../controller/search-item-controller.php" novalidate autocomplete="off"><input type="text" name="search"placeholder="Search Items by Name">&nbsp;&nbsp;&nbsp;<button class= "b2">Search</button></form><br><br>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td align = center>
                    <b>Item Picture</b>
                </td>
                <td align = center>
                    <b>Item Name</b>
                </td>
                <td align = center>
                    <b>Category</b>
                </td>
                <td align = center>
                    <b>Price</b>
                </td>
                <td align = center>
                    <b>Action<b>
                </td>
                <hr width=auto color = purple><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $id=$w['ItemID'];
                    $name=$w['ItemName'];
                    $pic=$w['ItemPicture'];
                    $category=$w['Category'];
                    $price=$w['Price'];
                    echo "    
                    <tr><td align = center><img src=\"../{$pic}\" width=\"100px\"></td>
                    <td align = center>$name</td>
                    <td align = center>$category</td>
                    <td align = center>$price</td> 
                    <td align = center><a href=\"item-page.php?id={$id}\">Show Details and Give Review</a></td>          
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Item Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <br><br>
      <!--  <center><a class="c" href="customer-home.php"><button name="c">Go Back</button></a><center>-->
        
        
</body>
</html>