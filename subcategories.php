<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	$category=$_GET['category'];
	try{

echo "[";
$subcategories="SELECT SU."."id, SU.subcatname,SU.subcatnamear,SU.photo,S.shopname FROM subcategory SU, shop S where SU.shop=S.id and S.active=1 and category='$category'";
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