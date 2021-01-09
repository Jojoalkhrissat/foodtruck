<?php


function get_payment_status(){
    require 'connect.php';
    require 'sql.php';
	$post = file_get_contents("php://input");
    preg_match('/(?<=orderid":").+?(?=")/',$post,$orderid);
	preg_match('/(?<=checkoutid":").+?(?=")/',$post,$checkoutId);
	preg_match('/(?<=brand":").+?(?=")/',$post,$brand);






	if($brand[0]=='VISA'||$brand[0]=='MASTER'){
            $url = "https://test.oppwa.com/v1/checkouts/$checkoutId[0]/payment";
            $url .= "?entityId=8ac7a4c8765289b001765d5ee2fc15ac";
}elseif ($brand[0]=='MADA') {
 $url = "https://test.oppwa.com/v1/checkouts/$checkoutId[0]/payment";
            $url .= "?entityId=8ac7a4c8765289b001765d601d8a15b1";
}
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                           'Authorization:Bearer OGFjN2E0Yzg3NjUyODliMDAxNzY1ZDVkZjVmYzE1YTh8N2pncEVSM1I4RA=='));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
        preg_match('/(?<=code":").+?(?=")/',$responseData,$code);
        preg_match('/(?<=id":").+?(?=")/',$responseData,$refid);
        $updateref="UPDATE orders set refid='".$refid[0]."' WHERE id='".$orderid[0]."'";
sql_update($updateref,$conn);
if($code[0]!='000.200.000'){
http_response_code(403);
}



            return $responseData;
        


        }

echo $responseData=get_payment_status();

?>