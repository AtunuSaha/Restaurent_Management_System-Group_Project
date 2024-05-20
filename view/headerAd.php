<?php 

session_start();
if(empty($_SESSION['id']))
{
    header("location:login.php");
}
else if(isset($_GET['out']))
{
    session_destroy();
    header("location:login.php");
}
function getSelected($title, $b='') {
    if(!isset($b)) return "";
    if($title == $b) return 'active-link';
    return "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($TITLE)) {echo $TITLE;}?></title>
	<link rel="stylesheet" href="../CSS/admin-Home.css">
	
</head>
<body>
	<header>
		<div class="logo">Classic Kitchen</div>
		Welcome, <?php if(isset($_SESSION)) echo $_SESSION['id']; ?>
        <form>
            <button class="log-bt" name="out">LogOut</button> 
            </form>
	  </header>


  <div class="dashboard-container">
    
   <div class="sidebar">
	<ul class="sidenav">
		<li class="<?= getSelected('Dashboard', $TITLE ) ?>"><a class="sidenav-link" href="home.php"><img class="nav-icon" src="/MVC/Icons/Dash.jpg" /><span>Dashboard</span></a></li>
		<li class="<?= getSelected('Orders',  $TITLE) ?>"><a class="sidenav-link" href="orders.php"><img class="nav-icon" src="/MVC/Icons/Odr.jpg"/><span>Orders</span></a></li>
		<li class="<?= getSelected('MenuMng',  $TITLE) ?>"><a class="sidenav-link" href="MenuMng.php"><img class="nav-icon" src="/MVC/Icons/Menue.jpg" /><span>Menue Management</span> </a></li>
		<li class="<?= getSelected('EmpMng',  $TITLE) ?>"><a class="sidenav-link" href="EmployeeMng.php"><img class="nav-icon" src="/MVC/Icons/EmpMng.jpg" /><span>Employee Management</span> </a></li>
		<li class="<?= getSelected('Complains',  $TITLE) ?>"><a class="sidenav-link" href="Complains.php"><img class="nav-icon" src="/MVC/Icons/Complains.jpg" /><span>Complains</span> </a></li>
	</ul>
   </div>

   <div class="content">