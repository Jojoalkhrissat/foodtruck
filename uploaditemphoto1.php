<?php 
require "connect.php";
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");



$response = array();
$upload_dir = 'img/items/';
$server_url = 'http://localhost/shopdotjo';
$id=$_POST['id'];
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
$upload_name = $upload_dir.$id.'_1'.strtolower($random_name[0]);
$empt= 'UPDATE items set Photo1=" " where id="'.$id.'"';
$emptyphoto= $conn->prepare($empt);
$emptyphoto->execute();
$itemphoto= 'UPDATE items set Photo1="'.$upload_dir.$id.'_1'.$random_name[0].'" where id="'.$id.'"';
$photoupdate= $conn->prepare($itemphoto);
$photoupdate->execute();
$count = $photoupdate->rowCount();
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