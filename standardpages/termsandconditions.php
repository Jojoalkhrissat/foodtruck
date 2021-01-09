<?php
require 'connect.php';
require 'sql.php';

















?>

<!DOCTYPE html>
<html lang='ar' dir="rtl">
<head>
	<title>Terms & conditions</title>
	<link rel="stylesheet" type="text/css" href="termsandconditions.css">
</head>
<body>
	
<p class="termstext"><pre>
<?php

$termsandconditions="SELECT max(id),text FROM termsandconditions"
$MyJsonData=sql_selectdata($termsandconditions);
preg_match('/(?<=text":").+?(?=")/', $MyJsonData,$terms);
echo $terms[0];














?>
</pre>
</p>
</body>
</html>