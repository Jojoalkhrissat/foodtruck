<?php
require "connect.php";
// require "../sql.php";
function pushnotifications($shop,$title,$titlear,$body,$bodyar){
    require "connect.php";
$gettok="SELECT * from shopindex where shopid=".$shop;
$statement = $conn->query($gettok);
$statement->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData="";
while($row = $statement->fetch()):
$MyJsonData=$MyJsonData.','.json_encode($row, JSON_UNESCAPED_UNICODE);
endwhile;   
preg_match('/(?<=devicetoken":").+?(?=")/',$MyJsonData,$devicetoken);

$API_ACCESS_KEY="AAAA5NqD0Kg:APA91bF1Goi2XD4vLNT6OGQ8Eq5OCWzMDb_pveoJWBP6N7Xq3CdF_3oU3r9x5JItlDgv8zlEERRKRLePeTA1_ISwxNraGpDIy_8l2vxpoKqAgmz4ZMKtKU03kkZ_iQYmJ4QNdUvSQWq7";
define('API_ACCESS_KEY','AAAA5NqD0Kg:APA91bF1Goi2XD4vLNT6OGQ8Eq5OCWzMDb_pveoJWBP6N7Xq3CdF_3oU3r9x5JItlDgv8zlEERRKRLePeTA1_ISwxNraGpDIy_8l2vxpoKqAgmz4ZMKtKU03kkZ_iQYmJ4QNdUvSQWq7');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
 $token=$devicetoken[0];

    $notification = [
            'title' =>$title,
            'body' => $body,
            'titlear' =>$titlear, 
            'bodyar' =>$bodyar, 
            'shopid' =>$shop, 
            'icon' =>'myIcon', 
            'sound' => 'mySound',
            'click_action'=> 'FLUTTER_NOTIFICATION_CLICK'

        ];
        $extraNotificationData = ["message" => $notification];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification'=>$notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json'
        ];



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification,JSON_UNESCAPED_UNICODE));
        $result = curl_exec($ch);
        curl_close($ch);


        echo $result;


}


?>


