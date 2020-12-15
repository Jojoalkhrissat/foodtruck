<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Foodtrucker - Register</title>

    <!-- Custom fonts for this template-->
    <link href="css/style.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="register.php" enctype="multipart/form-data" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="firstname" name="firstname"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lastname" name="lastname"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                	<div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address" required>

                                </div>
											<div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="phonenumber"
                                        name="phonenumber" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="username" name="username" placeholder="User Name" required>
                                    </div>
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password" required>
                                    </div>
                                  

                                </div>

                                 <div class="form-group row">
                                     <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="shopname" name="shopname" placeholder="Shop Name" required>
                                    </div>

                                       <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="shopnamear" name="shopnamear" placeholder="Shop Name AR" required>
                                    </div>
                                    
                                </div>
                                 <div class="form-group row">
                                    

                                       <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="city" name="city" placeholder="city" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="address" name="address" placeholder="address" required>
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-6">

                                     	<center>
                                        <label>open time</label></center>
                                    </div>
  										<div class="col-sm-6">
                                        <input type="time" class="form-control form-control-user"
                                            id="opentime" name="opentime" placeholder="Open Time" required>
                                    </div>
                                       
                                    
                                </div>
                                 <div class="form-group row">
                                   <div class="col-sm-6">
                                       	<center>
                                        <label>close time</label></center>
                                    </div>

                                       <div class="col-sm-6">
                                        <input type="time" class="form-control form-control-user"
                                            id="closetime" name="closetime" placeholder="Close Time" required>
                                    </div>
                                    
                                </div>
                                 <div class="form-group row">
                                 	<div class="col-sm-6">
                                        <center><label>photo</label></center>
                                                                            </div>
                                      <div class="col-sm-6">
                                        <input type="file" class="form-control form-control-user file-upload"
                                            id="photo" name="shopphoto" required=>
                                    </div>

                                       
                                     <div class="col-sm-12">
                                    <hr>
                                     <input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
                                    
                         
                            </div>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>