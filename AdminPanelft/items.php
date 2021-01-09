

<?php   
require "../connect.php";
include('includes/header.php');
include('includes/navbar.php');


$shop=$_SESSION['id'];

$itemspershop='SELECT I'.'.id, I.itemname,I.itemnamear,I.description,I.descriptionar,I.preparetime,I.timesamples,I.quantity,I.shop,S.shopname,S.shopnamear, I.photo,I.photo1,I.photo2, I.price, I.timesold,avg(F.Rating) as rating,count(F.Rating) as ratingnumber FROM items I left join favorites MF on MF.itemid=I.id left join feedback F on I.id=F.itemid left join shop S on I.shop=S.id WHERE I.shop='.$shop.' GROUP By I.id';
$getitemspershop = $conn->query($itemspershop);
$getitemspershop->setFetchMode(PDO::FETCH_ASSOC);


?>





<div class="container">

<div class="card shadow mb-4">
	 <div class="card-header py-3">
 <h6 class="m-0 font-weight-bold text-primary"> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       add items
</button>
</h6>
</div>
<div class="card-header py-3">
 
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
 	<tr>
 		<th>name</th>
 		<th>photo</th>
 	
 	</tr>
 </thead>
 <tbody>
  <?php
while($row = $getitemspershop->fetch()):


	echo '<tr>';
		

echo "<td><center><a href=itemdetails?item=".$row['id']."><label>".$row['itemname']."</label></a></center></td>";
echo "<td><center><a href=itemdetails?item=".$row['id']."><img id='".$row['id']."' src='../".$row['photo']."' style='width:50%;'></a></center></td>";




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
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="additem.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> name </label>
                <input type="text" name="itemname" class="form-control" placeholder="Enter item name" required>
            </div>
            <div class="form-group">
                <label>name ar</label>
                <input type="text" name="itemnamear" class="form-control" placeholder="Enter item name ar" required>
                
            </div>
            <div class="form-group">
                <label>description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter description" required>
                
            </div>
            <div class="form-group">
                <label>description ar</label>
                <input type="text" name="descriptionar" class="form-control" placeholder="Enter description ar" required>
                
            </div>
             <div class="form-group">
                <label>quantity</label>
                <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" required>
                
            </div>
             <div class="form-group">
                <label>price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter price" required>
                
            </div>
             <div class="form-group">
                <label>prepare time</label>
                <input type="text" name="preparetime" class="form-control" placeholder="Enter prepare time in minutes" required>
                
            </div>
            <div class="form-group">
                <label>the time gets added on each item?</label>
                <select name="timesamples" class="form-control" required>
                	<option value="0">
                		yes
                	</option>
                	<option value="1">
                		no
                	</option>
                </select>
                
            </div>
            <div class="form-group">
                <label>sub-category</label>

                <select name="subcategory" class="form-control"> 
                	 <?php 
$categories='SELECT * FROM subcategory where shop='.$shop.'';

$getcategories = $conn->query($categories);
$getcategories->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getcategories->fetch()):
	echo "<option value='".$row['id']."'>".$row['subcatname']."</option>";
	endwhile;
                ?>
       
                </select>
            </div>
            <div class="form-group">
                <label>item main photo</label>
                <input type="file" name="photo" class="form-control" required>
            </div>
 <div class="form-group">
                <label>item second photo</label>
                <input type="file" name="photo1" class="form-control">
            </div>
             <div class="form-group">
                <label>item third photo</label>
                <input type="file" name="photo2" class="form-control">
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










<?php   

include('includes/scripts.php');
include('includes/footer.php');

?>

