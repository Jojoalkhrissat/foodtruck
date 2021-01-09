<?php
require "../connect.php";
// require "../sql.php";
function pushnotifications($title,$titlear,$body,$bodyar){
    require "../connect.php";
$gettok="SELECT * from deviceindex";
$statement = $conn->query($gettok);
$statement->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData="";
while($row = $statement->fetch()):
$MyJsonData=$MyJsonData.','.json_encode($row, JSON_UNESCAPED_UNICODE);
endwhile;   
preg_match_all('/(?<=devicetoken":").+?(?=")/',$MyJsonData,$devicetoken);

$API_ACCESS_KEY="AAAA5NqD0Kg:APA91bF1Goi2XD4vLNT6OGQ8Eq5OCWzMDb_pveoJWBP6N7Xq3CdF_3oU3r9x5JItlDgv8zlEERRKRLePeTA1_ISwxNraGpDIy_8l2vxpoKqAgmz4ZMKtKU03kkZ_iQYmJ4QNdUvSQWq7";
define('API_ACCESS_KEY','AAAA5NqD0Kg:APA91bF1Goi2XD4vLNT6OGQ8Eq5OCWzMDb_pveoJWBP6N7Xq3CdF_3oU3r9x5JItlDgv8zlEERRKRLePeTA1_ISwxNraGpDIy_8l2vxpoKqAgmz4ZMKtKU03kkZ_iQYmJ4QNdUvSQWq7');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
 $token=$devicetoken[0];

    $notification = [
            'title' =>$title,
            'body' => $body,
            'titlear' =>$titlear, 
            'bodyar' =>$bodyar,
            'customerid'=>'all', 
            'icon' =>'myIcon', 
            'sound' => 'mySound',
            'click_action'=> 'FLUTTER_NOTIFICATION_CLICK'

        ];
        $extraNotificationData = ["message" => $notification];

        $fcmNotification = [
            'registration_ids' => $devicetoken[0], //multple token array
            // 'to'        => $token, //single token

            'data' => $notification
        ];

        $headers = [
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json'
        ];
$data=preg_replace('/(?<=\{).+?notification.+?\{.+?\}\,/', '', json_encode($fcmNotification,JSON_UNESCAPED_UNICODE));


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);


        echo $result;


}

pushnotifications($_POST['title'],$_POST['titlear'],$_POST['body'],$_POST['bodyar']);
?>


