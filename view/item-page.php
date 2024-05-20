                          <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/menu-model.php'); 
    require_once('../model/user-info-model.php'); 
    require_once('../model/customer-review-model.php'); 

    $userid = $_SESSION['id'];
    $id = $_GET['id'];
    $row = itemInfo($id);

    $result = getAllReviews($id);

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
            $success_msg = "Review is pending for manager approval.";
            break;
        }
    }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Item Details & Review Page</title>
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/button.css">
    <script src="javascript/item-page.js"></script>
    <style>
     tr{background-color: Lavender;}
    </style>
</head>
<body>

    <h1 align="center">Item Details & Review Page</h1>
    <br><br>
    <table width="35%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
        <td>
            <img src="<?php echo "../".$row['ItemPicture']; ?>" width="500px">
            <h3><?php echo $row['ItemName']; ?></h3>
            <b>Category : </b><?php echo $row['Category']; ?>
            <br><br>
            <b>Price :</b> <?php echo $row['Price']; ?>
            <br><br><br>
            <center><a href="add-to-cart.php?id=<?php echo $row['ItemID']; ?>">Add To Cart</a></center>
        </td>
        </tr>
    </table>
    <br><br>
    <table width="35%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
        <td>
            <h1 align="center">Reviews</h1>
            <?php 
                if(mysqli_num_rows($result)>0){
                    while($w=mysqli_fetch_assoc($result)){
                        $uid=$w['UserID'];
                        $rid=$w['ReviewID'];
                        $name = getUsernameByID($uid);
                        $review=$w['Review'];
                        echo "<b>{$name} : </b>
                        {$review}<br>" ?><?php
                        if($userid == $uid){
                            echo "<br><a href=\"../controller/delete-review-controller.php?rid={$rid}&id={$id}\">Delete Review</a><br><br>";
                        }
                        echo "<br>";
                    }
                }
            ?>
            <br>
            <form method="post" action="../controller/post-review-controller.php?id=<?php echo $row['ItemID']; ?>" novalidate autocomplete="off" onsubmit="return isValid(this);">
            <textarea rows="10" cols="53" name="review"></textarea>
            <br><center><font color="red" align="center" id="reviewError"></font></center><br>
            <button class= "b3"name="submit">Post Review</button></form>
            <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>s
                        <font color="red" align="center"><?= $error_msg ?></font>
                        <br>
                    <?php } ?>
            <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br>
                    <?php } ?>
        </td>
        </tr>
    </table>
    <br><br>
    <center><a class="c" href="menu.php"><button name="c">Go Back</button></a></center>
    
    
</body>
</html>