<?php
require "connect.php";
require "sql.php";
	
  session_start();
$shop= $_GET['shop'];






$activateshop= 'UPDATE shop set active="0" WHERE id='.$shop.'';
sql_update($activateshop,$conn);



echo '[{"message":"your item was entered"}]';	





























































header('location:http://localhost/foodtruck/adminpanel/shopdetails?shop='.$shop.'');


?>