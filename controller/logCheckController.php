<?php
session_start();
require_once('../Models/alldb.php');
$id=$_POST['id'];
$pass=$_POST['pass'];
$r=auth($id,$pass);
if($r)
{
	$_SESSION['id']=$id;
	header("location:../Views/home.php");
}
else
{
	
	header("location:../Views/login.php?error=WRONG_CREDENTIAL");
}
?>