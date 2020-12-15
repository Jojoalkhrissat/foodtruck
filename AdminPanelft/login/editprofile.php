<?php
require"connect.php";
require"sql.php";
session_start();

	$shopname=isset($_POST['shopname'])?$_POST['shopname']:$_SESSION['shopname'];
	$shopnamear=isset($_POST['shopnamear'])?$_POST['shopnamear']:$_SESSION['shopnamear'];
	$firstname=isset($_POST['firstname'])?$_POST['firstname']:$_SESSION['firstname'];
	$lastname=isset($_POST['lastname'])?$_POST['lastname']:$_SESSION['lastname'];
	$phonenumber=isset($_POST['phonenumber'])?$_POST['phonenumber']:$_SESSION['phonenumber'];
	$opentime=isset($_POST['opentime'])?$_POST['opentime']:$_SESSION['opentime'];
	$closetime=isset($_POST['closetime'])?$_POST['closetime']:$_SESSION['closetime'];
	$city=isset($_POST['city'])?$_POST['city']:$_SESSION['city'];
	$address=isset($_POST['address'])?$_POST['address']:$_SESSION['address'];
	$location=isset($_POST['location'])?$_POST['location']:$_SESSION['location'];
	$_SESSION['shopname']=$shopname;
	$_SESSION['shopnamear']=$shopnamear;
	$_SESSION['firstname']=$firstname;
	$_SESSION['lastname']=$lastname;
	$_SESSION['phonenumber']=$phonenumber;
	$_SESSION['opentime']=$opentime;
	$_SESSION['closetime']=$closetime;
	$_SESSION['city']=$city;
	$_SESSION['address']=$address;
	$_SESSION['location']=$location;


$modifyshop='UPDATE `shop` SET `shopname`="'.$shopname.'",`shopnamear`="'.$shopnamear.'",`firstname`="'.$firstname.'",`lastname`="'.$lastname.'",`phonenumber`="'.$phonenumber.'",`opentime`="'.$opentime.'",`closetime`="'.$closetime.'",`city`="'.$city.'",`location`="'.$location.'",`address`="'.$address.'" WHERE id="'.$_SESSION['id'].'" ';

sql_update($modifyshop,$conn);

echo $modifyshop;
// header("Location: http://localhost/foodtruck/adminpanel/profile.php");














?>