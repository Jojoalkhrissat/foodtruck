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
preg_match('/(?<=photo":").+?(?=")/',$post,$photo);

if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
preg_match('/(?<=firstname=).+?(?=&|$)/',$post,$firstname);
preg_match('/(?<=lastname=).+?(?=&|$)/',$post,$lastname);
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);
preg_match('/(?<=phonenumber=).+?(?=&|$)/',$post,$phonenumber);
preg_match('/(?<=photo=).+?(?=&|$)/',$post,$photo);
}






}
$admininfo= "INSERT INTO `admin`(`firstname`, `lastname`, `email`, `phone`) VALUES ('$firstname[0]','$lastname[0]','$email[0]','$phonenumber[0]')";
$stmt= $conn->prepare($admininfo);
$stmt->execute();


$fetchadmininfo='SELECT * FROM admin WHERE email="'.$email[0].'"';
$getuser = $conn->query($fetchadmininfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;

$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);





$myfile="";
$contents="";
if($photo[0]!=""){
$contents=base64_decode($photo[0]);
switch (true) {
	case stristr($photopath[0],"png"):
		$myfile = "img/profile/admin/".$id[0].".png";		
		break;
		case stristr($photopath[0],"PNG"):
		$myfile = "img/profile/admin/".$id[0].".png";
		break;
	case stristr($photopath[0],"Png"):
		$myfile = "img/profile/admin/".$id[0].".png";
		break;
		case stristr($photopath[0],"jpg"):
		$myfile = "img/profile/admin/".$id[0].".jpg";
		break;
		case stristr($photopath[0],"JPG"):
		$myfile = "img/profile/admin/".$id[0].".jpg";
		break;
	case stristr($photopath[0],"Jpg"):
		$myfile = "img/profile/admin/".$id[0].".jpg";
		
		break;
		case stristr($photopath[0],"jpeg"):
		$myfile = "img/profile/admin/".$id[0].".jpeg";
		break;
		case stristr($photopath[0],"JPEG"):
		$myfile = "img/profile/admin/".$id[0].".jpeg";
		break;
	case stristr($photopath[0],"Jpeg"):
		$myfile = "img/profile/admin/".$id[0].".jpeg";
		
		break;
		case stristr($photopath[0],"gif"):
		$myfile = "img/profile/admin/".$id[0].".gif";
		
		break;
		case stristr($photopath[0],"GIF"):
		$myfile = "img/profile/admin/".$id[0].".gif";
		
		break;
	case stristr($photopath[0],"Gif"):
		$myfile = "img/profile/admin/".$id[0].".gif";
		
		break;
		case stristr($photopath[0],"TIFF"):
		$myfile = "img/profile/admin/".$id[0].".tiff";
		break;
		case stristr($photopath[0],"tiff"):
		$myfile = "img/profile/admin/".$id[0].".tiff";
		
		break;
	case stristr($photopath[0],"Tiff"):
		$myfile = "img/profile/admin/".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}
file_put_contents($myfile,$contents);
}
$MyJsonData = preg_replace('/"Photo":".+?"/', '"Photo":"'.$myfile.'"', $MyJsonData, 1);
echo $MyJsonData;

echo "]";



$adminphoto= 'UPDATE admin set Photo="'.$myfile.'" where Email="'.$email[0].'"'; 
$photoupdate= $conn->prepare($adminphoto);
$photoupdate->execute();


$adminlogin="INSERT INTO `loginandregister`(`adminid`, `username`, `password`, `usertype`) VALUES ('$id[0]','$username[0]','$password[0]','ADMIN')";
$stmt1= $conn->prepare($adminlogin);
$stmt1->execute();





}
}catch(Exception $e){
	echo "400 error bad request1";
}
}else{
	echo "400 error bad request2";
}
?>