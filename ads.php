<?php
require "connect.php";
$categories='SELECT * FROM ads';
$getcategories = $conn->query($categories);
$getcategories->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getcategories->fetch()):
	$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=adtitlear":").+?(?=")/',$row['adtitlear'], $jsonrow);
$MyJsonData=$MyJsonData.",".$jsonrow;
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
$MyJsonData = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData);
echo $MyJsonData;
echo ']';
?>