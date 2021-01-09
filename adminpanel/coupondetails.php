
<?php
require "../connect.php";
require "../sql.php";
$id=$_GET['coupon'];   

include('includes/header.php');
include('includes/navbar.php');
?>





<div class="container">
    <input type="text" id="myInput" onkeyup="search()" placeholder="Search for names..">
<div class="card shadow mb-4">
	 <div class="card-header py-3">
 <h6 class="m-0 font-weight-bold text-primary"> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       edit coupon
</button>
</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>code</th>
      <th>discount</th>
    <th>shop</th>
    <th>start date</th>
    <th>end date</th>
   
  </tr>
 </thead>
<tbody>
  
<?php

$coupon='SELECT * FROM coupons where id='.$id.'';
$getcoupon = $conn->query($coupon);
$getcoupon->setFetchMode(PDO::FETCH_ASSOC);




while($row = $getcoupon->fetch()):
echo '<tr>';
$_SESSION['coupon']=$row['id'];
$_SESSION['couponname_'.$row['id']]=$row['couponname'];
$_SESSION['couponcode_'.$row['id']]=$row['couponcode'];
$_SESSION['validdatestart_'.$row['id']]=$row['validdatestart'];
$_SESSION['validdateend_'.$row['id']]=$row['validdateend'];
$_SESSION['coupon']=$row['id'];
$discount=$row['discount']*100;

    echo '<td>'.  $row['id'] .'</td>';
        echo '<td>'.$row['couponname'].'</td>';
        echo '<td>'.$row['couponcode'].'</td>';
    echo '<td>'.$discount.'%</td>';
    echo '<td>'.$row['shop'].'</td>';
    echo '<td>'.$row['validdatestart'].'</td>';
    echo '<td>'.$row['validdateend'].'</td>';
   

echo '</tr>';
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
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addcoupon.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
<div class="form-group">
                <label> coupon name </label>
                <input type="text" name="couponname" class="form-control" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label> discount </label>
                <input type="number" min="1" max="100" name="discount" class="form-control" placeholder="Enter discount name" required>
            </div>
            <div class="form-group">
                <label>shop</label>

<select name="shop" class="form-control">
	<?php

$shops='SELECT * FROM shop';
$getshops = $conn->query($shops);
$getshops->setFetchMode(PDO::FETCH_ASSOC);




while($row = $getshops->fetch()):

echo "<option value='".$row['id']."''>".$row['shopname']."</option>";






endwhile;

	?>






</select>



               
                
            </div>
            <div class="form-group">
                <label>start date</label>
                <input type="date" name="validdatestart" class="form-control" required>
                
            </div>
            <div class="form-group">
                <label>end date</label>
                <input type="date" name="validdateend" class="form-control" required>
                
            </div>
             
        
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


 </div>
</div>



<script>
function search() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    //Column 1
    td_1 = tr[i].getElementsByTagName("td")[2];
    //Column 2
    td_2 = tr[i].getElementsByTagName("td")[3];
    if (td_1 || td_2) {
      if (td_1.innerHTML.toUpperCase().indexOf(filter) > -1 || td_2.innerHTML.toUpperCase().indexOf(filter)> -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>








<?php   

include('includes/scripts.php');
include('includes/footer.php');

?>

