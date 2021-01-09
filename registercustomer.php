<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
preg_match('/(?<=username":").+?(?=")/',$post,$username);
preg_match('/(?<=password":").+?(?=")/',$post,$password);
preg_match('/(?<=firstname":").+?(?=")/',$post,$firstname);
preg_match('/(?<=lastname":").+?(?=")/',$post,$lastname);
preg_match('/(?<=email":").+?(?=")/',$post,$email);
preg_match('/(?<=phonenumber":").+?(?=")/',$post,$phonenumber);
preg_match('/(?<=photopath":").+?(?=")/',$post,$photopath);
preg_match('/(?<=photo":").+?(?=")/',$post,$photo);
preg_match('/(?<=gender":").+?(?=")/',$post,$gender);
preg_match('/(?<=city":").+?(?=")/',$post,$city);
preg_match('/(?<=address":").+?(?=")/',$post,$address);
preg_match('/(?<=dob":").+?(?=")/',$post,$dob);
preg_match('/(?<=token":").+?(?=")/',$post,$token);
$username=$phonenumber;
if(!isset($username[0])&&!isset($password[0])&&!isset($firstname[0])&&!isset($lastname[0])&&!isset($email[0])&&!isset($gender[0])&&!isset($dob[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
preg_match('/(?<=firstname=).+?(?=&|$)/',$post,$firstname);
preg_match('/(?<=lastname=).+?(?=&|$)/',$post,$lastname);
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);
preg_match('/(?<=phonenumber=).+?(?=&|$)/',$post,$phonenumber);
preg_match('/(?<=photopath=).+?(?=&|$)/',$post,$photopath);
preg_match('/(?<=photo=).+?(?=&|$)/',$post,$photo);
preg_match('/(?<=gender=).+?(?=&|$)/',$post,$gender);
preg_match('/(?<=city=).+?(?=&|$)/',$post,$city);
preg_match('/(?<=address=).+?(?=&|$)/',$post,$address);
preg_match('/(?<=dob=).+?(?=&|$)/',$post,$dob);
preg_match('/(?<=token=).+?(?=&|$)/',$post,$token);
$username=$phonenumber;
}
$fetchuserinfo='SELECT * FROM customers WHERE phonenumber="'.$phonenumber[0].'" or email="'.$email[0].'"';

$checkregistered=sql_selectcount($fetchuserinfo,$conn);
if($checkregistered==0){


if(!isset($photopath[0])||$photopath[0]==""){
$photopath[0]="";
}if(!isset($photo[0])||$photo[0]==""){
$photo[0]="";
}
if(!isset($address[0])||$address[0]==""){
$address[0]="";
}
if(isset($username[0])&&isset($password[0])&&isset($firstname[0])&&isset($lastname[0])&&isset($email[0])&&isset($gender[0])&&isset($dob[0])){
$userinfo= "INSERT INTO `customers`(`firstname`, `lastname`, `email`, `phonenumber`,`address`,`dateofbirth`,`gender`,`city`) VALUES ('$firstname[0]','$lastname[0]','$email[0]','$phonenumber[0]','$address[0]','$dob[0]','$gender[0]','$city[0]')";

sql_insert($userinfo,$conn);

$fetchuserinfo='SELECT * FROM customers WHERE phonenumber="'.$phonenumber[0].'"';

$MyJsonData=sql_selectdata($fetchuserinfo,$conn);	

$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);

$myfile="";
$contents="";
if($photopath[0]!=""){
$contents=base64_decode($photo[0]);
switch (true) {
	case stristr($photopath[0],"png"):
		$myfile = "img/profile/customer/".$id[0].".png";		
		break;
		case stristr($photopath[0],"PNG"):
		$myfile = "img/profile/customer/".$id[0].".png";
		break;
	case stristr($photopath[0],"Png"):
		$myfile = "img/profile/customer/".$id[0].".png";
		break;
		case stristr($photopath[0],"jpg"):
		$myfile = "img/profile/customer/".$id[0].".jpg";
		break;
		case stristr($photopath[0],"JPG"):
		$myfile = "img/profile/customer/".$id[0].".jpg";
		break;
	case stristr($photopath[0],"Jpg"):
		$myfile = "img/profile/customer/".$id[0].".jpg";
		
		break;
		case stristr($photopath[0],"jpeg"):
		$myfile = "img/profile/customer/".$id[0].".jpeg";
		break;
		case stristr($photopath[0],"JPEG"):
		$myfile = "img/profile/customer/".$id[0].".jpeg";
		break;
	case stristr($photopath[0],"Jpeg"):
		$myfile = "img/profile/customer/".$id[0].".jpeg";
		
		break;
		case stristr($photopath[0],"gif"):
		$myfile = "img/profile/customer/".$id[0].".gif";
		
		break;
		case stristr($photopath[0],"GIF"):
		$myfile = "img/profile/customer/".$id[0].".gif";
		
		break;
	case stristr($photopath[0],"Gif"):
		$myfile = "img/profile/customer/".$id[0].".gif";
		
		break;
		case stristr($photopath[0],"TIFF"):
		$myfile = "img/profile/customer/".$id[0].".tiff";
		break;
		case stristr($photopath[0],"tiff"):
		$myfile = "img/profile/customer/".$id[0].".tiff";
		
		break;
	case stristr($photopath[0],"Tiff"):
		$myfile = "img/profile/customer/".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}
file_put_contents($myfile,$contents);
}

$MyJsonData = preg_replace('/photo":".+?"/', 'photo":"'.$myfile.'"', $MyJsonData);

$addphoto= 'UPDATE customers set photo="'.$myfile.'" where phonenumber="'.$phonenumber[0].'"'; 
sql_update($addphoto,$conn);
$fetchuserinfo='SELECT * FROM customers WHERE phonenumber="'.$phonenumber[0].'"';

$MyJsonData1=sql_selectdata($fetchuserinfo,$conn);


$userlogin="INSERT INTO `loginandregister`(`customerid`, `username`, `password`, `usertype`) VALUES ('$id[0]','$username[0]','$password[0]','CUSTOMER')";
sql_insert($userlogin,$conn);
$fetuserid='SELECT * FROM loginandregister WHERE CustomerId="'.$id[0].'"';
$MyJsonData1=sql_selectdata($fetuserid,$conn);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$token='INSERT INTO `deviceindex`(`userid`, `devicetoken`) VALUES ("'.$id[0].'","'.$token[0].'")';
sql_insert($token,$conn);
// $MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
echo "[";
echo $MyJsonData;
echo "]";
}else{http_response_code(400);
	echo '{"message":"400 error bad request"}';

}
}else{
http_response_code(401);
	echo '{"message":"already registered"}';	
}

}catch(Exception $e){
	http_response_code(400);
	echo '{"message":"400 error bad request"}';
}
}else{
	http_response_code(400);
	echo '{"message":"400 error bad request"}';
}
?>