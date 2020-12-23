<?php
require 'connect.php';
require 'sql.php';

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="aboutus.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
</head>
  
  
  

  <div class="about-section">
    <div class="inner-container">
      
      <p class="text">

<?php

$aboutus="SELECT max(id),paragraph FROM aboutus"
$MyJsonData=sql_selectdata($aboutus);
preg_match('/(?<=paragraph":").+?(?=")/', $MyJsonData,$abouttext);
echo $abouttext[0];














?>







</p>
      
      <div class="skills">

       
        
        
      </div>
      
      
     
  </div>
    </div>
      </body>
</html>