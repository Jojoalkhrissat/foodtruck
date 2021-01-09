<?php
require "../connect.php";

  session_start();
  $id=$_SESSION["item"];
$shop= $_SESSION["id"];
$itemname=isset($_POST["itemname"])&&$_POST["itemname"]!=''?$_POST["itemname"]:$_SESSION["itemname_".$id];
$itemnamear=isset($_POST["itemnamear"])&&$_POST["itemnamear"]!=''?$_POST["itemnamear"]:$_SESSION["itemnamear_".$id];
$description=isset($_POST["description"])&&$_POST["description"]!=''?$_POST["description"]:$_SESSION["description_".$id];
$descriptionar=isset($_POST["descriptionar"])&&$_POST["descriptionar"]!=''?$_POST["descriptionar"]:$_SESSION["descriptionar_".$id];
$price=isset($_POST["price"])&&$_POST["price"]!=''?$_POST["price"]:$_SESSION["price_".$id];
$quantity=isset($_POST["quantity"])&&$_POST["quantity"]!=''?$_POST["quantity"]:$_SESSION["quantity_".$id];
$preparetime=isset($_POST["preparetime"])&&$_POST["preparetime"]!=''?$_POST["preparetime"]:$_SESSION["preparetime_".$id];
$timesamples=isset($_POST["timesamples"])&&$_POST["timesamples"]!=''?$_POST["timesamples"]:$_SESSION["timesamples_".$id];
$subcategories= isset($_POST["subcategories"])&&$_POST["subcategories"]!=''?$_POST["subcategories"]:$_SESSION["subcategories_".$id];






$items= 'update `items` set `itemname`="'.$itemname.'", `itemnamear`="'.$itemnamear.'", `description`="'.$description.'", `descriptionar`="'.$descriptionar.'", `subcategory`="'.$subcategories.'" ,`price`="'.$price.'", `quantity`="'.$quantity.'", `preparetime`="'.$preparetime.'", `timesamples`="'.$timesamples.'" where id="'.$id.'"';

$createsubcat= $conn->prepare($items);
$createsubcat->execute();



echo '[{"message":"your item was entered"}]';	
















































if(!empty($_FILES['photo']['tmp_name'])){
if(file_exists($_FILES['photo']['tmp_name'])){


$target_dir = "../img/items/";

$uploadOk = 1;




  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    // echo "<br>";
    // echo $check["mime"];



    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
preg_match('/(?<=\/).+?(?=$)/',$check["mime"],$ext);
// echo $ext[0];

$target_file = $target_dir . basename($id.'_1.'.$ext[0]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    $target_file=preg_replace('/\.\.\//', '', $target_file);
$subcat= 'update `items` set photo="'.$target_file.'" where id="'.$id.'"';
$createsubcat= $conn->prepare($subcat);
$createsubcat->execute();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

}




if(!empty($_FILES['photo1']['tmp_name'])){

if(file_exists($_FILES['photo1']['tmp_name'])){


$target_dir = "../img/items/";

$uploadOk = 1;




  $check = getimagesize($_FILES["photo1"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    // echo "<br>";
    // echo $check["mime"];



    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
preg_match('/(?<=\/).+?(?=$)/',$check["mime"],$ext);
// echo $ext[0];

$target_file = $target_dir . basename($id.'_2.'.$ext[0]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_file)) {
    $target_file=preg_replace('/\.\.\//', '', $target_file);
echo $target_file;
$subcat= 'update `items` set photo1="'.$target_file.'" where id="'.$id.'"';
$createsubcat= $conn->prepare($subcat);
$createsubcat->execute();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}




if(!empty($_FILES['photo2']['tmp_name'])){
if(file_exists($_FILES['photo2']['tmp_name'])){


$target_dir = "../img/items/";

$uploadOk = 1;




  $check = getimagesize($_FILES["photo2"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    // echo "<br>";
    // echo $check["mime"];



    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
preg_match('/(?<=\/).+?(?=$)/',$check["mime"],$ext);
// echo $ext[0];

$target_file = $target_dir . basename($id.'_3.'.$ext[0]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["photo2"]["tmp_name"], $target_file)) {
    $target_file=preg_replace('/\.\.\//', '', $target_file);
echo $target_file;
$subcat= 'update `items` set photo2="'.$target_file.'" where id="'.$id.'"';

$createsubcat= $conn->prepare($subcat);
$createsubcat->execute();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


}









header('location:'.$baseurl.'/adminpanelft/itemdetails?item='.$id.'');


?>