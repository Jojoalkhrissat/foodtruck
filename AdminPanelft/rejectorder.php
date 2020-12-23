<?php
require 'connect.php';
require 'sql.php';
require 'pushnotification.php';   
session_start();
if(isset($_SESSION['id'])){
include('includes/header.php');
include('includes/navbar.php');
if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];

$getorderid='SELECT * from orders where id="'.$orderid.'"';
$MyJsonData=sql_selectdata($getorderid,$conn);
preg_match('/(?<=customer":").+?(?=")/',$MyJsonData,$customer);
preg_match('/(?<=shop":").+?(?=")/',$MyJsonData,$shop);
pushnotifications($customer[0],'your order was sadly rejected','لقد تم رفض طلبك','your order was cancelled','لقد تم الغاء الطلب');


$accept='UPDATE orders set status="CANCELED" WHERE id="'.$orderid.'"';
sql_update($accept,$conn);

header('location:http://localhost/foodtruck/adminpanelft/pendingorders');
}else{
	header('location:http://localhost/foodtruck/adminpanelft/pendingorders');
}






}