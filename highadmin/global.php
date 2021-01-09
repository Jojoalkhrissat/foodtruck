
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

<div class="card-body">
<div class="table-responsive">
<form action="pushnotificationglobal" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label>title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label>arabic title</label>
                <input type="text" name="titlear" class="form-control" placeholder="Enter arabic title">
            </div>
<div class="form-group">
                <label>message</label>
                <input type="text" name="body" class="form-control" placeholder="Enter your message">
            </div>

             <div class="form-group">
                <label>arabic message</label>
                <input type="text" name="bodyar" class="form-control" placeholder="Enter your arabic message">
                
            </div>
            
        </div>

        <div class="modal-footer">
            <button type="submit" name="registerbtn" class="btn btn-primary">send</button>
        </div>
      </form>
</div>
</div>
</div>
</div></div>
</div>














<?php   

include('includes/scripts.php');
include('includes/footer.php');

?>

