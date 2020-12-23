<?php
require "connect.php";
require "sql.php";
	
  session_start();
$customer= $_GET['customerid'];






$activateshop= 'UPDATE customers set active="1" WHERE id='.$customer.'';
sql_update($activateshop,$conn);



echo '[{"message":"your item was entered"}]';	





























































header('location:http://localhost/foodtruck/adminpanel/customerdetails?customerid='.$customer.'');


?>