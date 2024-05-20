<?php

    require_once('database.php');

    $row;

    function login($email, $password){

        global $row;

        $con = dbConnection();
        $sql = "select * from UserInfo where email ='{$email}' and password ='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1) 
        {
        $row = mysqli_fetch_assoc($result);
        return $row;
        }
        else return false;

    }

    function addUser($fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role){

        $con = dbConnection();
        $sql = "insert into UserInfo values('', '{$fullname}' ,'{$phone}' ,'{$email}', '{$address}', '{$dob}', '{$religion}', '{$username}', '{$password}', 'Uploads/Images/default_pfp.png', '{$role}', 'Active')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }
    
    function uniqueEmail($email){

        $con = dbConnection();
        $sql="select email from userinfo where email like '{$email}' ";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1) return false;
        else return true; 
        
    }

    function getUserByMail($email){

        $con = dbConnection();
        $sql = "Select * from UserInfo where Email = '$email'";
             
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

    function changePassword($id, $newpass){

        $con=dbConnection();
        $sql = "update UserInfo set Password = '$newpass' where UserID = '$id'";

        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }

    function userInfo($id){

        $con=dbConnection();
        $sql="select* from UserInfo where UserID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }

    function updateUserInfo($id, $fullname, $email, $phone, $address, $religion, $username){

        $con = dbConnection();
        $sql = "update UserInfo set Fullname = '$fullname', Username = '$username', Phone = '$phone', Email = '$email', Religion = '$religion', Address = '$address'  where UserID = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }

    function getAllDeliveryPerson(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role = 'Delivery Man' and status = 'Active'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function getAllCustomer(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role = 'Customer' and status = 'Active'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function getAllManager(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role = 'Manager' and status = 'Active'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function numberOfCustomer(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role='Customer' and status='Active'";

        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);

    }

    function numberOfDeliveryMan(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role='Delivery Man' and status='Active'";

        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);

    }

    function getUsernameByID($id){

        $con = dbConnection();
        $sql = "select Username from UserInfo where UserID = '$id'";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row['Username'];

    }

    function banCustomer($id){

        $con = dbConnection();
        $sql = "update UserInfo set status = 'Inactive' where UserID = '$id'";
        $result = mysqli_query($con,$sql);
        
        if($result) return $result;
        else return false;
        
    }

    function resign($id){

        $con = dbConnection();
        $sql = "update UserInfo set status = 'Resigning' where UserID = '$id'";
        $result = mysqli_query($con,$sql);
        
        if($result) return true;
        else return false;
        
    }

    function getIDByFullname($fullname){

        $con = dbConnection();
        $sql = "select UserID from UserInfo where Fullname = '$fullname'";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row['UserID'];

    }

?>