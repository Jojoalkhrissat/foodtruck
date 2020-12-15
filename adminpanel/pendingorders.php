<?php
require 'connect.php';
require 'sql.php';   
session_start();
if(isset($_SESSION['id'])){
include('includes/header.php');
include('includes/navbar.php');






$dispatch='SELECT * FROM orders WHERE status="IN DISPATCH" and shop="'.$_SESSION['id'].'" order by orderstart desc';
$getdispatch = $conn->query($dispatch);
$getdispatch->setFetchMode(PDO::FETCH_ASSOC);








}else{




}
?>

<div class="container">
<div class="card shadow mb-4">

 <div class="card-header py-3">
 <h6 class="m-0 font-weight-bold text-primary"> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       edit item details 
</button>
</h6>

</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
 	<tr>
 		<th>id</th>
 		<th>customer</th>
 		<th>description</th>
 		<th>order start</th>
 		<th>status</th>
 		<th>coupon</th>
 		<th>payment</th>
 		
 	
 	</tr>
 </thead>
 <tbody>
  <?php
while($row = $getdispatch->fetch()):

	echo '<tr>';
		
echo "<td><center><label>".$row['id']."</label></center></td>";
echo "<td><center><label>".$row['customer']."</label></center></td>";
echo "<td><center><label>".$row['description']."</label></center></td>";
echo "<td><center><label>".$row['orderstart']."</label></center></td>";
echo "<td><center><label>".$row['status']."</label></center></td>";
echo "<td><center><label>".$row['coupon']."</label></center></td>";
echo "<td><center><label>".$row['paymentmethod']."</label></center></td>";


echo "<td><a class='btn btn-primary' href='orderdetails?ordernumber=".$row['id']."'><center><label>details</label></center></a></td>";
echo "<td><a class='btn btn-primary' href='rejectorder?ordernumber=".$row['id']."'><center><label>reject</label></center></a></td>";
echo "<td><a class='btn btn-primary' href='acceptorder?ordernumber=".$row['id']."'><center><label>accept</label></center></a></td>";
echo	'</tr>';

endwhile;
?>
</tbody>
</table>
</div>
</div>
</div>



</div>








</div></div>














<?php   
include('includes/scripts.php');
include('includes/footer.php');







   ?>

