<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	$category=$_GET['category'];
	try{
$MyJsonData1="";
echo "[";
$subcategories="SELECT `id`, `subcatname`,`subcatnamear`, `photo` FROM `subcategory` where category='$category'";
$getsubcategories = $conn->query($subcategories);
$getsubcategories->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getsubcategories->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=subcatnamear":").+?(?=")/',$row['subcatnamear'], $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
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