<?php
require "connect.php";
require "sql.php";

$gettok="SELECT * from deviceindex where customer=234";
$MyJsonData=sql_selectdata($gettok,$conn);
preg_match('/(?<=devicetoken":").+?(?=")/',$MyJsonData,$devicetoken);

$API_ACCESS_KEY="AAAA4ckndXg:APA91bE3yAgJdJPOFjbBRQ2qBv6u-VsIO5bx9tTwyyv-UrUSl10sKeOIRqfgLSod91gqq_anJM2GLkylQY7r-uuPREQ9Qx8bz5pngEInq1d9K5B9-X5fj2yiIgHY4zvsl_2GI69j6JFL";
define('API_ACCESS_KEY','AAAA4ckndXg:APA91bE3yAgJdJPOFjbBRQ2qBv6u-VsIO5bx9tTwyyv-UrUSl10sKeOIRqfgLSod91gqq_anJM2GLkylQY7r-uuPREQ9Qx8bz5pngEInq1d9K5B9-X5fj2yiIgHY4zvsl_2GI69j6JFL');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
 $token=$devicetoken[0];

    $notification = [
            'title' =>'title',
            'body' => 'body of message.',
            'titlear' =>'عنوان الرساله', 
            'bodyar' =>'جسد الرساله', 
            'customerid' =>'234', 
            'icon' =>'myIcon', 
            'sound' => 'mySound',
            'click_action'=> 'FLUTTER_NOTIFICATION_CLICK'

        ];
        $extraNotificationData = ["message" => $notification];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            // 'notification' => $notification,
            'data' => $notification
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
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);


        echo $result;

?>


