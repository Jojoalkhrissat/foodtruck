<?php
require "../connect.php";
require "../sql.php";
	
  session_start();
$admin= $_GET['admin'];






$activateshop= 'UPDATE admin set active="0" WHERE id='.$admin.'';
sql_update($activateshop,$conn);



echo '[{"message":"your item was entered"}]';	





























































header('location:'.$baseurl.'/highadmin/admindetails?admin='.$admin.'');


?>