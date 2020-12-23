<?php
require "connect.php";
require "sql.php";

  session_start();
$question=$_GET['question'];









$question= 'DELETE from `faq` where id='.$question.'';
sql_delete($question,$conn);

echo '[{"message":"your item was entered"}]';	
























































header('location:http://localhost/foodtruck/highadmin/faq');


?>