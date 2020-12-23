<?php
require "connect.php";
require "sql.php";

  session_start();
$ad=$_GET['ad'];









$ads= 'DELETE from `ads` where id='.$ad.'';
sql_delete($ads,$conn);

echo '[{"message":"your item was entered"}]';	
























































header('location:http://localhost/foodtruck/highadmin/ads');


?>