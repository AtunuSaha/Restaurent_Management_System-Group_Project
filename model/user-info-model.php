                            <!-- CUSTOMER -->
<?php

require_once('database.php');

function login($email, $password){
    global $row;
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function addUser($fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role){
    $con = dbConnection();
    $sql = "INSERT INTO UserInfo VALUES ('', '$fullname', '$phone', '$email', '$address', '$dob', '$religion', '$username', '$password', 'Uploads/Images/default_pfp.png', '$role', 'Active')";
    return mysqli_query($con, $sql);
}

function uniqueEmail($email){
    $con = dbConnection();
    $sql = "SELECT email FROM userinfo WHERE email LIKE '$email'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        return false;
    } else {
        return true;
    }
}

function uniqueEmail1($email, $id){
    $con = dbConnection();
    $sql = "SELECT email FROM userinfo WHERE email LIKE '$email' AND UserID != '$id'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        return false;
    } else {
        return true;
    }
}

function getUserByMail($email){
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function changePassword($id, $newpass){
    $con = dbConnection();
    $sql = "UPDATE UserInfo SET Password = '$newpass' WHERE UserID = '$id'";
    return mysqli_query($con, $sql);
}

function userInfo($id){
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE UserID='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function updateProfilePicture($imagename, $id){
    $con = dbConnection();
    $sql = "UPDATE UserInfo SET ProfilePicture = '$imagename' WHERE UserID = '$id'";
    return mysqli_query($con, $sql);
}

function updateUserInfo($id, $fullname, $email, $phone, $address, $religion, $username){
    $con = dbConnection();
    $sql = "UPDATE UserInfo SET Fullname = '$fullname', Username = '$username', Phone = '$phone', Email = '$email', Religion = '$religion', Address = '$address' WHERE UserID = '$id'";
    return mysqli_query($con, $sql);
}

function getAllDeliveryPerson(){
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role = 'Delivery Man' AND status = 'Active'";
    return mysqli_query($con, $sql);
}

function getAllCustomer(){
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role = 'Customer' AND status = 'Active'";
    return mysqli_query($con, $sql);
}

function getAllManager(){
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role = 'Manager' AND status = 'Active'";
    return mysqli_query($con, $sql);
}

function numberOfCustomer(){
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role='Customer' AND status='Active'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}

function numberOfDeliveryMan(){
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role='Delivery Man' AND status='Active'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}

function getUsernameByID($id){
    $con = dbConnection();
    $sql = "SELECT Username FROM UserInfo WHERE UserID = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Username'];
}

function banCustomer($id){
    $con = dbConnection();
    $sql = "UPDATE UserInfo SET status = 'Inactive' WHERE UserID = '$id'";
    $result = mysqli_query($con, $sql);
    if($result) {
        return $result;
    } else {
        return false;
    }
}

?>
