
<?php
require 'connect.php';   

include('includes/header.php');
include('includes/navbar.php');
?>





<div class="container">
    
<div class="card shadow mb-4">
<div class="card-header py-3">
 <h6 class="m-0 font-weight-bold text-primary"> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       edit about us
</button>
</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
 	<tr>
 		
    <th>text</th>
 	</tr>
 </thead>
<tbody>
	
<?php

$terms='SELECT * from aboutus';
$getterms = $conn->query($terms);
$getterms->setFetchMode(PDO::FETCH_ASSOC);




while($row = $getterms->fetch()):
echo '<tr>';
$tac=$row['paragraph'];

		echo '<td>'.  $row['paragraph'] .'</td>';
    
echo '</tr>';

endwhile;
	?>
    
</tbody>


</table>
</div>
</div>
</div></div>

</div></div>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="editaboutus.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
<div class="form-group">
                <label> about us </label>
                <textarea type="text" name="about" style="height:600px; " class="form-control" placeholder="Enter terms and conditions" required> <?php echo $tac;?> </textarea>
            </div>
            
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">exit</button>
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

