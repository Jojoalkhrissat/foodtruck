<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
preg_match('/(?<=username":").+?(?=")/',$post,$username);
preg_match('/(?<=password":").+?(?=")/',$post,$password);
if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
}
$checkuser ="SELECT id,UserType,AdminId,CustomerId,DriverId FROM `loginandregister` WHERE UserName='$username[0]' AND PassWord='$password[0]'";
$user = $conn->query($checkuser);
$user->setFetchMode(PDO::FETCH_ASSOC);
$count=$user->rowCount();
if($count==1){
echo '{"logindetails":[';
$MyJsonData="";	
while($row = $user->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
echo $MyJsonData;
echo "],";
preg_match('/(?<=UserType":").+?(?=")/',$MyJsonData,$usertype);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=AdminId":").+?(?=")/',$MyJsonData,$adminid);
preg_match('/(?<=CustomerId":").+?(?=")/',$MyJsonData,$customerid);
preg_match('/(?<=DriverId":").+?(?=")/',$MyJsonData,$driverid);
preg_match('/(?<=ShopId ":").+?(?=")/',$MyJsonData,$shopid);
switch ($usertype[0]) {
		case 'ADMIN':
		$getuserinfo="SELECT * FROM `admin` where id='$adminid[0]'";
		break;
		case 'CUSTOMER':
		$getuserinfo="SELECT * FROM `customers` where id='$customerid[0]'";
		break;
		case 'DRIVER':
		$getuserinfo="SELECT * FROM `drivers` where id='$driverid[0]'";
		break;
		case 'SHOP':
		$getuserinfo="SELECT * FROM `shop` where id='$shopid[0]'";
		break;
		default:
		$getuserinfo="";
		break;
}
echo "\n";
$getuser = $conn->query($getuserinfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
echo '"UserData":[';
$MyJsonData1="";	
while($row = $getuser->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo $MyJsonData1;
echo "]}";
}else{
	http_response_code(401);
	echo "Wrong username or password";
}
}catch(Exception $e){
echo "400 error bad request";	
}

}else{
	echo "400 error bad request";
}
?>