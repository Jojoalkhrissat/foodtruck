<?php

$url = 'http://www.mapquestapi.com/geocoding/v1/reverse?key=lI3pta3b3Si2yoUgQyaq0KNyTU1TuvAA&location=31.970341,35.877364';

//Use file_get_contents to GET the URL in question.





$contents = file_get_contents($url);

//If $contents is not a boolean FALSE value.
if($contents !== false){
    //Print out the contents.
    preg_match('/(?<=street":").+?(?=")/',$contents,$street); 
    echo $street[0];

}






?>