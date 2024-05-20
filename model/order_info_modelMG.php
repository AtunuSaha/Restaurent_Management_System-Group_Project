<?php

    require_once('database.php');

    $row;

    function numberOfOrder(){

        $con = dbConnection();
        $sql = "select * from order_info";

        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);

    }

    function totalRevenue(){

        $con = dbConnection();
        $sql = "select sum(Bill) as sum from order_info";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row['sum'];

    }

?>