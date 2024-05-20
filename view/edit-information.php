                         <!-- CUSTOMER.... -->
<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/user-info-model.php');    
  
    $id = $_SESSION['id'];
    $row = userInfo($id);

    $fullnameMsg = $emailMsg = $phoneMsg = $addressMsg = $religionMsg =  $usernameMsg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'fullnameEmpty': {
            $fullnameMsg = "Fullname can not be empty.";
            break;
        }
        case 'phoneEmpty': {
            $phoneMsg = "Phone number can not be empty.";
            break;
        }
        case 'addressEmpty': {
            $addressMsg = "Address can not be empty.";
            break;
        }
        case 'emailEmpty': {
            $emailMsg = "Email can not be empty.";
            break;
        }
        case 'dobEmpty': {
            $dobMsg = "Date of birth can not be empty.";
            break;
        }
        case 'religionEmpty': {
            $religionMsg = "Religion can not be empty.";
            break;
        }
        case 'usernameEmpty': {
            $usernameMsg = "Username can not be empty.";
            break;
        }
       
        case 'phoneInvalid': {
            $phoneMsg = "Phone number is not valid.";
            break;
        }
        case 'emailInvalid': {
            $emailMsg = "Email is not valid.";
            break;
        }
        case 'emailExists': {
            $emailMsg = "Email already exists.";
            break;
        }
        case 'usernameInvalid': {
            $usernameMsg = "Username is not valid.";
            break;
        }
    }
    }

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'changed': {
        $success_msg = "Information successfully updated.";
        break;
      }
  }
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Edit Information</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/textbox.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/button.css">
    <style>
     tr{background-color: MistyRose;}
    </style>
    <script src="javascript/edit-information.js"></script>
</head>
<body>
<?php require 'header2.php'; ?>
<center>
    <div class="colorful-text">
    <?php
                echo "<td>
                    <center> {$row['Fullname']}'s Profile </font><br><br></center>
                   
                </td>";
    ?></div>
    
</center>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/edit-information-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h1 aliign="center">Edit Information</h1>

                    <div class="textbox-container">
                    <b>Full Name:</b>
                    <input type="text" name="fullname" size="43px" value= "<?php echo "{$row['Fullname']}"; ?>">
                    <?php if (strlen($fullnameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $fullnameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="fullnameError"></font><br>
                    <b>Phone Number: </b>
                    <input type="text" name="phone" size="43px" value= "<?php echo "{$row['Phone']}"; ?>">
                    <?php if (strlen($phoneMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $phoneMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="phoneError"></font><br>
                    <b>Email:</b><br>
                    <input type="email" name="email" size="43px" value= "<?php echo "{$row['Email']}"; ?>">
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="emailError"></font><br>
                    <b>Address:</b>
                    <input type="text" name="address" size="43px" value= "<?php echo "{$row['Address']}"; ?>">
                    <?php if (strlen($addressMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $addressMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="addressError"></font><br>
                    <b>Religion:</b> &nbsp;&nbsp;&nbsp;
                    <select name="religion">
                        <option disabled selected hidden value="Not Selected">Choose Your Religion</option>
                        <option value="Islam" <?php if($row['Religion'] == "Islam") echo "selected"; ?>>Islam</option>
                        <option value="Hindu" <?php if($row['Religion'] == "Hindu") echo "selected"; ?>>Hindu</option>
                        <option value="Christian" <?php if($row['Religion'] == "Christian") echo "selected"; ?>>Christian</option>
                    </select>
                    
                    <?php if (strlen($religionMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $religionMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <b>Username:</b><br>
                    <input type="text" name="username" size="43px" value= "<?php echo "{$row['Username']}"; ?>">
                    <?php if (strlen($usernameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $usernameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="usernameError"></font><br>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br><br>
                    </div>
                    <?php } ?>
                    <button class= "b4">Update Information</button>
                    
                    
                </form>
            </td>
        </tr>
    </table>
    <br><br>
    <center><a class="c" href="profile.php"><button name="c">Go Back</button></a></center>
    
</body>
</html>