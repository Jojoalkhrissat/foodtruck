<?php
require "connect.php";
require "sql.php";
$categories='SELECT * FROM ads';

echo '[';
$MyJsonData=sql_selectdata($categories,$conn);	



$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
$MyJsonData = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData);
echo $MyJsonData;
echo ']';
?>