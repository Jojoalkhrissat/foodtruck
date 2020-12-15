
<?php   
require "connect.php";
session_start();


$id=$_SESSION['id'];

$subcategories='SELECT * FROM subcategory where shop='.$id.'';

$getsubcategories = $conn->query($subcategories);
$getsubcategories->setFetchMode(PDO::FETCH_ASSOC);
include('includes/header.php');
include('includes/navbar.php');
?>





<div class="container">
<div class="card shadow mb-4">

 <div class="card-header py-3">
 <h6 class="m-0 font-weight-bold text-primary"> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       add sub category
</button>
</h6>
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
while($row = $getsubcategories->fetch()):


	echo '<tr>';
		

echo "<td><center><a href=/foodtruck/adminpanel/itemspersubcat?subcat=".$row['id']."><label>".$row['subcatname']."</label></a></center></td>";
echo "<td><center><a href=/foodtruck/adminpanel/itemspersubcat?subcat=".$row['id']."><img id='".$row['id']."' src='../".$row['photo']."' style='width:50%;'></a></center></td>";




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
      <form action="addsubcat.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> name </label>
                <input type="text" name="subcatname" class="form-control" placeholder="Enter subcategory name">
            </div>
            <div class="form-group">
                <label>name ar</label>
                <input type="text" name="subcatnamear" class="form-control" placeholder="Enter subcategory name ar">
                
            </div>
            <div class="form-group">
                <label>category</label>

                <select name="category" class="form-control"> 
                	 <?php 
$categories='SELECT * FROM category';

$getcategories = $conn->query($categories);
$getcategories->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getcategories->fetch()):
	echo "<option value='".$row['id']."'>".$row['catname']."</option>";
	endwhile;
                ?>
       
                </select>
            </div>
            <div class="form-group">
                <label>sub category photo</label>
                <input type="file" name="subcatimage" class="form-control">
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

