                            <!-- CUSTOMER.... -->
<?php

    session_start();
    if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/user-info-model.php');

    $id = $_SESSION['id'];
    $row=  userInfo($id);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Customer Home</title>
    
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/link.css">
    <link rel="stylesheet" href="css/girlchef.css">
    <link rel="stylesheet" href="css/return.css">

    <style>
     tr{background-color: Lavender;
    }
  #mySidenav a {
  position: absolute;
  left: -80px;
  transition: 0.3s;
  padding: 15px;
  width: 100px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
  left: 0;
}

#placeorder {
  top: 20px;
  background-color: #04AA6D;
}

#cart {
  top: 80px;
  background-color: Crimson;
}

#orderhistory {
  top: 150px;
  background-color: RoyalBlue;
}

#reviews {
  top: 240px;
  background-color: Darkorange;
}

#notification {
  top: 310px;
  background-color: Teal;
}
#complaint {
  top: 380px;
  background-color: purple;
}
.profile-logout {
            position: absolute;
            top: 10px;
            right: 10px;
        }
#content {
    margin-left: 120px;
    padding: 20px;
    }
iframe {
   width: 90%;
   height: 700px;
   border: none;
            
}
       
    </style>
</head>
<body>

<?php require 'header2.php'; ?>
<!--<center><div class="colorful-text">Welcome to our Restaurant</div></center> -->

<div class="profile-logout">
    <p align="center"><?php echo "<img src=\" ../{$row['ProfilePicture']} \" width=\"60px\" >"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="c"href="profile.php"><button name="c">Profile</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="c" href="../controller/logout-controller.php"><button name="c">Logout</button></a>&nbsp;&nbsp;&nbsp;&nbsp;</p>
</div>  
<div id="mySidenav" class="sidenav">
    <a href="menu.php" id="placeorder" target="contentFrame">Place Order</a>
    <a href="cart.php" id="cart" target="contentFrame">Cart</a>
    <a href="order-history.php" id="orderhistory" target="contentFrame">Order History</a>
    <a href="menu.php" id="reviews" target="contentFrame">Reviews</a>
    <a href="notification.php" id="notification" target="contentFrame">Notification</a>
    <a href="complaint.php" id="complaint" target="contentFrame">File a complaint</a>
      </div>
  

<div id="content">
    <iframe name="contentFrame"></iframe>
</div>
    
</body>
</html>