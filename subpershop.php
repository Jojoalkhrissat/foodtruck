<?php
require "connect.php";
echo "[";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
		$shop=$_GET['shop'];
$subcategories="SELECT SU."."id , SU.subcatname,SU.subcatnamear,SU.photo from subcategory SU where SU.shop=".$shop."";
$getsubcategories = $conn->query($subcategories);
$getsubcategories->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData1="";
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

http_response_code(400);
echo "Bad request 400";
}
}else{
http_response_code(400);
echo "Bad request 400";

}

?>