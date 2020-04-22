<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MFI - STAFF LOGIN</title>
  <script type="text/css">
    body{
      background-image: 'im'
    }
  </script>

  <!-- Bootstrap styles for this project-->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-danger">
 <div class="container p-5">
   <div class="row justify-content-center">
   <div class="col-xl-5 col-lg-5 col-md-4">
   <div class="card card-body p-5" style="border-radius: 50px; opacity: 80%">
     <center>
       <img src="../images/ucclogo.jpg" height="100" width="100">
     </center>
     <h4 class="text-center text-danger">Mystic Falls International</h4>
     <h5 class="text-center text-danger">Staff Login</h5>
     <hr>
     <form class="user" action="login.php" method="POST">
       <div class="form-group">
         <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required="">
       </div>
       <div class="form-group">
         <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required="">
       </div>
       <input type="submit" name="Login" class="btn btn-danger btn-user btn-block" value="Login">
       <hr>
       <a href="#" class="text-center text-waning">Forgot Password</a>
     </form>
   </div>
 </div>
 </div>
 </div>


  <!-- Bootstrap core JavaScript-->
  <script src="../bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="..//js/bootstrap.min.js"></script>

</body>



<!-- style="background-image: url('images/students.jpg'); background-repeat: no-repeat; background-size: cover; " -->
</html>
