<?php
require "connect.php";
require "sql.php";
session_start();
$token=$_GET['token'];
$adddevice='DELETE FROM shopindex where shopid="'.$_SESSION['id'].'"';
sql_delete($adddevice,$conn);
$adddevice='INSERT INTO shopindex(shopid, devicetoken) VALUES ("'.$_SESSION['id'].'","'.$token.'")';
sql_insert($adddevice,$conn);






header('location:'.$baseurl.'/adminpanelft/index');


?>