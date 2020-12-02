<?php
require"connect.php";
require"sql.php";
session_start();

	$shopname=isset($_GET['shopname'])?$_GET['shopname']:"shopname";
	$shopnamear=isset($_GET['shopnamear'])?$_GET['shopnamear']:"shopnamear";
	$firstname=isset($_GET['firstname'])?$_GET['firstname']:"firstname";
	$lastname=isset($_GET['lastname'])?$_GET['lastname']:"lastname";
	$phonenumber=isset($_GET['phonenumber'])?$_GET['phonenumber']:"phonenumber";
	$email=isset($_GET['email'])?$_GET['email']:"email";
	$joindate=isset($_GET['joindate'])?$_GET['joindate']:"joindate";
	$opentime=isset($_GET['opentime'])?$_GET['opentime']:"opentime";
	$closetime=isset($_GET['closetime'])?$_GET['closetime']:"closetime";
	$city=isset($_GET['city'])?$_GET['city']:"city";
	$active=isset($_GET['active'])?$_GET['active']:"active";
	$address=isset($_GET['address'])?$_GET['address']:"address";
	$location=isset($_GET['location'])?$_GET['location']:"location";


$modifyshop='UPDATE `shop` SET `shopname`="'.$shopname.'",`shopnamear`="'.$shopnamear.'",`firstname`="'.$firstname.'",`lastname`="'.$lastname.'",`phonenumber`="'.$phonenumber.'",`email`="'.$email.'",`opentime`="'.$opentime.'",`closetime`="'.$closetime.'",`city`="'.$city.'",`location`="'.$location.'",`address`="'.$address.'" WHERE id="'.$_SESSION['id'].'" ';

sql_update($modifyshop,$conn);


header("Location: http://localhost/foodtruck/adminpanelft/login/login");
exit();













?>