<?php
require "../connect.php";
require "../sql.php";

session_start();
$shop= $_SESSION["id"];
$category=$_GET['category'];
$deletecat='DELETE FROM category where id="'.$category.'"';
sql_delete($deletecat,$conn);

header('location:'.$baseurl.'/highadmin/categories')

?>