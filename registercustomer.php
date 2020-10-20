<?php
require "connect.php";
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
preg_match('/(?<=photopath1":").+?(?=")/',$post,$photopath1);
preg_match('/(?<=gender":").+?(?=")/',$post,$gender);
preg_match('/(?<=address":").+?(?=")/',$post,$address);
preg_match('/(?<=dob":").+?(?=")/',$post,$dob);

if(!isset($username[0])&&!isset($password[0])&&!isset($firstname[0])&&!isset($lastname[0])&&!isset($email[0])&&!isset($gender[0])&&!isset($dob[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
preg_match('/(?<=firstname=).+?(?=&|$)/',$post,$firstname);
preg_match('/(?<=lastname=).+?(?=&|$)/',$post,$lastname);
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);
preg_match('/(?<=phonenumber=).+?(?=&|$)/',$post,$phonenumber);
preg_match('/(?<=photopath=).+?(?=&|$)/',$post,$photopath);
preg_match('/(?<=photopath1=).+?(?=&|$)/',$post,$photopath1);
preg_match('/(?<=gender=).+?(?=&|$)/',$post,$gender);
preg_match('/(?<=address=).+?(?=&|$)/',$post,$address);
preg_match('/(?<=dob=).+?(?=&|$)/',$post,$dob);
}
if(!isset($phonenumber[0])||$phonenumber[0]==""){
$phonenumber[0]="";
}
if(!isset($photopath[0])||$photopath[0]==""){
$photopath[0]="";
}if(!isset($photopath1[0])||$photopath1[0]==""){
$photopath1[0]="";
}
if(!isset($address[0])||$address[0]==""){
$address[0]="";
}
if(isset($username[0])&&isset($password[0])&&isset($firstname[0])&&isset($lastname[0])&&isset($email[0])&&isset($gender[0])&&isset($dob[0])){
$userinfo= "INSERT INTO `customers`(`FName`, `LName`, `Email`, `PhoneNumber`,`Address`,`DOB`,`Gender`,`Photo`) VALUES ('$firstname[0]','$lastname[0]','$email[0]','$phonenumber[0]','$address[0]','$dob[0]','$gender[0]','$photopath[0]')";
$stmt= $conn->prepare($userinfo);
$isinserted=$stmt->execute();
if($isinserted){
$fetchuserinfo='SELECT * FROM customers WHERE Email="'.$email[0].'"';
$getuser = $conn->query($fetchuserinfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);

$MyJsonData="";	
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);

$myfile="";
$contents="";
if($photopath[0]!=""){
$contents=base64_decode($photopath1[0]);
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

$MyJsonData = preg_replace('/Photo":".+?"/', 'Photo":"'.$myfile.'"', $MyJsonData);

$adminphoto= 'UPDATE customers set Photo="'.$myfile.'" where Email="'.$email[0].'"'; 
$photoupdate= $conn->prepare($adminphoto);
$photoupdate->execute();
$fetchuserinfo='SELECT * FROM customers WHERE Email="'.$email[0].'"';
$getuser = $conn->query($fetchuserinfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);

$MyJsonData1="";
$userlogin="INSERT INTO `loginandregister`(`CustomerId`, `UserName`, `PassWord`, `UserType`) VALUES ('$id[0]','$username[0]','$password[0]','CUSTOMER')";
$stmt1= $conn->prepare($userlogin);
$stmt1->execute();
$fetuserid='SELECT * FROM loginandregister WHERE CustomerId="'.$id[0].'"';
$getuserid = $conn->query($fetuserid);
$getuserid->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getuserid->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo "[";
echo $MyJsonData1.",";
echo $MyJsonData;
echo "]";

}else{
http_response_code(401);
echo "User already exists";
}
}else{http_response_code(400);
	echo "400 error bad request";

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