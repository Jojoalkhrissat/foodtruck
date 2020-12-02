<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	$category=$_GET['category'];
	try{

echo "[";
$subcategories="SELECT `id`, `subcatname`,`subcatnamear`, `photo` FROM `subcategory` where category='$category'";
$MyJsonData1=sql_selectdata($subcategories,$conn);
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