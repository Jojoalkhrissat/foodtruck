<?php
require 'connect.php';
require 'sql.php';   
include('includes/header.php');
include('includes/navbar.php');

$ordernumber=$_GET['ordernumber'];




$dispatch='SELECT OE'.'.item,I.itemname,I.itemnamear,I.photo,OE.count FROM orderelements OE,items I WHERE I.id=OE.item and ordernumber="'.$ordernumber.'"';
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
 		<th>item name</th>
 		<th>item name ar</th>
 		<th>photo</th>
 		<th>count</th>
 	
 		
 	
 	</tr>
 </thead>
 <tbody>
  <?php
while($row = $getdispatch->fetch()):

	echo '<tr>';
		
echo "<td><center><label>".$row['item']."</label></center></td>";
echo "<td><center><label>".$row['itemname']."</label></center></td>";
echo "<td><center><label>".$row['itemnamear']."</label></center></td>";
echo "<td><center><img style='width:50%;' src=../".$row['photo']."></label></center></td>";
echo "<td><center><label>".$row['count']."</label></center></td>";

echo	'</tr>';

endwhile;
?>
</tbody>
</table>
</div>
</div>
</div>



</div>



<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      


        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">Close</button>
            <a class="btn btn-primary" href="rejectorder?ordernumber=<?php echo $ordernumber;?>">reject</a>
           <a class="btn btn-primary" href="acceptorder?ordernumber=<?php echo $ordernumber;?>"> accept</a>
        </div>
     

    </div>
  </div>
</div>





</div></div>














<?php   
include('includes/scripts.php');
include('includes/footer.php');







   ?>

