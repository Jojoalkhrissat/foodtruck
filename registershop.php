<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
preg_match('/(?<=username":").+?(?=")/',$post,$username);
preg_match('/(?<=password":").+?(?=")/',$post,$password);
preg_match('/(?<=shopname":").+?(?=")/',$post,$shopname);
preg_match('/(?<=shopnamear":").+?(?=")/',$post,$shopnamear);
preg_match('/(?<=firstname":").+?(?=")/',$post,$firstname);
preg_match('/(?<=lastname":").+?(?=")/',$post,$lastname);
preg_match('/(?<=email":").+?(?=")/',$post,$email);
preg_match('/(?<=phonenumber":").+?(?=")/',$post,$phonenumber);
preg_match('/(?<=photopath":").+?(?=")/',$post,$photopath);
preg_match('/(?<=photo":").+?(?=")/',$post,$photo);
preg_match('/(?<=idphoto1":").+?(?=")/',$post,$idphoto1);
preg_match('/(?<=idphoto2":").+?(?=")/',$post,$idphoto2);
preg_match('/(?<=type":").+?(?=")/',$post,$type);
preg_match('/(?<=location":").+?(?=")/',$post,$location);
preg_match('/(?<=monthlypayment":").+?(?=")/',$post,$monthlypayment);
preg_match('/(?<=size":").+?(?=")/',$post,$size);

if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
preg_match('/(?<=shopname=).+?(?=&|$)/',$post,$shopname);
preg_match('/(?<=shopnamear=).+?(?=&|$)/',$post,$shopnamear);
preg_match('/(?<=firstname=).+?(?=&|$)/',$post,$firstname);
preg_match('/(?<=lastname=).+?(?=&|$)/',$post,$lastname);
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);
preg_match('/(?<=phonenumber=).+?(?=&|$)/',$post,$phonenumber);
preg_match('/(?<=photopath=).+?(?=&|$)/',$post,$photopath);
preg_match('/(?<=photo=).+?(?=&|$)/',$post,$photo);
preg_match('/(?<=idphoto1=).+?(?=&|$)/',$post,$idphoto1);
preg_match('/(?<=idphoto2=).+?(?=&|$)/',$post,$idphoto2);
preg_match('/(?<=type=).+?(?=&|$)/',$post,$type);
preg_match('/(?<=location=).+?(?=&|$)/',$post,$location);
preg_match('/(?<=monthlypayment=).+?(?=&|$)/',$post,$monthlypayment);
preg_match('/(?<=size=).+?(?=&|$)/',$post,$size);
}
$userinfo= 'INSERT INTO `shop`(`shopname`,`shopnamear`, `firstname`,`lastname`, `phone`, `email`, `type`, `location`,`monthlypayment`,`size`,`active`) VALUES ("'.$shopname[0].'","'.$shopnamear[0].'","'.$firstname[0].'","'.$lastname[0].'","'.$phonenumber[0].'","'.$email[0].'","'.$type[0].'","'.$location[0].'","'.$monthlypayment[0].'","'.$size[0].'",1")';
$stmt= $conn->prepare($userinfo);
$stmt->execute();
$fetchuserinfo='SELECT * FROM shop WHERE email="'.$email[0].'"';
$getuser = $conn->query($fetchuserinfo);
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
if($photopath[0]!=""){
$contents=base64_decode($photo[0]);
switch (true) {
	case stristr($photopath[0],"png"):
		$myfile = "img/profile/shop/".$id[0].".png";		
		break;
		case stristr($photopath[0],"PNG"):
		$myfile = "img/profile/shop/".$id[0].".png";
		break;
	case stristr($photopath[0],"Png"):
		$myfile = "img/profile/shop/".$id[0].".png";
		break;
		case stristr($photopath[0],"jpg"):
		$myfile = "img/profile/shop/".$id[0].".jpg";
		break;
		case stristr($photopath[0],"JPG"):
		$myfile = "img/profile/shop/".$id[0].".jpg";
		break;
	case stristr($photopath[0],"Jpg"):
		$myfile = "img/profile/shop/".$id[0].".jpg";
		
		break;
		case stristr($photopath[0],"jpeg"):
		$myfile = "img/profile/shop/".$id[0].".jpeg";
		break;
		case stristr($photopath[0],"JPEG"):
		$myfile = "img/profile/shop/".$id[0].".jpeg";
		break;
	case stristr($photopath[0],"Jpeg"):
		$myfile = "img/profile/shop/".$id[0].".jpeg";
		
		break;
		case stristr($photopath[0],"gif"):
		$myfile = "img/profile/shop/".$id[0].".gif";
		
		break;
		case stristr($photopath[0],"GIF"):
		$myfile = "img/profile/shop/".$id[0].".gif";
		
		break;
	case stristr($photopath[0],"Gif"):
		$myfile = "img/profile/shop/".$id[0].".gif";
		
		break;
		case stristr($photopath[0],"TIFF"):
		$myfile = "img/profile/shop/".$id[0].".tiff";
		break;
		case stristr($photopath[0],"tiff"):
		$myfile = "img/profile/shop/".$id[0].".tiff";
		
		break;
	case stristr($photopath[0],"Tiff"):
		$myfile = "img/profile/shop/".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}
file_put_contents($myfile,$contents);
}


if($idphotopath1[0]!=""){
$contents=base64_decode($idphoto1[0]);
switch (true) {
	case stristr($idphotopath1[0],"png"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".png";		
		break;
		case stristr($idphotopath1[0],"PNG"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".png";
		break;
	case stristr($idphotopath1[0],"Png"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".png";
		break;
		case stristr($idphotopath1[0],"jpg"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".jpg";
		break;
		case stristr($idphotopath1[0],"JPG"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".jpg";
		break;
	case stristr($idphotopath1[0],"Jpg"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".jpg";
		
		break;
		case stristr($idphotopath1[0],"jpeg"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".jpeg";
		break;
		case stristr($idphotopath1[0],"JPEG"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".jpeg";
		break;
	case stristr($idphotopath1[0],"Jpeg"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".jpeg";
		
		break;
		case stristr($idphotopath1[0],"gif"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".gif";
		
		break;
		case stristr($idphotopath1[0],"GIF"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".gif";
		
		break;
	case stristr($idphotopath1[0],"Gif"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".gif";
		
		break;
		case stristr($idphotopath1[0],"TIFF"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".tiff";
		break;
		case stristr($idphotopath1[0],"tiff"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".tiff";
		
		break;
	case stristr($idphotopath1[0],"Tiff"):
		$myfile = "img/legalphoto/shops/id_1_".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}
file_put_contents($myfile,$contents);
}



if($idphotopath2[0]!=""){
$contents=base64_decode($idphoto2[0]);
switch (true) {
	case stristr($idphotopath2[0],"png"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".png";		
		break;
		case stristr($idphotopath2[0],"PNG"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".png";
		break;
	case stristr($idphotopath2[0],"Png"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".png";
		break;
		case stristr($idphotopath2[0],"jpg"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".jpg";
		break;
		case stristr($idphotopath2[0],"JPG"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".jpg";
		break;
	case stristr($idphotopath2[0],"Jpg"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".jpg";
		
		break;
		case stristr($idphotopath2[0],"jpeg"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".jpeg";
		break;
		case stristr($idphotopath2[0],"JPEG"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".jpeg";
		break;
	case stristr($idphotopath2[0],"Jpeg"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".jpeg";
		
		break;
		case stristr($idphotopath2[0],"gif"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".gif";
		
		break;
		case stristr($idphotopath2[0],"GIF"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".gif";
		
		break;
	case stristr($idphotopath2[0],"Gif"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".gif";
		
		break;
		case stristr($idphotopath2[0],"TIFF"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".tiff";
		break;
		case stristr($idphotopath2[0],"tiff"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".tiff";
		
		break;
	case stristr($idphotopath2[0],"Tiff"):
		$myfile = "img/legalphoto/shops/id_2_".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}
file_put_contents($myfile,$contents);
}


$MyJsonData = preg_replace('/"Photo":".+?"/', '"Photo":"'.$myfile.'"', $MyJsonData, 1);
$MyJsonData = preg_replace('/"IdPhoto1":".+?"/', '"IdPhoto1":"'.$myfile1.'"', $MyJsonData, 1);
$MyJsonData = preg_replace('/"IdPhoto2":".+?"/', '"IdPhoto2":"'.$myfile2.'"', $MyJsonData, 1);




$shopphoto= 'UPDATE shop set Photo="'.$myfile.'", IdPhoto1="'.$myfile1.'", IdPhoto2="'.$myfile2.'" where Email="'.$email[0].'"'; 
$photoupdate= $conn->prepare($shopphoto);
$photoupdate->execute();

file_put_contents($myfile,$contents);
file_put_contents($myfile1,$contents1);
file_put_contents($myfile2,$contents2);
echo $MyJsonData;
echo ']';

$userlogin="INSERT INTO `loginandregister`(`ShopId`, `UserName`, `PassWord`, `UserType`) VALUES ('$id[0]','$username[0]','$password[0]','SHOP')";
$stmt1= $conn->prepare($userlogin);
$stmt1->execute();


}catch(Exception $e){
	echo "400 error bad request";
}
}else{
	echo "400 error bad request";
}
?>