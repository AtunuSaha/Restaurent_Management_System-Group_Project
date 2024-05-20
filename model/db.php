<?php

function conn()
{
	$serverName="localhost";
	$userName="root";
	$pass="";
	$dbName="aba";
	$con=new mysqli($serverName,$userName,$pass,$dbName);
	return $con;

}



?>