<?php
require"connect.php";
require"sql.php";
session_start();

	$shopname=isset($_GET['shopname'])?$_GET['shopname']:$_SESSION['shopname'];
	$shopnamear=isset($_GET['shopnamear'])?$_GET['shopnamear']:$_SESSION['shopnamear'];
	$firstname=isset($_GET['firstname'])?$_GET['firstname']:$_SESSION['firstname'];
	$lastname=isset($_GET['lastname'])?$_GET['lastname']:$_SESSION['lastname'];
	$phonenumber=isset($_GET['phonenumber'])?$_GET['phonenumber']:$_SESSION['phonenumber'];
	$email=isset($_GET['email'])?$_GET['email']:$_SESSION['email'];
	$joindate=isset($_GET['joindate'])?$_GET['joindate']:$_SESSION['joindate'];
	$opentime=isset($_GET['opentime'])?$_GET['opentime']:$_SESSION['opentime'];
	$closetime=isset($_GET['closetime'])?$_GET['closetime']:$_SESSION['closetime'];
	$city=isset($_GET['city'])?$_GET['city']:$_SESSION['city'];
	$active=isset($_GET['active'])?$_GET['active']:$_SESSION['active'];
	$address=isset($_GET['address'])?$_GET['address']:$_SESSION['address'];
	$location=isset($_GET['location'])?$_GET['location']:$_SESSION['location'];


$modifyshop='UPDATE `shop` SET `shopname`="'.$shopname.'",`shopnamear`="'.$shopnamear.'",`firstname`="'.$firstname.'",`lastname`="'.$lastname.'",`phonenumber`="'.$phonenumber.'",`email`="'.$email.'",`opentime`="'.$opentime.'",`closetime`="'.$closetime.'",`city`="'.$city.'",`location`="'.$location.'",`address`="'.$address.'" WHERE id="'.$_SESSION['id'].'" ';

sql_update($modifyshop,$conn);

echo $modifyshop;
header("Location: http://localhost/foodtruck/adminpanelft/login/login");
exit();













?>