
<?php   
require "connect.php";
$cat=$_GET['category'];
include('includes/header.php');
include('includes/navbar.php');


$id=$_SESSION['id'];

$subcategories='SELECT * FROM category where id='.$cat.'';

$getsubcategories = $conn->query($subcategories);
$getsubcategories->setFetchMode(PDO::FETCH_ASSOC);
?>





<div class="container">
<div class="card shadow mb-4">

 <div class="card-header py-3">
 <h6 class="m-0 font-weight-bold text-primary"> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       edit category
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
    <th>name ar</th>
 		<th>photo</th>
 	
 	</tr>
 </thead>
 <tbody>
  <?php
while($row = $getsubcategories->fetch()):
$_SESSION['category']=$row['id'];
$_SESSION['catname_'.$row['id']]=$row['catname'];
$_SESSION['catnamear_'.$row['id']]=$row['catnamear'];
$_SESSION['photo_'.$row['id']]=$row['photo'];
	echo '<tr>';
		
echo "<td><center><label>".$row['id']."</label></center></td>";
echo "<td><center><label>".$row['catname']."</label></center></td>";
echo "<td><center><label>".$row['catnamear']."</label></center></td>";
echo "<td><center><img id='".$row['id']."' src='../".$row['photo']."' style='width:30%;'></center></td>";




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
      <form action="editcategory.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> name </label>
                <input type="text" name="catname" class="form-control" placeholder="Enter category name">
            </div>
            <div class="form-group">
                <label>name ar</label>
                <input type="text" name="catnamear" class="form-control" placeholder="Enter category name ar">
                
            </div>
            
           
            <div class="form-group">
                <label>category photo</label>
                <input type="file" name="photo" class="form-control">
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









<?php   

include('includes/scripts.php');
include('includes/footer.php');

?>

