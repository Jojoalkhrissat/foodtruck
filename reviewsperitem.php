<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
	$itemid=$_GET['itemid'];
$MyJsonData1="";
echo "[";
$feedback="SELECT F".".id,F.itemid,F.customer,C.firstname ,C.lastname ,C.photo ,F.comments, rating, date FROM feedback F,customers C where itemid='$itemid' and C.id=F.customer";
$getfeedback = $conn->query($feedback);
$getfeedback->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getfeedback->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/null/', '""', $MyJsonData);
echo $MyJsonData1;
echo ']';

}catch(Exception $e){
	echo "400 error bad request";
}
}else{
	echo "400 error bad request";
}

?>