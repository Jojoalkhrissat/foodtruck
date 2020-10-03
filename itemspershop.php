<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$shop=$_GET['shop'];
	try{
$MyJsonData1="";
$itemspersub="SELECT `id`,`SubCategory`, `Name`, `Shop`, `Photo`,`Photo1`,`Photo2`, `Price`, `TimesSold` FROM `items` where `Shop`='$shop'";
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
