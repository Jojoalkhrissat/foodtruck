<?php
require "../connect.php";

  session_start();
$about=$_POST["about"];







$newterms= 'update `aboutus` set  `paragraph`="'.$about.'" where id=1';

$createnewterms= $conn->prepare($newterms);
$createnewterms->execute();



echo '[{"message":"your item was entered"}]';	




















































header('location:'.$baseurl.'/highadmin/aboutus');


?>