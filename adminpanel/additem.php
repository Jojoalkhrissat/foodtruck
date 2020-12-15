<?php
require "connect.php";

	function time_to_decimal($time) {
    $timeArr = explode(':', $time);
    $decTime = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60);
 
    return $decTime;
}
  session_start();
$shop= $_SESSION["id"];
$itemname=$_POST['itemname'];
$itemnamear=$_POST['itemnamear'];
$description=$_POST['description'];
$descriptionar=$_POST['descriptionar'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$preparetime=$_POST['preparetime'];
$timesamples=$_POST['timesamples'];
$subcategories= $_POST["subcategory"];






$items= 'INSERT INTO `items`(`itemname`, `itemnamear`, `description`, `descriptionar`, `subcategory`, `shop`, `price`, `quantity`, `preparetime`, `timesamples`) VALUES ("'.$itemname.'", "'.$itemnamear.'", "'.$description.'", "'.$descriptionar.'", "'.$subcategories.'", "'.$shop.'", "'.$price.'", "'.$quantity.'", "'.$preparetime.'", "'.$timesamples.'")';
echo $items;
$createsubcat= $conn->prepare($items);
$createsubcat->execute();



echo '[{"message":"your item was entered"}]';	


$itemid='SELECT MAX(id) as id FROM items where shop="'.$shop.'"';
$getitemid = $conn->query($itemid);
$getitemid->setFetchMode(PDO::FETCH_ASSOC);

while($row = $getitemid->fetch()):
$id=$row['id'];
endwhile;














































if(file_exists($_FILES['photo']['tmp_name'])){


$target_dir = "../img/items/";

$uploadOk = 1;




  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
 



    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
preg_match('/(?<=\/).+?(?=$)/',$check["mime"],$ext);


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

$subcat= 'update `items` set photo1="'.$target_file.'" where id="'.$id.'"';
$createsubcat= $conn->prepare($subcat);
$createsubcat->execute();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}






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

$subcat= 'update `items` set photo2="'.$target_file.'" where id="'.$id.'"';

$createsubcat= $conn->prepare($subcat);
$createsubcat->execute();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}












header('location:http://localhost/foodtruck/adminpanel/items');


?>