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
preg_match('/(?<=gender":").+?(?=")/',$post,$gender);
preg_match('/(?<=address":").+?(?=")/',$post,$address);
preg_match('/(?<=dob":").+?(?=")/',$post,$dob);
preg_match('/(?<=idphoto1":").+?(?=")/',$post,$idphoto1);
preg_match('/(?<=idphoto2":").+?(?=")/',$post,$idphoto2);
preg_match('/(?<=licencephoto2":").+?(?=")/',$post,$licencephoto2);
preg_match('/(?<=licencephoto1":").+?(?=")/',$post,$licencephoto1);
preg_match('/(?<=noncriminalrecord":").+?(?=")/',$post,$noncriminalrecord);
preg_match('/(?<=carcolor":").+?(?=")/',$post,$carcolor);
preg_match('/(?<=carplate":").+?(?=")/',$post,$carplate);
preg_match('/(?<=carlicence1":").+?(?=")/',$post,$carlicence1);
preg_match('/(?<=carlicence2":").+?(?=")/',$post,$carlicence2);
preg_match('/(?<=carbrand":").+?(?=")/',$post,$carbrand);
preg_match('/(?<=carsubbrand":").+?(?=")/',$post,$carsubbrand);
preg_match('/(?<=carmodel":").+?(?=")/',$post,$carmodel);



if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
preg_match('/(?<=firstname=).+?(?=&|$)/',$post,$firstname);
preg_match('/(?<=lastname=).+?(?=&|$)/',$post,$lastname);
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);
preg_match('/(?<=phonenumber=).+?(?=&|$)/',$post,$phonenumber);
preg_match('/(?<=photopath=).+?(?=&|$)/',$post,$photopath);
preg_match('/(?<=gender=).+?(?=&|$)/',$post,$gender);
preg_match('/(?<=address=).+?(?=&|$)/',$post,$address);
preg_match('/(?<=dob=).+?(?=&|$)/',$post,$dob);
preg_match('/(?<=idphoto1=).+?(?=&|$)/',$post,$idphoto1);
preg_match('/(?<=idphoto2=).+?(?=&|$)/',$post,$idphoto2);
preg_match('/(?<=licencephoto2=).+?(?=&|$)/',$post,$licencephoto2);
preg_match('/(?<=licencephoto1=).+?(?=&|$)/',$post,$licencephoto1);
preg_match('/(?<=noncriminalrecord=).+?(?=&|$)/',$post,$noncriminalrecord);
preg_match('/(?<=carcolor=).+?(?=&|$)/',$post,$carcolor);
preg_match('/(?<=carplate=).+?(?=&|$)/',$post,$carplate);
preg_match('/(?<=carlicence1=).+?(?=&|$)/',$post,$carlicence1);
preg_match('/(?<=carlicence2=).+?(?=&|$)/',$post,$carlicence2);
preg_match('/(?<=carbrand=).+?(?=&|$)/',$post,$carbrand);
preg_match('/(?<=carsubbrand=).+?(?=&|$)/',$post,$carsubbrand);
preg_match('/(?<=carmodel=).+?(?=&|$)/',$post,$carmodel);
}
$getcardetails='SELECT * from cars WHERE Brand="'.$carbrand[0].'" AND SubBrand="'.$carsubbrand[0].'" AND Model="'.$carmodel[0].'"';
$MyJson="";
$cardata=$conn->query($getcardetails);
$cardata->setFetchMode(PDO::FETCH_ASSOC);
while($row = $cardata->fetch()):
$MyJson=$MyJson.",".json_encode($row);
endwhile;
$MyJson=preg_replace('/,/', '', $MyJson, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJson,$carid);
$userinfo= "INSERT INTO `drivers`(`FName`, `LName`, `PhoneNumber`, `Email`, `Address`, `DOB`, `Gender`,  `LicencePhoto1`, `LicencePhoto2`, `IdPhoto1`, `IdPhoto2`, `NonCriminalRecord`, `CarAssigned`,`CarColor`, `CarPlate`, `CarLicence1`, `CarLicence2`) VALUES ('$firstname[0]','$lastname[0]','$phonenumber[0]','$email[0]','$address[0]','$dob[0]','$gender[0]','$licencephoto1[0]','$licencephoto2[0]','$idphoto1[0]','$idphoto2[0]','$noncriminalrecord[0]','$carid[0]','$carcolor[0]','$carplate[0]','$carlicence1[0]','$carlicence2[0]')";
echo $userinfo;
$stmt= $conn->prepare($userinfo);
$stmt->execute();

$fetchuserinfo='SELECT * FROM drivers WHERE Email="'.$email[0].'"';
$getuser = $conn->query($fetchuserinfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);



if(isset($photopath[0])){
$contents=file_get_contents($photopath[0]);
switch (true) {
	case stristr($photopath[0],"png"):
		$myfile = "img/profile/driver_".$id[0].".png";		
		
		break;
		case stristr($photopath[0],"PNG"):
		$myfile = "img/profile/driver_".$id[0].".png";
		break;
	case stristr($photopath[0],"Png"):
		$myfile = "img/profile/driver_".$id[0].".png";
		break;
		case stristr($photopath[0],"jpg"):
		$myfile = "img/profile/driver_".$id[0].".jpg";
		break;
		case stristr($photopath[0],"JPG"):
		$myfile = "img/profile/driver_".$id[0].".jpg";
		break;
	case stristr($photopath[0],"Jpg"):
		$myfile = "img/profile/driver_".$id[0].".jpg";
		
		break;
		case stristr($photopath[0],"gif"):
		$myfile = "img/profile/driver_".$id[0].".gif";
		
		break;
		case stristr($photopath[0],"GIF"):
		$myfile = "img/profile/driver_".$id[0].".gif";
		
		break;
	case stristr($photopath[0],"Gif"):
		$myfile = "img/profile/driver_".$id[0].".gif";
		
		break;
		case stristr($photopath[0],"TIFF"):
		$myfile = "img/profile/driver_".$id[0].".tiff";
		break;
		case stristr($photopath[0],"tiff"):
		$myfile = "img/profile/driver_".$id[0].".tiff";
		
		break;
	case stristr($photopath[0],"Tiff"):
		$myfile = "img/profile/driver_".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}

}
$contents1=file_get_contents($idphoto1[0]);
switch (true) {
	case stristr($idphoto1[0],"png"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".png";		
		break;
		case stristr($idphoto1[0],"PNG"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".png";
		break;
	case stristr($idphoto1[0],"Png"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".png";
		break;
		case stristr($idphoto1[0],"jpg"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".jpg";
		break;
		case stristr($idphoto1[0],"JPG"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".jpg";
		break;
	case stristr($idphoto1[0],"Jpg"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".jpg";
		
		break;
		case stristr($idphoto1[0],"gif"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".gif";
		
		break;
		case stristr($idphoto1[0],"GIF"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".gif";
		
		break;
	case stristr($idphoto1[0],"Gif"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".gif";
		
		break;
		case stristr($idphoto1[0],"TIFF"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".tiff";
		break;
		case stristr($idphoto1[0],"tiff"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".tiff";
		
		break;
	case stristr($idphoto1[0],"Tiff"):
		$myfile1 = "img/legalphotos/driver_id1_".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}



$contents2=file_get_contents($idphoto2[0]);
switch (true) {
	case stristr($idphoto2[0],"png"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".png";		
		break;
		case stristr($idphoto2[0],"PNG"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".png";
		break;
	case stristr($idphoto2[0],"Png"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".png";
		break;
		case stristr($idphoto2[0],"jpg"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".jpg";
		break;
		case stristr($idphoto2[0],"JPG"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".jpg";
		break;
	case stristr($idphoto2[0],"Jpg"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".jpg";
		
		break;
		case stristr($idphoto2[0],"gif"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".gif";
		
		break;
		case stristr($idphoto2[0],"GIF"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".gif";
		
		break;
	case stristr($idphoto2[0],"Gif"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".gif";
		
		break;
		case stristr($idphoto2[0],"TIFF"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".tiff";
		break;
		case stristr($idphoto2[0],"tiff"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".tiff";
		
		break;
	case stristr($idphoto2[0],"Tiff"):
		$myfile2 = "img/legalphotos/driver_id2_".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}

$contents3=file_get_contents($licencephoto1[0]);
switch (true) {
	case stristr($licencephoto1[0],"png"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".png";		
		break;
		case stristr($licencephoto1[0],"PNG"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".png";
		break;
	case stristr($licencephoto1[0],"Png"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".png";
		break;
		case stristr($licencephoto1[0],"jpg"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".jpg";
		break;
		case stristr($licencephoto1[0],"JPG"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".jpg";
		break;
	case stristr($licencephoto1[0],"Jpg"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".jpg";
		
		break;
		case stristr($licencephoto1[0],"gif"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".gif";
		
		break;
		case stristr($licencephoto1[0],"GIF"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".gif";
		
		break;
	case stristr($licencephoto1[0],"Gif"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".gif";
		
		break;
		case stristr($licencephoto1[0],"TIFF"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".tiff";
		break;
		case stristr($licencephoto1[0],"tiff"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".tiff";
		
		break;
	case stristr($licencephoto1[0],"Tiff"):
		$myfile3 = "img/legalphotos/driver_licence1_".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}

$contents4=file_get_contents($licencephoto2[0]);
switch (true) {
	case stristr($licencephoto2[0],"png"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".png";		
		break;
		case stristr($licencephoto2[0],"PNG"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".png";
		break;
	case stristr($licencephoto2[0],"Png"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".png";
		break;
		case stristr($licencephoto2[0],"jpg"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".jpg";
		break;
		case stristr($licencephoto2[0],"JPG"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".jpg";
		break;
	case stristr($licencephoto2[0],"Jpg"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".jpg";
		
		break;
		case stristr($licencephoto2[0],"gif"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".gif";
		
		break;
		case stristr($licencephoto2[0],"GIF"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".gif";
		
		break;
	case stristr($licencephoto2[0],"Gif"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".gif";
		
		break;
		case stristr($licencephoto2[0],"TIFF"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".tiff";
		break;
		case stristr($licencephoto2[0],"tiff"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".tiff";
		
		break;
	case stristr($licencephoto2[0],"Tiff"):
		$myfile4 = "img/legalphotos/driver_licence2_".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}
$contents5=file_get_contents($noncriminalrecord[0]);
switch (true) {
	case stristr($noncriminalrecord[0],"png"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".png";		
		break;
		case stristr($noncriminalrecord[0],"PNG"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".png";
		break;
	case stristr($noncriminalrecord[0],"Png"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".png";
		break;
		case stristr($noncriminalrecord[0],"jpg"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".jpg";
		break;
		case stristr($noncriminalrecord[0],"JPG"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".jpg";
		break;
	case stristr($noncriminalrecord[0],"Jpg"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".jpg";
		
		break;
		case stristr($noncriminalrecord[0],"gif"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".gif";
		
		break;
		case stristr($noncriminalrecord[0],"GIF"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".gif";
		
		break;
	case stristr($noncriminalrecord[0],"Gif"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".gif";
		
		break;
		case stristr($noncriminalrecord[0],"TIFF"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".tiff";
		break;
		case stristr($noncriminalrecord[0],"tiff"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".tiff";
		
		break;
	case stristr($noncriminalrecord[0],"Tiff"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".tiff";
		break;
		case stristr($noncriminalrecord[0],"pdf"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".pdf";
		break;
	case stristr($noncriminalrecord[0],"Pdf"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".pdf";
		break;
		case stristr($noncriminalrecord[0],"PDF"):
		$myfile5 = "img/legalphotos/driver_noncriminalrecord_".$id[0].".pdf";
		break;
	default:
		echo "use pdf or image file";
		break;
}



$contents6=file_get_contents($carlicence1[0]);
switch (true) {
	case stristr($carlicence1[0],"png"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".png";		
		break;
		case stristr($carlicence1[0],"PNG"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".png";
		break;
	case stristr($carlicence1[0],"Png"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".png";
		break;
		case stristr($carlicence1[0],"jpg"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".jpg";
		break;
		case stristr($carlicence1[0],"JPG"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".jpg";
		break;
	case stristr($carlicence1[0],"Jpg"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".jpg";
		
		break;
		case stristr($carlicence1[0],"gif"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".gif";
		
		break;
		case stristr($carlicence1[0],"GIF"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".gif";
		
		break;
	case stristr($carlicence1[0],"Gif"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".gif";
		
		break;
		case stristr($carlicence1[0],"TIFF"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".tiff";
		break;
		case stristr($carlicence1[0],"tiff"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".tiff";
		
		break;
	case stristr($carlicence1[0],"Tiff"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".tiff";
		
		break;
			case stristr($carlicence1[0],"Tiff"):
		$myfile6 = "img/legalphotos/driver_carlicence1_".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}



$contents7=file_get_contents($carlicence2[0]);
switch (true) {
	case stristr($carlicence2[0],"png"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".png";		
		break;
		case stristr($carlicence2[0],"PNG"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".png";
		break;
	case stristr($carlicence2[0],"Png"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".png";
		break;
		case stristr($carlicence2[0],"jpg"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".jpg";
		break;
		case stristr($carlicence2[0],"JPG"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".jpg";
		break;
	case stristr($carlicence2[0],"Jpg"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".jpg";
		
		break;
		case stristr($carlicence2[0],"gif"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".gif";
		
		break;
		case stristr($carlicence2[0],"GIF"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".gif";
		
		break;
	case stristr($carlicence2[0],"Gif"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".gif";
		
		break;
		case stristr($carlicence2[0],"TIFF"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".tiff";
		break;
		case stristr($carlicence2[0],"tiff"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".tiff";
		
		break;
	case stristr($carlicence2[0],"Tiff"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".tiff";
		
		break;
			case stristr($carlicence2[0],"Tiff"):
		$myfile7 = "img/legalphotos/driver_carlicence2_".$id[0].".tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}


$MyJsonData = preg_replace('/"Photo":""/', '"Photo":"'.$myfile.'"', $MyJsonData, 1);
$MyJsonData = preg_replace('/"IdPhoto1":".+?"/', '"IdPhoto1":"'.$myfile1.'"', $MyJsonData, 1);
$MyJsonData = preg_replace('/"IdPhoto2":".+?"/', '"IdPhoto2":"'.$myfile2.'"', $MyJsonData, 1);
$MyJsonData = preg_replace('/"LicencePhoto1":".+?"/', '"LicencePhoto1":"'.$myfile3.'"', $MyJsonData, 1);
$MyJsonData = preg_replace('/"LicencePhoto2":".+?"/', '"LicencePhoto2":"'.$myfile4.'"', $MyJsonData, 1);
$MyJsonData = preg_replace('/"NonCriminalRecord":".+?"/', '"NonCriminalRecord":"'.$myfile5.'"', $MyJsonData, 1);
$MyJsonData = preg_replace('/"CarLicence1":".+?"/', '"CarLicence1":"'.$myfile6.'"', $MyJsonData, 1);
$MyJsonData = preg_replace('/"CarLicence2":".+?"/', '"CarLicence2":"'.$myfile7.'"', $MyJsonData, 1);
file_put_contents($myfile,$contents);
file_put_contents($myfile1,$contents1);
file_put_contents($myfile2,$contents2);
file_put_contents($myfile3,$contents3);
file_put_contents($myfile4,$contents4);
file_put_contents($myfile5,$contents5);
file_put_contents($myfile6,$contents6);
file_put_contents($myfile7,$contents7);



$driverphoto= 'UPDATE drivers set Photo="'.$myfile.'", IdPhoto1="'.$myfile1.'" , IdPhoto2="'.$myfile2.'", LicencePhoto1="'.$myfile3.'" , LicencePhoto2="'.$myfile4.'" , NonCriminalRecord="'.$myfile5.'" , CarLicence1="'.$myfile6.'" , CarLicence2="'.$myfile7.'" where Email="'.$email[0].'"'; 
$photoupdate= $conn->prepare($driverphoto);
$photoupdate->execute();



echo $MyJsonData;

preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
$userlogin="INSERT INTO `loginandregister`(`DriverId`, `UserName`, `PassWord`, `UserType`) VALUES ('$id[0]','$username[0]','$password[0]','DRIVER')";
$stmt1= $conn->prepare($userlogin);
$stmt1->execute();

}catch(Exception $e){
	echo "400 error bad request";
}
}else{
	echo "400 error bad request";
}
?>