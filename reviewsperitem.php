<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
	$itemid=$_GET['itemid'];
$MyJsonData1="";
echo "[";
$feedback="SELECT `id`,`ItemId`,`Customer`, `Comments`, `Rating`, `Date` FROM `feedback` where ItemId='$itemid'";
$getfeedback = $conn->query($feedback);
$getfeedback->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getfeedback->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo $MyJsonData1;
echo ']';

}catch(Exception $e){
	echo "400 error bad request";
}
}else{
	echo "400 error bad request";
}

?>