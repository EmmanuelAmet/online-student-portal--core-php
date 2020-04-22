<?php 

require '../dbConnection/connect.inc.php';


if( isset($_POST['username']) && 
  isset($_POST['password']) && 
  isset($_POST['confirm_password']) && 
  isset($_POST['firstname']) && 
  isset($_POST['lastname']) &&
  isset($_POST['othername']) &&
  isset($_POST['position']) &&
  isset($_POST['email']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $password_hash = md5($password);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $othername = $_POST['othername'];
  $position = $_POST['position'];
  $email = $_POST['email'];


	if(!empty($username) && !empty($password) && !empty($confirm_password) && !empty($firstname) && !empty($lastname))
	{
		if(strlen($username) > 30 || strlen($firstname) >15 || strlen($lastname) > 15)
		{
			//echo 'Please ahear to maximum length of fields.';
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
			$query = "SELECT `username` FROM `admin` WHERE `username` = '$username'";
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
				$query = "INSERT INTO `admin` VALUES('', '".mysqli_real_escape_string($connection, $username)."', '".mysqli_real_escape_string($connection, $password_hash)."', '".mysqli_real_escape_string($connection, $firstname)."', '".mysqli_real_escape_string($connection, $lastname)."', '".mysqli_real_escape_string($connection, $othername)."' , '".mysqli_real_escape_string($connection, $position)."', '".mysqli_real_escape_string($connection, $email)."')";

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

  <title>Portal - Register Admin</title>

   <!-- Bootstrap styles for this template-->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">


  <div class="container">
    <div class="">
      <div class="card card-body shadow my-5">
      <center>
        <img src="../images/ucclogo.jpg" height="100" class="img-responsive">
      </center>
      <h4 class="text-center">Mystic Falls Internation</h4>
      <h5 class="text-center">Register Admin</h5>
      <form action="register.admin.php" method="POST" class="user">
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
              <input type="text" name="position" class="form-control form-control-user" placeholder="Work Status" maxlength="15"  value="<?php if(isset($position)){echo($position);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" required="" name="firstname" class="form-control form-control-user" placeholder="First Name" maxlength="15"  value="<?php if(isset($firstname)){echo($firstname);} ?>">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" required="" name="lastname" class="form-control form-control-user" placeholder="Last Name" maxlength="15" value="<?php if(isset($lastname)){echo($lastname);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="othername" placeholder="Other Name" class="form-control form-control-user" maxlength="15" value="<?php if(isset($othername)){echo($othername);} ?>">
            </div>
         </div>
         <div class="form-group">
            <input type="email" required="" class="form-control form-control-user"  placeholder="Email Address" name="email" maxlength="50" value="<?php if(isset($email)){echo($email);} ?>">
            </div>
         
          <hr>  
  <input type="submit" value="Register" class="btn btn-primary btn-user btn-block"><br>
  <input type="reset" value="Cancel" class="btn btn-primary btn-user btn-block">
   <hr>
    <div class="text-center">
        <a class="small" href="../admin/index.php">Admin Login</a>
       </div> 
   <hr>
</form>
    </div>
    </div>
  </div>


   <!-- Bootstrap core JavaScript-->
  <script src="../bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../bootstrap/js/jquery.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
