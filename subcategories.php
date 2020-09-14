<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
$post = file_get_contents('php://input');
preg_match('/(?<=category":").+?(?=")/',$post,$category);
if(!isset($category[0])){
preg_match('/(?<=category=).+?(?=&|$)/',$post,$category);
}else{
$MyJsonData1="";
echo "[";
$subcategories="SELECT `id`, `Name`, `Photo` FROM `subcategory` where Category='$category[0]'";
$getsubcategories = $conn->query($subcategories);
$getsubcategories->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getsubcategories->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo $MyJsonData1;
echo ']';
}
}catch(Exception $e){
	echo "400 error bad request";
}
}else{
	echo "400 error bad request";
}
?>