<?php
require "../connect.php";




function sql_selectdata($query,$conn){
$statement = $conn->query($query);
$statement->setFetchMode(PDO::FETCH_ASSOC);
$rows="";
while($row = $statement->fetch()):
$rows=$rows.','.json_encode($row, JSON_UNESCAPED_UNICODE);
endwhile;	
return $rows;
}

function sql_selectcount($query,$conn){
$statement = $conn->query($query);
$statement->setFetchMode(PDO::FETCH_ASSOC);
return $statement->rowCount();
}






function sql_insert($query,$conn){
$statement= $conn->prepare($query);
$statement->execute();
}




function sql_update($query,$conn){
$statement= $conn->prepare($query);
$statement->execute();
}




function sql_delete($query,$conn){
$statement= $conn->prepare($query);
$statement->execute();
}

















?>