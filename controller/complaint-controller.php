                           <!-- CUSTOMER -->
<?php
session_start( );
    require_once('../model/complaint-model.php');
    require_once('../model/user-info-model.php');

    $userID = $_SESSION['id'];
    $row = userInfo($userID);
    
    $complaint = $_POST['complaint'];

    if(empty($complaint)){

        header('location:../view/complaint.php?err=empty');
        exit;

    }


    $status = sendComplaint($row['Fullname'], $complaint);
    if($status) header('location:../view/complaint.php?success=posted');

?>