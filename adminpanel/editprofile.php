<?php
require "../connect.php";
require "../sql.php";
session_start();

	
	$firstname=isset($_POST['firstname'])&&$_POST['firstname']!=''?$_POST['firstname']:$_SESSION['firstname'];
	$lastname=isset($_POST['lastname'])&&$_POST['lastname']!=''?$_POST['lastname']:$_SESSION['lastname'];
	$phonenumber=isset($_POST['phonenumber'])&&$_POST['phonenumber']!=''?$_POST['phonenumber']:$_SESSION['phonenumber'];
	$email=isset($_POST['email'])&&$_POST['email']!=''?$_POST['email']:$_SESSION['email'];
	$_SESSION['firstname']=$firstname;
	$_SESSION['lastname']=$lastname;
	$_SESSION['phonenumber']=$phonenumber;

$modifyshop='UPDATE `admin` SET `firstname`="'.$firstname.'",`lastname`="'.$lastname.'",`phonenumber`="'.$phonenumber.'" WHERE id="'.$_SESSION['id'].'" ';
echo $modifyshop;
sql_update($modifyshop,$conn);





if(!empty($_FILES['shopphoto']['tmp_name'])){
if(file_exists($_FILES['shopphoto']['tmp_name'])){


$target_dir = "../img/profile/admin/";

$uploadOk = 1;




  $check = getimagesize($_FILES["shopphoto"]["tmp_name"]);
  if($check !== false) {
   



    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
preg_match('/(?<=\/).+?(?=$)/',$check["mime"],$ext);

$target_file = $target_dir . basename($_SESSION['id'].'.'.$ext[0]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["shopphoto"]["tmp_name"], $target_file)) {
  	$target_file=preg_replace('/\.\.\//', '', $target_file);
    $modifyphoto='UPDATE `admin` SET photo="'.$target_file.'" where id="'.$_SESSION['id'].'"';
    
echo $modifyphoto;
    sql_update($modifyphoto,$conn);

    $_SESSION['photo']=$target_file;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


}


header('Location: '.$baseurl.'/adminpanel/profile.php");











?>