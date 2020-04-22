<?php 

require '../dbConnection/connect.inc.php';

if( isset($_POST['username']) && 
  isset($_POST['paymentMade']) && 
  isset($_POST['paymentDate']) && 
  isset($_POST['firstname']) && 
  isset($_POST['lastname']) &&
  isset($_POST['subject']) &&
  isset($_POST['class']) &&
  isset($_POST['balanceCarryForward']) &&
  isset($_POST['existingBalance']))
{
  $username = $_POST['username'];
  $paymentMade = $_POST['paymentMade'];
  $paymentDate = $_POST['paymentDate'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $class = $_POST['class'];
  $balanceCarryForward = $_POST['balanceCarryForward'];
  $totalFees = $_POST['totalFees'];
  $existingBalance = $_POST['existingBalance'];

	if(!empty($username) && !empty($paymentMade) && !empty($firstname) && !empty($lastname))
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
			if(!empty($paymentMade))
		{
			//echo 'Password do not match.';
			echo "<script language='javascript' type='text/javascript'>
				alert('Payment Made Cannot be empty);
				</script>";
		}
		else
		{
			$query = "SELECT `username` FROM `fees` WHERE `username` = '$username'";
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
				$query = "INSERT INTO `fees` VALUES('', '".mysqli_real_escape_string($connection, $username)."','".mysqli_real_escape_string($connection, $firstname)."', '".mysqli_real_escape_string($connection, $lastname)."', '".mysqli_real_escape_string($connection, $class)."' , '".mysqli_real_escape_string($connection, $paymentDate)."' , '".mysqli_real_escape_string($connection, $existingBalance)."' , '".mysqli_real_escape_string($connection, $totalFees)."' , '".mysqli_real_escape_string($connection, $paymentMade)."' , '".mysqli_real_escape_string($connection, $balanceCarryForward)."')";

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

  <title>Portal - Student Fees Form</title>

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
                <h1 class="h4 text-gray-900 mb-4">Students Fees Form</h1>
              </div>
              <div class="">
<form action="register.sba.php" method="POST" class="user">
     <div class="form-group">
            <input type="text" required="" class="form-control form-control-user" id="exampleLastName" placeholder="Username" name="username" maxlength="30" value="<?php if(isset($username)){echo($username);} ?>">
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
              <input type="text" name="class" required="" class="form-control form-control-user" placeholder="Class" maxlength="15"  value="<?php if(isset($class)){echo($class);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="paymentDate" required="" class="form-control form-control-user" placeholder="Date of Payment" maxlength="15" value="<?php if(isset($paymentDate)){echo($paymentDate);} ?>">
            </div>
         </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="paymentMade" required="" class="form-control form-control-user" placeholder="Payment Made" maxlength="15"  value="<?php if(isset($paymentMade)){echo($paymentMade);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="existingBalance" required="" class="form-control form-control-user" placeholder="Existing Balance" maxlength="15" value="<?php if(isset($existingBalance)){echo($existingBalance);} ?>">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="totalFees" required="" class="form-control form-control-user" placeholder="Fees For This Academic Year" maxlength="15" value="<?php if(isset($totalFees)){echo($totalFees);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="balanceCarryForward" required="" placeholder="Balance Carry Forward" class="form-control form-control-user" maxlength="15" value="<?php if(isset($balanceCarryForward)){echo($balanceCarryForward);} ?>">
            </div>
         </div>
         
          <hr>  
  <input type="submit" value="Register" class="btn btn-danger btn-user btn-block"><br>
  <input type="reset" value="Cancel" class="btn btn-danger btn-user btn-block">
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
