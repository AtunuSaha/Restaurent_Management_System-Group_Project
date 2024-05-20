<?php

    require_once('database.php');

    $row;
//1
    function login($email, $password){

        global $row;

        $con = dbConnection();
        $sql = $con -> prepare ("select * from user_info where email = ? and password = ?");
        $sql -> bind_param("ss", $email, $password);
        $sql -> execute();
        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count == 1) 
        {
        $row = mysqli_fetch_assoc($result);
        return $row;
        }
        else return false;

    }

//2 can not done
    function addUser($fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role){

        $con = dbConnection();

        $sql = "insert into user_info values('', '{$fullname}' ,'{$phone}' ,'{$email}', '{$address}', '{$dob}', '{$religion}', '{$username}', '{$password}', 'Uploads/Images/default.png', '{$role}', 'Active')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }
    
    //3 may b problem
    function uniqueEmail($email){

        
        $con = dbConnection();
        $sql = $con -> prepare ("select email from user_info where email like ? ");
        $sql -> bind_param("s", $email);
        $sql -> execute();
        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count == 1) return false;
        else return true; 
        
    }
//4
     function getUserByMail($email){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from user_info where Email = ?");
        $sql -> bind_param("s", $email);
        $sql -> execute();
        $result = $sql -> get_result();
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

    // function getUserByMail($email){

    //     $con = dbConnection();
    //     $sql = $con -> prepare ("Select * from user_info where Email = '$email'");
    //     $sql -> bind_param("s", $email);
    //     $sql -> execute();
    //     $result = $sql -> get_result();
        


    //     $con = dbConnection();
    //     $sql = "Select * from user_info where Email = '$email'";
             
    //     $result = mysqli_query($con,$sql);
    //     $row = mysqli_fetch_assoc($result);
    //     return $row;
        
    // }
//4
    function changePassword($id, $newpass){

        $con=dbConnection();
        $sql = $con -> prepare ("update user_info set Password = ? where UserID = ?");
        $sql -> bind_param("ss", $newpass, $id);

        if($sql -> execute()===true) return true;
        else return false; 

    }

    function userInfo($id){

        $con=dbConnection();
        $sql="select * from user_info where UserID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }
//5
    function updateProfilePicture( $imagename, $id){

        $con = dbConnection();
        $sql = "update user_info set ProfilePicture = '$imagename' where UserID = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }
//6
    function updateUserInfo($id, $fullname, $email, $phone, $address, $religion, $username){

        $con = dbConnection();
        $sql = "update user_info set Fullname = '$fullname', Username = '$username', Phone = '$phone', Email = '$email', Religion = '$religion', Address = '$address'  where UserID = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }

    function getAllDeliveryPerson(){

        $con = dbConnection();
        $sql = "Select * from user_info where Role='Delivery Man' and status='Active'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function numberOfCustomer(){

        $con = dbConnection();
        $sql = "select * from user_info where Role='Customer' and status='Active'";

        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);

    }

    function numberOfDeliveryMan(){

        $con = dbConnection();
        $sql = "select * from user_info where Role='Delivery Man' and status='Active'";

        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);

    }

    function getUsernameByID($id){

        $con = dbConnection();
        $sql = "select Username from user_info where UserID = '$id'";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row['Username'];

    }

?>