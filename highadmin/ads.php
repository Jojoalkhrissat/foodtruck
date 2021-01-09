
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
       add ad
</button>
</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
  <tr>
    <th>id</th>
    <th>ad title</th>
    <th>ad title arab</th>
      <th>photo</th>
    <th>hyper link</th>
    
  </tr>
 </thead>
<tbody>
  
<?php

$ads='SELECT * FROM ads';
$getads = $conn->query($ads);
$getads->setFetchMode(PDO::FETCH_ASSOC);




while($row = $getads->fetch()):
echo '<tr>';


    echo '<td>'.  $row['id'] .'</td>';
    
        echo '<td>'.$row['adtitle'].'</td>';
        echo '<td>'.$row['adtitlear'].'</td>';




    echo '<td><center><img id="'.$row['id'].'" src="../'.$row['photo'].'" style="width:100%;" ></center></td>';


    echo '<td>'.$row['link'].'</td>';
    
   





echo "<td><a class='btn btn-primary' href='deletead.php?ad=".$row['id']."'>delete ad</a></td>";

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
      <form action="addad.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
<div class="form-group">
                <label> ad title </label>
                <input type="text" name="adtitle" class="form-control" placeholder="Enter ad title" required>
            </div>
            <div class="form-group">
                <label> ad title arabic </label>
                <input type="text" name="adtitlear" class="form-control" placeholder="Enter ad title ar " required>
            </div>
            <div class="form-group">
                <label> link </label>
                <input type="text" name="link" class="form-control" placeholder="Enter link" required>
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
</div></div>
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
    td_1 = tr[i].getElementsByTagName("td")[1];
    //Column 2
    td_2 = tr[i].getElementsByTagName("td")[2];
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

