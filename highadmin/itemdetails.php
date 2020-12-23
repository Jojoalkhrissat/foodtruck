
<?php   
require "connect.php";
session_start();


$itemid=isset($_GET['item'])&&$_GET['item']!=''?$_GET['item']:$_SESSION['item'];

$itemdetails="SELECT I".".id, I.itemname,I.itemnamear,'' as isfavorite,I.description,I.descriptionar,I.subcategory,I.preparetime,I.timesamples,I.quantity,I.shop,S.shopname,S.shopnamear, I.photo,I.photo1,I.photo2, I.price, I.timesold,avg(F.Rating) as rating,count(F.Rating) as ratingnumber FROM items I left join favorites MF on MF.itemid=I.id left join feedback F on I.id=F.itemid left join shop S on I.shop=S.id WHERE I.id=".$itemid." GROUP By I.id";
$getitemdetails = $conn->query($itemdetails);
$getitemdetails->setFetchMode(PDO::FETCH_ASSOC);


include('includes/header.php');
include('includes/navbar.php');
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
 		<th>item name</th>
 		<th>item name ar</th>
 		<th>description</th>
 		<th>description ar</th>
 		<th>prepare time</th>
 		<th>time samples</th>
 		<th>quantity</th>
 		<th>photo 1</th>
 		<th>photo 2</th>
 		<th>photo 3</th>
 		<th>price</th>
 		<th>times sold</th>
 		<th>rating</th>
 		<th>rating number</th>
 		
 	
 	</tr>
 </thead>
 <tbody>
  <?php
while($row = $getitemdetails->fetch()):
$_SESSION['item']=$row['id'];
$_SESSION['id_'.$row['id']]=$row['id'];
$_SESSION['itemname_'.$row['id']]=$row['itemname'];
$_SESSION['itemnamear_'.$row['id']]=$row['itemnamear'];
$_SESSION['description_'.$row['id']]=$row['description'];
$_SESSION['descriptionar_'.$row['id']]=$row['descriptionar'];
$_SESSION['price_'.$row['id']]=$row['price'];
$_SESSION['quantity_'.$row['id']]=$row['quantity'];
$_SESSION['preparetime_'.$row['id']]=$row['preparetime'];
$_SESSION['timesamples_'.$row['id']]=$row['timesamples'];
$_SESSION['subcategories_'.$row['id']]=$row['subcategory'];
	echo '<tr>';
		
echo "<td><center><label>".$row['id']."</label></center></td>";
echo "<td><center><label>".$row['itemname']."</label></center></td>";
echo "<td><center><label>".$row['itemnamear']."</label></center></td>";
echo "<td><center><label>".$row['description']."</label></center></td>";
echo "<td><center><label>".$row['descriptionar']."</label></center></td>";
echo "<td><center><label>".$row['preparetime']."</label></center></td>";
echo "<td><center><label>".$row['timesamples']."</label></center></td>";
echo "<td><center><label>".$row['quantity']."</label></center></td>";
echo "<td><img id='".$row['id']."' src='../".$row['photo']."' style='width:100%;'></td>";
echo "<td><img id='".$row['id']."' src='../".$row['photo1']."' style='width:100%;'></td>";
echo "<td><img id='".$row['id']."' src='../".$row['photo2']."' style='width:100%;'></td>";
echo "<td><center><label>".$row['price']."</label></center></td>";

echo "<td><center><label>".$row['timesold']."</label></center></td>";
echo "<td><center><label>".$row['rating']."</label></center></td>";
echo "<td><center><label>".$row['ratingnumber']."</label></center></td>";


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
      <form action="edititem.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> name </label>
                <input type="text" name="itemname" class="form-control" placeholder="Enter item name" >
            </div>
            <div class="form-group">
                <label>name ar</label>
                <input type="text" name="itemnamear" class="form-control" placeholder="Enter item name ar" >
                
            </div>
            <div class="form-group">
                <label>description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter description" >
                
            </div>
            <div class="form-group">
                <label>description ar</label>
                <input type="text" name="descriptionar" class="form-control" placeholder="Enter description ar" >
                
            </div>
             <div class="form-group">
                <label>quantity</label>
                <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" >
                
            </div>
             <div class="form-group">
                <label>price</label>
                <input type="number" name="price" step="0.05" class="form-control" placeholder="Enter price" >
                
            </div>
             <div class="form-group">
                <label>prepare time</label>
                <input type="text" name="preparetime" class="form-control" placeholder="Enter prepare time in minutes" >
                
            </div>
            <div class="form-group">
                <label>the time gets added on each item?</label>
                <select name="timesamples" class="form-control" >
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
$categories='SELECT * FROM subcategory where shop='.$_SESSION['id'].'';

$getcategories = $conn->query($categories);
$getcategories->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getcategories->fetch()):


if($row['id']==$_SESSION['subcategories_'.$_SESSION['item']]){

	echo "<option value='".$row['id']."' selected='selected'>".$row['subcatname']."</option>";
	}else{
		echo "<option value='".$row['id']."'>".$row['subcatname']."</option>";
	}



	endwhile;
                ?>
       
                </select>
            </div>
            <div class="form-group">
                <label>item main photo</label>
                <input type="file" name="photo" class="form-control" >
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







</div></div>





<?php   

include('includes/scripts.php');
include('includes/footer.php');

?>

