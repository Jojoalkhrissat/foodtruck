<?php
require "connect.php";
if(($_SERVER["REQUEST_METHOD"] == "GET")){
$topshops='SELECT id,ShopName,Photo FROM shop WHERE ExtraPay>0';
$getshops = $conn->query($topshops);
$getshops->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getshops->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
echo $MyJsonData;
echo "]";
}
?>