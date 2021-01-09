<?php
require "../connect.php";
require "../sql.php";   
session_start();
if(isset($_SESSION['id'])){
if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];

$orderend=date('yy-m-d H:i:s');


$accept='UPDATE orders set status="READY",orderend="'.$orderend.'" WHERE id="'.$orderid.'" ';
sql_update($accept,$conn);

header('location:'.$baseurl.'/highadmin/ordersinprogress');
}else{
	header('location:'.$baseurl.'/highadmin/ordersinprogress');
}






}