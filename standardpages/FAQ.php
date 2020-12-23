<?php
require 'connect.php';



?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="FAQ.css">
	<title></title>
</head>
<body>

<ol>
<?php
$questions="SELECT * from faq";
$getquestions = $conn->query($questions);
$getquestions->setFetchMode(PDO::FETCH_ASSOC);
$count=$getquestions->rowCount();


	
while($row = $getquestions->fetch()):


echo '<div class="myquestion">
	<li>'.$row['question'].'</li>
	<p>'.$row['answer'].'</p>
 </div>';


endwhile;

?>
	

</ol>
</body>
</html>