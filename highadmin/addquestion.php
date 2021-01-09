<?php
require "../connect.php";
require "../sql.php";

  session_start();
$question=$_POST['question'];
$answer=$_POST['answer'];








$insertquestion= 'INSERT INTO `faq`(`question`, `answer`) VALUES ("'.$question.'", "'.$answer.'")';

sql_insert($insertquestion,$conn);


echo '[{"message":"your item was entered"}]';	
























































header('location:'.$baseurl.'/highadmin/faq');


?>