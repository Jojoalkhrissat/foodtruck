












<?php
require "../connect.php";
require "../sql.php";   

$startdate=$_GET['startdate'];
$enddate=$_GET['enddate'];

include('includes/header.php');
include('includes/navbar.php');






$dispatch='SELECT O.'.'id, O.customer, O.description, O.orderstart, O.status, C.discount, O.paymentmethod,sum(I.price*OE.count) as pricebeforediscount,sum((I.price*OE.count)-(I.price*OE.count*C.discount)) as price FROM orders O,orderelements OE,items I,coupons C WHERE O.id=OE.ordernumber and OE.item=I.id and O.coupon=C.id and O.status not in("CART","IN DISPATCH","CANCELED") and O.shop="'.$_SESSION['id'].'" and O.orderstart BETWEEN "'.$startdate.'-01-01 00:00" and "'.$enddate.'-12-31 23:59" group by O.id order by orderstart desc';
$getdispatch = $conn->query($dispatch);
$getdispatch->setFetchMode(PDO::FETCH_ASSOC);









?>

<div class="container">
<div class="card shadow mb-4">


<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
 	<tr>
 		<th>id</th>
 		<th>customer</th>
 		<th>description</th>
 		<th>order time</th>
 		<th>status</th>
 		<th>coupon</th>
 		<th>payment</th>
 		<th>Price before discount</th>
 	<th>Total price</th>
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
echo "<td><center><label>".$row['discount']."</label></center></td>";
echo "<td><center><label>".$row['paymentmethod']."</label></center></td>";
echo "<td><center><label>".round($row['pricebeforediscount'],2)."</label></center></td>";
echo "<td><center><label>".round($row['price'], 2)."</label></center></td>";




echo "<td><a class='btn btn-primary' href='orderdetails?ordernumber=".$row['id']."&ref=ordersbydate'><center><label>details</label></center></a></td>";

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