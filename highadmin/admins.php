
<?php
require "../connect.php";   

include('includes/header.php');
include('includes/navbar.php');
?>





<div class="container">
    <input type="text" id="myInput" onkeyup="search()" placeholder="Search for names..">
<div class="card shadow mb-4">
	 <div class="card-header py-3">
 <h6 class="m-0 font-weight-bold text-primary"> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       add admin
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
    <th>city</th>
    <th>active</th>
    <th>address</th>
  </tr>
 </thead>
<tbody>
  
<?php

$admins='SELECT * FROM admin';
$getadmins = $conn->query($admins);
$getadmins->setFetchMode(PDO::FETCH_ASSOC);




while($row = $getadmins->fetch()):
echo '<tr>';


    echo '<td>'.  $row['id'] .'</td>';
    echo '<td><img src="../'.$row['photo'].'" style="width:100%;"></td>';
        echo '<td>'.$row['firstname'].'</td>';
        echo '<td>'.$row['lastname'].'</td>';
    echo '<td>'.$row['phonenumber'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['active'].'</td>';
   



if($row['active']==0){

echo "<td><a class='btn btn-primary' href='activateadmin.php?admin=".$row['id']."'>activate user</a></td>";

}elseif($row['active']==1){
echo "<td><a class='btn btn-primary' href='blockadmin.php?admin=".$row['id']."'>block user</a></td>";


}
echo "<td><a class='btn btn-primary' href='admindetails.php?admin=".$row['id']."'>show details</a></td>";
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
      <form action="addadmin.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
<div class="form-group">
                <label> username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label> password </label>
                <input type="password" name="password" class="form-control" placeholder="Enter password " required>
            </div>
            <div class="form-group">
                <label> first name </label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter first name" required>
            </div>
            <div class="form-group">
                <label>last name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter last name" required>
                
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter email" required>
                
            </div>
            <div class="form-group">
                <label>phone number</label>
                <input type="text" name="phonenumber" class="form-control" placeholder="Enter phone number" required>
                
            </div>
             
            <div class="form-group">
                <label>photo</label>
                <input type="file" name="photo" class="form-control" required>
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

