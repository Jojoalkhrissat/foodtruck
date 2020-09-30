<?php 
require "connect.php";
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");



$response = array();
$upload_dir = 'img/profile/';
$server_url = 'http://localhost/shopdotjo';
$userid=$_POST['id'];
if($_FILES['avatar'])
{

    $avatar_name = $_FILES["avatar"]["name"];
    $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
    $error = $_FILES["avatar"]["error"];
if($error > 0){
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the file!"
        );
    }else 
    {
        preg_match('/\.[A-z]+$/', $avatar_name, $random_name);

$fetchuserinfo='SELECT * FROM loginandregister WHERE id="'.$userid.'"';
$getuser = $conn->query($fetchuserinfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData=""; 
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);

preg_match('/(?<=UserType":").+?(?=")/',$MyJsonData,$usertype);

switch ($usertype) {
case "ADMIN":
preg_match('/(?<=AdminId":").+?(?=")/',$MyJsonData,$adminid);
$empt= 'UPDATE admin set Photo=" " where id="'.$id.'"';
$emptyphoto= $conn->prepare($empt);
$emptyphoto->execute();
$upload_name = $upload_dir.'admin/'.$adminid[0].strtolower($random_name[0]);
$adminphoto= 'UPDATE admin set Photo="'.$upload_dir.'admin/'.$adminidid[0].$random_name[0].'" where id="'.$adminid[0].'"';
$photoupdate= $conn->prepare($adminphoto);
$photoupdate->execute();
$count = $photoupdate->rowCount();
break;
case "CUSTOMER":
preg_match('/(?<=CustomerId":").+?(?=")/',$MyJsonData,$customerid);
$empt= 'UPDATE customers set Photo=" " where id="'.$id.'"';
$emptyphoto= $conn->prepare($empt);
$emptyphoto->execute();
$upload_name = $upload_dir.'customer/'.$customerid[0].strtolower($random_name[0]);
$customerphoto= 'UPDATE customers set Photo="'.$upload_dir.'customer/'.$customerid[0].$random_name[0].'" where id="'.$customerid[0].'"';
$photoupdate= $conn->prepare($customerphoto);
$photoupdate->execute();
$count = $photoupdate->rowCount();
break;
case "DRIVER":
$upload_name = $upload_dir.'driver/'.$driverid[0].strtolower($random_name[0]);
preg_match('/(?<=DriverId":").+?(?=")/',$MyJsonData,$driverid);
$empt= 'UPDATE drivers set Photo=" " where id="'.$id.'"';
$emptyphoto= $conn->prepare($empt);
$emptyphoto->execute();
$driverphoto= 'UPDATE drivers set Photo="'.$upload_dir.'driver/'.$driverid[0].$random_name[0].'" where id="'.$driverid[0].'"';
$photoupdate= $conn->prepare($driverphoto);
$photoupdate->execute(); 
$count = $photoupdate->rowCount();
break;
case "SHOP":

preg_match('/(?<=ShopId":").+?(?=")/',$MyJsonData,$shopid);
$empt= 'UPDATE shop set Photo=" " where id="'.$id.'"';
$emptyphoto= $conn->prepare($empt);
$emptyphoto->execute();
$upload_name = $upload_dir.'shop/'.$shopid[0].strtolower($random_name[0]);
$shopphoto= 'UPDATE shop set Photo="'.$upload_dir.'shop/'.$shopid[0].$random_name[0].'" where id="'.$shopid[0].'"';
$photoupdate= $conn->prepare($shopphoto);
$photoupdate->execute();
$count = $photoupdate->rowCount();
break;
default:
preg_match('/(?<=AdminId":").+?(?=")/',$MyJsonData,$adminid);
preg_match('/(?<=ShopId":").+?(?=")/',$MyJsonData,$shopid);
preg_match('/(?<=CustomerId":").+?(?=")/',$MyJsonData,$customerid);
preg_match('/(?<=DriverId":").+?(?=")/',$MyJsonData,$driverid);

if(isset($adminid[0])){
    $empt= 'UPDATE admin set Photo=" " where id="'.$id.'"';
$emptyphoto= $conn->prepare($empt);
$emptyphoto->execute();
    $upload_name = $upload_dir.'admin/'.$adminid[0].strtolower($random_name[0]);
$adminphoto= 'UPDATE admin set Photo="'.$upload_dir.'admin/'.$adminid[0].$random_name[0].'" where id="'.$adminid[0].'"';
$photoupdate= $conn->prepare($adminphoto);
$photoupdate->execute();
$count = $photoupdate->rowCount();
}
elseif(isset($shopid[0])){
    $empt= 'UPDATE shop set Photo=" " where id="'.$id.'"';
$emptyphoto= $conn->prepare($empt);
$emptyphoto->execute();
$upload_name = $upload_dir.'shop/'.$shopid[0].strtolower($random_name[0]);
$shopphoto= 'UPDATE shop set Photo="'.$upload_dir.'shop/'.$shopid[0].$random_name[0].'" where id="'.$shopid[0].'"';
$photoupdate= $conn->prepare($shopphoto);
$photoupdate->execute();
$count = $photoupdate->rowCount();
}
elseif(isset($customerid[0])){
    $empt= 'UPDATE customers set Photo=" " where id="'.$id.'"';
$emptyphoto= $conn->prepare($empt);
$emptyphoto->execute();
    $upload_name = $upload_dir.'customer/'.$customerid[0].strtolower($random_name[0]);
$customerphoto= 'UPDATE customers set Photo="'.$upload_dir.'customer/'.$customerid[0].$random_name[0].'" where id="'.$customerid[0].'"';
$photoupdate= $conn->prepare($customerphoto);
$photoupdate->execute();
$count = $photoupdate->rowCount();
}elseif(isset($driverid[0])){
     $empt= 'UPDATE drivers set Photo=" " where id="'.$id.'"';
$emptyphoto= $conn->prepare($empt);
$emptyphoto->execute();
$upload_name = $upload_dir.'driver/'.$driverid[0].strtolower($random_name[0]);
preg_match('/(?<=DriverId":").+?(?=")/',$MyJsonData,$driverid);
$driverphoto= 'UPDATE drivers set Photo="'.$upload_dir.'driver/'.$driverid[0].$random_name[0].'" where id="'.$driverid[0].'"';
$photoupdate= $conn->prepare($driverphoto);
$photoupdate->execute();  
$count = $photoupdate->rowCount();
}else{
    $count=0;
}
break;

}


    
    

if($count>0){
if(move_uploaded_file($avatar_tmp_name , $upload_name)) {
            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "File uploaded successfully",
                "url" => '/'.$upload_name
              );
        }else
        {
            $response = array(
                "status" => "error",
                "error" => true,
                "message" => "Error uploading the file!"
            );
            http_response_code(400);
        }

    }else
        {
            $response = array(
                "status" => "error",
                "error" => true,
                "message" => "Error uploading the file!"
            );
            http_response_code(400);
        }
    }



    

}else{
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "No file was sent!"
    );
    http_response_code(400);
}

echo json_encode($response);
?>