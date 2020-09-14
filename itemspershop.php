<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
$post = file_get_contents('php://input');
preg_match('/(?<=shop":").+?(?=")/',$post,$shop);
if(!isset($shop[0])){
preg_match('/(?<=shop=).+?(?=&|$)/',$post,$shop);
}else{
$MyJsonData1="";
$itemspersub="SELECT `id`,`SubCategory`, `Name`, `Shop`, `ItemPhoto`, `Price`, `TimesSold` FROM `items` where `Shop`='$shop[0]'";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspersub->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo "[";
echo $MyJsonData1;
echo ']';
} 
}catch(Exception $e){
echo "400 bad request";	
}
echo "400 bad request";
}
?>
