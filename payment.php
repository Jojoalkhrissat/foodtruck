<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{


function request() {
	require "connect.php";
require "sql.php";
$post = file_get_contents("php://input");
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=amount":").+?(?=")/',$post,$amount);
preg_match('/(?<=pm":").+?(?=")/',$post,$pm);
preg_match('/(?<=email":").+?(?=")/',$post,$email);
preg_match('/(?<=orderid":").+?(?=")/',$post,$orderid);
preg_match('/(?<=street":").+?(?=")/',$post,$street);
preg_match('/(?<=postcode":").+?(?=")/',$post,$postcode);
preg_match('/(?<=firstname":").+?(?=")/',$post,$firstname);
preg_match('/(?<=lastname":").+?(?=")/',$post,$lastname);
preg_match('/(?<=city":").+?(?=")/',$post,$city);
preg_match('/(?<=state":").+?(?=")/',$post,$state);

$url = "https://test.oppwa.com/v1/checkouts";
$len= strlen(substr(strrchr($amount[0], "."), 1));
if($amount[0]>10){
$amount[0]=number_format($amount[0], 2);
$amount[0]='0'.$amount[0];

}
if($len==1){
$amount[0]=$amount[0].'0';    
}



if($pm[0]=='VISA'||$pm[0]=='MASTER'){

    
    $data = "entityId=8ac7a4c8765289b001765d5ee2fc15ac" .
                "&amount=".$amount[0]."" .
                "&currency=SAR" .
                "&paymentType=PA".
                "&testMode=EXTERNAL".
				"&customer.email=".$email[0].
				"&billing.street1=".$street[0].
				"&billing.city=".$city[0].
				"&billing.state=".$state[0]. 
				"&billing.country=SA".
				"&billing.postcode=".$postcode[0].
				"&customer.givenName=".$firstname[0].
				"&customer.surname=".$lastname[0].
                "&merchantTransactionId=".$orderid[0] ;


    
}elseif ($pm[0]=='MADA') {
 
    $data = "entityId=8ac7a4c8765289b001765d601d8a15b1" .
                "&amount=".$amount[0]."" .
                "&currency=SAR" .
                "&paymentType=PA".
                "&customer.email=".$email[0].
                "&billing.street1=".$street[0].
                "&billing.city=".$city[0].
                "&billing.state=".$state[0]. 
                "&billing.country=SA".
                "&billing.postcode=".$postcode[0].
                "&customer.givenName=".$firstname[0].
                "&customer.surname=".$lastname[0].
                "&merchantTransactionId=".$orderid[0] ;


    


}

$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGFjN2E0Yzg3NjUyODliMDAxNzY1ZDVkZjVmYzE1YTh8N2pncEVSM1I4RA=='));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseData = curl_exec($ch);
    if(curl_errno($ch)) {
        return curl_error($ch);
    }
    curl_close($ch);

    preg_match('/(?<=code":").+?(?=")/', $responseData,$code);
    preg_match('/(?<=id":").+?(?=")/', $responseData,$billingid);

$addtoken='UPDATE orders SET token="'.$billingid[0].'",brand="'.$pm[0].'",amount="'.$amount[0].'" where id='.$orderid[0].'';
sql_update($addtoken,$conn);






$paymentcheck='SELECT * from billinginfo where customerid='.$customerid[0];
$count=sql_selectcount($paymentcheck,$conn);

if($count=='0'){
$addinfo='INSERT INTO `billinginfo`(`email`, `street`, `postcode`, `firstname`, `lastname`, `city`, `state`, `customerid`) VALUES ("'.$email[0].'","'.$street[0].'","'.$postcode[0].'","'.$firstname[0].'","'.$lastname[0].'","'.$city[0].'","'.$state[0].'","'.$customerid[0].'")';
sql_insert($addinfo,$conn);
    
}
$updatebilling='UPDATE `billinginfo` set `email`="'.$email[0].'", `street`="'.$street[0].'", `postcode`="'.$postcode[0].'", `firstname`="'.$firstname[0].'", `lastname`="'.$lastname[0].'", `city`="'.$city[0].'", `state`="'.$state[0].'" WHERE `customerid`="'.$customerid[0].'"';
sql_update($updatebilling,$conn);


    if($code[0]!="000.200.100"&&$code[0]!="000.100.110"){
        http_response_code(400);
    }




    return $responseData;

}
echo $responseData = request();

}catch(Exception $e){
    http_response_code(400);
}




}else{
http_response_code(400);



}
?>