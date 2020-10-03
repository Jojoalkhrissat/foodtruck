<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	$category=$_GET['category'];
	try{
$MyJsonData1="";
echo "[";
$subcategories="SELECT `id`, `Name`, `Photo` FROM `subcategory` where Category='$category'";
$getsubcategories = $conn->query($subcategories);
$getsubcategories->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getsubcategories->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo $MyJsonData1;
echo ']';
}catch(Exception $e){
	echo "400 error bad request";
	http_response_code(400);
}
}else{
	echo "400 error bad request";
http_response_code(400);
}
?>