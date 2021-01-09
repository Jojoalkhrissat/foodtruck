<?php
require "../connect.php";

  session_start();
$termsandconditions=$_POST["termsandconditions"];







$newterms= 'update `termsandconditions` set  `text`="'.$termsandconditions.'" where id=1';

$createnewterms= $conn->prepare($newterms);
$createnewterms->execute();



echo '[{"message":"your item was entered"}]';	




















































header('location:'.$baseurl.'/highadmin/termsandconditions');


?>