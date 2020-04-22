<?php 

require '../dbConnection/connect.inc.php';

if( isset($_POST['username']) && 
  isset($_POST['password']) && 
  isset($_POST['confirm_password']) && 
  isset($_POST['firstname']) && 
  isset($_POST['lastname']) &&
  isset($_POST['subject']) &&
  isset($_POST['class']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $password_hash = md5($password);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $subject = $_POST['subject'];
  $class = $_POST['class'];

	if(!empty($username) && !empty($password) && !empty($confirm_password) && !empty($firstname) && !empty($lastname))
	{
		if(strlen($username) > 30 || strlen($firstname) >15 || strlen($lastname) > 15)
		{
			echo "<script language='javascript' type='text/javascript'>
				alert('Please ahear to maximum length of fields.');
				</script>";
		}
		else
		{
			if($password != $confirm_password)
		{
			//echo 'Password do not match.';
			echo "<script language='javascript' type='text/javascript'>
				alert('Password do not match.);
				</script>";
		}
		else
		{
			$query = "SELECT `username` FROM `sba_users` WHERE `username` = '$username'";
			$query_run = mysqli_query($connection, $query);
			if(mysqli_num_rows($query_run) == 1)
			{
				//echo 'The Username '.$username.' already exists.';
				echo "<script language='javascript' type='text/javascript'>
							alert('The Username already exists.');
							</script>";
			}
			else
			{
				$query = "INSERT INTO `sba_users` VALUES('', '".mysqli_real_escape_string($connection, $username)."', '".mysqli_real_escape_string($connection, $password_hash)."', '".mysqli_real_escape_string($connection, $firstname)."', '".mysqli_real_escape_string($connection, $lastname)."', '".mysqli_real_escape_string($connection, $subject)."' , '".mysqli_real_escape_string($connection, $class)."')";

				if($query_run = mysqli_query($connection, $query))
				{
					echo "<script language='javascript' type='text/javascript'>
							alert('$firstname $lastname has been Registered successfully');
							</script>";
				}
				else
				{
					//echo 'Registration Failed. Try again later.';
					echo "<script language='javascript' type='text/javascript'>
							alert('Registration Failed. Try again later.');
							</script>";
				}
			}
		}
		}
	}
	else
	{
		//echo 'All fields are required.';
		echo "<script language='javascript' type='text/javascript'>
							alert('All fields are required.');
							</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Portal - Register SBA User</title>

  <!-- Custom fonts for this template-->
  <link href="../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
<!--   <link rel="stylesheet" type="text/css" href="css/registerAdmin.css">
 -->
</head>

<body class="bg-gradient-danger">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5" style=" border-radius: 50px;">
      <div class="card-body p-0">
      	 <center>
				<image src="../images/icon.ico"   height="120" href="#">
					<h1>Patrova International School</h1>
			</center>
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-2 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">SBA User Registration</h1>
              </div>
              <div class="">
<form action="register.sba.php" method="POST" class="user">
     <div class="form-group">
            <input type="text" required="" class="form-control form-control-user" id="exampleLastName" placeholder="Username" name="username" maxlength="30" value="<?php if(isset($username)){echo($username);} ?>">
            </div>
     <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="password" required="" class="form-control form-control-user" maxlength="32" placeholder="Password" name="password">
            </div>
            <div class="col-sm-6">
              <input type="password" required="" class="form-control form-control-user" placeholder="Confirm Password" maxlength="32" name="confirm_password">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="firstname" required="" class="form-control form-control-user" placeholder="First Name" maxlength="15"  value="<?php if(isset($firstname)){echo($firstname);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="lastname" required="" class="form-control form-control-user" placeholder="Last Name" maxlength="15" value="<?php if(isset($lastname)){echo($lastname);} ?>">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="subject" required="" class="form-control form-control-user" placeholder="Subject" maxlength="15" value="<?php if(isset($subject)){echo($subject);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="class" required="" placeholder="Class" class="form-control form-control-user" maxlength="15" value="<?php if(isset($class)){echo($class);} ?>">
            </div>
         </div>
         
          <hr>  
  <input type="submit" value="Register" class="btn btn-danger btn-user btn-block"><br>
  <input type="reset" value="Cancel" class="btn btn-danger btn-user btn-block">
   <hr>
    <div class="text-center">
        <a class="small text-danger" href="../sba/index.php">SBA Login</a>
        <hr>
       </div> 
   <hr>
</form>

</div>
</div>
<?php



 ?>                
        </div>
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
  <script src="../bootstrap/js/sb-admin-2.min.js"></script>

</body>

</html>
