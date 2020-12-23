
<?php   

include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="editprofile.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label>first name</label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label>last name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter your last name">
            </div>
<div class="form-group">
                <label>phone number</label>
                <input type="text" name="phonenumber" class="form-control" placeholder="Enter your phone number">
            </div>

             <div class="form-group">
                <label>photo</label>
                <input type="file" name="shopphoto" class="form-control">
                
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



<div class="container">
<div class="card shadow mb-4">
<div class="card-header py-3">
 <h6 class="m-0 font-weight-bold text-primary"> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       edit profile Profile 
</button>
</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
 	<tr>
 		<th>id</th>
 		<th>photo</th>
 		<th>first name</th>
      <th>last name</th>
    <th>phone number</th>
    <th>email</th>
    
 	</tr>
 </thead>
<tbody>
	<tr>
		<td><?php echo $_SESSION['id'];?></td>
		<td> <center><?php echo '<img src="../'.$_SESSION['photo'].'" style="width:50%;">';?></center></td>
		<td><?php echo $_SESSION['firstname'];?></td>
        <td><?php echo $_SESSION['lastname'];?></td>
    <td><?php echo $_SESSION['phonenumber'];?></td>
    <td><?php echo $_SESSION['email'];?></td>
    
	</tr>
</tbody>


</table>
</div>
</div>
</div>
</div></div>
</div>














<?php   

include('includes/scripts.php');
include('includes/footer.php');

?>

