<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$subcategory=$_GET['subcategory'];
	try{

$MyJsonData1="";
$itemspersub="SELECT `id`, `Name`, `Shop`, `Photo`, `Price`, `TimesSold` FROM `items` where `SubCategory`='$subcategory' limit 20 ";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspersub->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo "[";
echo $MyJsonData1;
echo ']';
}catch(Exception $e){
echo "400 bad request";	
}
echo "400 bad request";
}
?>
