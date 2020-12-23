<?php
require 'connect.php';
require 'sql.php';   
session_start();
if(isset($_SESSION['id'])){
if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];

$orderend=date('yy-m-d H:i:s');


$accept='UPDATE orders set status="COMPLETE" WHERE id="'.$orderid.'" ';
sql_update($accept,$conn);

header('location:http://localhost/foodtruck/adminpanel/readyorders');
}else{
	header('location:http://localhost/foodtruck/adminpanel/readyorders');
}






}