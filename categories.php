<?php
require "connect.php";
$categories='SELECT * FROM category';
$getcategories = $conn->query($categories);
$getcategories->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getcategories->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
echo $MyJsonData;
echo ']';
?>