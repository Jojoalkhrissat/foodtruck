
<?php
require "../connect.php";   

include('includes/header.php');
include('includes/navbar.php');
?>





<div class="container">
    <input type="text" id="myInput" onkeyup="search()" placeholder="Search for names..">
<div class="card shadow mb-4">

<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
 	<tr>
 		<th>id</th>
 		<th>review number</th>
 		<th>reported customer</th>
 		<th>reported customer first name</th>
 		<th>reported customer last name</th>
      <th>report comment</th>
    <th>reporter</th>
 	</tr>
 </thead>
<tbody>
	
<?php

$reports='SELECT R.'.'id, R.reviewid,F.customer,C.firstname,C.lastname, R.comment, R.customerid FROM reportreview R, feedback F,customers C where C.id=F.customer and R.reviewid=F.id';
$getreports = $conn->query($reports);
$getreports->setFetchMode(PDO::FETCH_ASSOC);




while($row = $getreports->fetch()):
echo '<tr>';


		echo '<td>'.  $row['id'] .'</td>';
        echo '<td><a href="reviewdetails?review='.$row['reviewid'].'">'.$row['reviewid'].'</td>';
        echo '<td><a href="customerdetails?customerid='.$row['customer'].'">'.$row['customer'].'</a></td>';
        echo '<td>'.$row['firstname'].'</td>';
        echo '<td>'.$row['lastname'].'</td>';
    echo '<td>'.$row['comment'].'</td>';
    echo '<td><a href="customerdetails?customerid='.$row['customerid'].'">'.$row['customerid'].'</a></td>';
    


endwhile;
	?>
    
</tbody>


</table>
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
    td_1 = tr[i].getElementsByTagName("td")[3];
    //Column 2
    td_2 = tr[i].getElementsByTagName("td")[4];
    //Column 3
    td_3 = tr[i].getElementsByTagName("td")[5];
    if (td_1 || td_2|| td_3) {
      if (td_1.innerHTML.toUpperCase().indexOf(filter) > -1 || td_2.innerHTML.toUpperCase().indexOf(filter)> -1|| td_3.innerHTML.toUpperCase().indexOf(filter)> -1) {
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

