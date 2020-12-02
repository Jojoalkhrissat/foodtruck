<?php
require "connect.php";
require "sql.php";

if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
		$shop=$_GET['shop'];
$subcategories="SELECT SU."."id , SU.subcatname,SU.subcatnamear,SU.photo from subcategory SU where SU.shop=".$shop."";
$MyJsonData1=sql_selectdata($subcategories,$conn);

$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}catch(Exception $e){

http_response_code(400);
echo "Bad request 400";
}
}else{
http_response_code(400);
echo "Bad request 400";

}

?>