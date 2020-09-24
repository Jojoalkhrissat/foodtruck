<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
$post = file_get_contents('php://input');
preg_match('/(?<=subcategory":").+?(?=")/',$post,$subcategory);
if(!isset($subcategory[0])){
preg_match('/(?<=subcategory=).+?(?=&|$)/',$post,$subcategory);
}else{
$MyJsonData1="";
$itemspersub="SELECT `id`, `Name`, `Shop`, `Photo`, `Price`, `TimesSold` FROM `items` where `SubCategory`='$subcategory[0]' limit 20 ";
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
