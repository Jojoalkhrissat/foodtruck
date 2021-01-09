<?php
require "../connect.php";
require "../sql.php";   
session_start();
if(isset($_SESSION['id'])){
include('includes/header.php');
include('includes/navbar.php');
if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];




$accept='UPDATE orders set status="CANCELED" WHERE id="'.$orderid.'"';
sql_update($accept,$conn);

header('Location: '.$baseurl.'/adminpanel/pendingorders');
}else{
	header('Location: '.$baseurl.'/adminpanel/pendingorders');
}






}