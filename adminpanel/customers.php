
<?php
require 'connect.php';   

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

$shops='SELECT * FROM customers';
$getshops = $conn->query($shops);
$getshops->setFetchMode(PDO::FETCH_ASSOC);




while($row = $getshops->fetch()):
echo '<tr>';


    echo '<td>'.  $row['id'] .'</td>';
    echo '<td><img src="../'.$row['photo'].'" style="width:100%;"></td>';
        echo '<td>'.$row['firstname'].'</td>';
        echo '<td>'.$row['lastname'].'</td>';
    echo '<td>'.$row['phonenumber'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['city'].'</td>';
    echo '<td>'.$row['active'].'</td>';
    echo '<td>'.$row['address'].'</td>';



if($row['active']==0){

echo "<td><a class='btn btn-primary' href='activateuser.php?customerid=".$row['id']."'>activate user</a></td>";

}elseif($row['active']==1){
echo "<td><a class='btn btn-primary' href='blockuser.php?customerid=".$row['id']."'>block user</a></td>";


}
echo "<td><a class='btn btn-primary' href='customerdetails.php?customerid=".$row['id']."'>show details</a></td>";
echo '</tr>';
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

