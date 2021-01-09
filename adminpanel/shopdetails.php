
<?php
require "../connect.php"; 
$shop=$_GET['shop'];  

include('includes/header.php');
include('includes/navbar.php');
?>





<div class="container">
<div class="card shadow mb-4">

<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
 	<tr>
 		<th>id</th>
 		<th>photo</th>
 		<th>shopname</th>
 		<th>shop name ar</th>
 		<th>first name</th>
      <th>last name</th>
    <th>phone number</th>
    <th>email</th>
    <th>join date</th>
    <th>open time</th>
      <th>close time</th>
    <th>city</th>
    <th>active</th>
    <th>address</th>
    <th>location</th>
 	</tr>
 </thead>
<tbody>
	
<?php

$shops='SELECT * FROM shop where id='.$shop.'';
$getshops = $conn->query($shops);
$getshops->setFetchMode(PDO::FETCH_ASSOC);




while($row = $getshops->fetch()):
echo '<tr>';


		echo '<td>'.  $row['id'] .'</td>';
		echo '<td><img src="../'.$row['photo'].'" style="width:100%;"></td>';
        echo '<td>'.$row['shopname'].'</td>';
        echo '<td>'.$row['shopnamear'].'</td>';
        echo '<td>'.$row['firstname'].'</td>';
        echo '<td>'.$row['lastname'].'</td>';
    echo '<td>'.$row['phonenumber'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['joindate'].'</td>';
    echo '<td>'.$row['opentime'].'</td>';
        echo '<td>'.$row['closetime'].'</td>';
    echo '<td>'.$row['city'].'</td>';
    echo '<td>'.$row['active'].'</td>';
    echo '<td>'.$row['address'].'</td>';
    echo '<td>'.$row['location'].'</td>';


if($row['active']==1){

echo "<td><a class='btn btn-primary' href='blockshop.php?shop=".$row['id']."'>block shop</a></td>";
}elseif ($row['active']==0) {
    echo "<td><a class='btn btn-primary' href='activateshop.php?shop=".$row['id']."'>activate shop</a></td>";
echo "<td><a class='btn btn-primary' href='shopsales.php?shopid=".$row['id']."'>shop sales</a></td>";
}
echo '</tr>';
endwhile;
	?>
    
</tbody>


</table>
</div>
</div>
</div>
</div>



</div>
</div>










<?php   

include('includes/scripts.php');
include('includes/footer.php');

?>

