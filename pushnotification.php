<?php
require "connect.php";
require "sql.php";

$gettok="SELECT * from deviceindex where customer=234";
$MyJsonData=sql_selectdata($gettok,$conn);
preg_match('/(?<=devicetoken":").+?(?=")/',$MyJsonData,$devicetoken);

$API_ACCESS_KEY="AAAA5NqD0Kg:APA91bF1Goi2XD4vLNT6OGQ8Eq5OCWzMDb_pveoJWBP6N7Xq3CdF_3oU3r9x5JItlDgv8zlEERRKRLePeTA1_ISwxNraGpDIy_8l2vxpoKqAgmz4ZMKtKU03kkZ_iQYmJ4QNdUvSQWq7";
define('API_ACCESS_KEY','AAAA5NqD0Kg:APA91bF1Goi2XD4vLNT6OGQ8Eq5OCWzMDb_pveoJWBP6N7Xq3CdF_3oU3r9x5JItlDgv8zlEERRKRLePeTA1_ISwxNraGpDIy_8l2vxpoKqAgmz4ZMKtKU03kkZ_iQYmJ4QNdUvSQWq7');
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

// API access key from Google API's Console
// define( 'API_ACCESS_KEY', 'AAAA5NqD0Kg:APA91bF1Goi2XD4vLNT6OGQ8Eq5OCWzMDb_pveoJWBP6N7Xq3CdF_3oU3r9x5JItlDgv8zlEERRKRLePeTA1_ISwxNraGpDIy_8l2vxpoKqAgmz4ZMKtKU03kkZ_iQYmJ4QNdUvSQWq7' );


// $registrationIds = array( $devicetoken[0] );

// // prep the bundle
// $msg = array
// (
//     'message'     => 'here is a message. message',
//     'title'        => 'This is a title. title',
//     'subtitle'    => 'This is a subtitle. subtitle',
//     'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
//     'vibrate'    => 1,

//     'sound'        => 1,
//     'largeIcon'    => 'large_icon',
//     'smallIcon'    => 'small_icon'
// );

// $fields = array
// (
//     // 'registration_ids'     => $devicetoken[0],
//     'to'=> $devicetoken[0],
//     'data'            => $msg
// );
 
// $headers = array
// (
//     'Authorization: key=' . API_ACCESS_KEY,
//     'Content-Type: application/json'
// );
 
// $ch =curl_init();
// curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
// curl_setopt( $ch,CURLOPT_POST, true );
// curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
// curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
// curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
// curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
// $result = ($ch );
// curl_close( $ch );

// echo $result;






?>


