<?php
require "../connect.php";
require "../sql.php";
	
  session_start();
$shop= $_GET['shop'];






$activateshop= 'UPDATE shop set active="1" WHERE id='.$shop.'';
sql_update($activateshop,$conn);



echo '[{"message":"your item was entered"}]';	





























































header('location:'.$baseurl.'/adminpanel/shopdetails?shop='.$shop.'');


?>