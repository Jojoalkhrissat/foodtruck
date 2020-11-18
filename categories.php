<?php
require "connect.php";
$categories='SELECT * FROM category';
$getcategories = $conn->query($categories);
$getcategories->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getcategories->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=catnamear":").+?(?=")/',$row['catnamear'], $jsonrow);
$MyJsonData=$MyJsonData.",".$jsonrow;
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
$MyJsonData = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData);
echo $MyJsonData;
echo ']';
?>