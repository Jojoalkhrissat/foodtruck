<?php
require "connect.php";
session_start();
$id=$_SESSION['id'];

$subcategories='SELECT * FROM subcategory where shop='.$id.'';

$getsubcategories = $conn->query($subcategories);
$getsubcategories->setFetchMode(PDO::FETCH_ASSOC);








































?>
<!DOCTYPE html>
<html>
<head>
	<title>subcategories</title>
	<link rel="stylesheet" type="text/css" href="subcategories.css">
</head>
<body>
<?php
require "navbar.html";
?>

<?php
while($row = $getsubcategories->fetch()):
	
echo "<div class='container'>";
echo "<a href=/foodtruck/adminpanelft/login/itemspersubcat?subcat=".$row['id'].">";

echo "<div class='img'><img id='".$row['id']."' src='../../".$row['photo']."'>";
echo "<label class='abc'>".$row['subcatname']."</label>";
echo "</div>";
echo "</a>";
echo "</div>";

endwhile;
?>
</body>
</html>


