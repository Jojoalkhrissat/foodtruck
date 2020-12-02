<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
preg_match('/(?<=username":").+?(?=")/',$post,$username);
preg_match('/(?<=password":").+?(?=")/',$post,$password);
preg_match('/(?<=token":").+?(?=")/',$post,$token);
if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
preg_match('/(?<=token=).+?(?=&|$)/',$post,$token);
}
$checkuser ="SELECT id,usertype,adminid,customerid,driverid FROM `loginandregister` WHERE username=".$username[0]." AND password=".$password[0]."";
$count=sql_selectcount($checkuser,$conn);
if($count==1){
echo '[';
$MyJsonData=sql_selectdata($checkuser,$conn);

$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);

preg_match('/(?<=usertype":").+?(?=")/',$MyJsonData,$usertype);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=adminid":").+?(?=")/',$MyJsonData,$adminid);
preg_match('/(?<=customerid":").+?(?=")/',$MyJsonData,$customerid);
preg_match('/(?<=driverid":").+?(?=")/',$MyJsonData,$driverid);
preg_match('/(?<=shopid":").+?(?=")/',$MyJsonData,$shopid);
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

$MyJsonData1 = sql_selectdata($getuserinfo,$conn);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
preg_match('/(?<=active":").+?(?=")/',$MyJsonData1,$active);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData1,$customerid2);
if($active=1){
$token='INSERT INTO `deviceindex`(`customer`, `devicetoken`) VALUES ("'.$customerid2[0].'","'.$token[0].'")';
sql_insert($token,$conn);
echo $MyJsonData1;
}else
{
	http_response_code(401);
	echo '[{"message":"your account was blocked"}]';
}




echo "]";
}else{
	http_response_code(401);
	echo '[{"message":"Wrong phone number or password"}]';
}
}catch(Exception $e){
	http_response_code(400);
echo "400 error bad request";	
}

}else{
	http_response_code(400);
	echo "400 error bad request";
}
?>