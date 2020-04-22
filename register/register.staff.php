<?php 

require '../dbConnection/connect.inc.php';

if( isset($_POST['username']) && 
  isset($_POST['password']) && 
  isset($_POST['confirm_password']) && 
  isset($_POST['firstname']) && 
  isset($_POST['lastname']) &&
  isset($_POST['othername']) &&
  isset($_POST['gender']) &&
  isset($_POST['birthdate']) &&
  isset($_POST['phone']) &&
  isset($_POST['residentialAddress']) &&
  isset($_POST['postalAddress']) &&
  isset($_POST['maritalStatus']) && 
  isset($_POST['levelofEducation']) &&
  isset($_POST['skill']) && 
  isset($_POST['position']) &&
  isset($_POST['nextofKin']) &&
  isset($_POST['phoneofNextofKin']) &&
  isset($_POST['relationwithNextofKin']) && 
  isset($_POST['ssnitID']) && 
  isset($_POST['bankName']) && 
  isset($_POST['bankBrach']) &&
  isset($_POST['accountNumber']) &&
  isset($_POST['startingDate']) &&
  isset($_POST['email']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $password_hash = md5($password);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $othername = $_POST['othername'];
  $gender = $_POST['gender'];
  $birthdate = $_POST['birthdate'];
  $phone = $_POST['phone'];
  $levelofEducation = $_POST['levelofEducation'];
  $maritalStatus = $_POST['maritalStatus'];
  $skill = $_POST['skill'];
  $position = $_POST['position'];
  $ssnitID = $_POST['ssnitID'];
  $residentialAddress = $_POST['residentialAddress'];
  $postalAddress = $_POST['postalAddress'];
  $nextofKin = $_POST['nextofKin'];
  $phoneofNextofKin = $_POST['phoneofNextofKin'];
  $relationwithNextofKin = $_POST['relationwithNextofKin'];
  $bankName = $_POST['bankName'];
  $bankBrach = $_POST['bankBrach'];
  $accountNumber = $_POST['accountNumber'];
  $startingDate = $_POST['startingDate'];
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
			$query = "SELECT `username` FROM `employees` WHERE `username` = '$username'";
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
				$query = "INSERT INTO `employees` VALUES('".mysqli_real_escape_string($connection, $username)."', '".mysqli_real_escape_string($connection, $password_hash)."', '".mysqli_real_escape_string($connection, $firstname)."', '".mysqli_real_escape_string($connection, $lastname)."' , '".mysqli_real_escape_string($connection, $othername)."','".mysqli_real_escape_string($connection, $gender)."', '".mysqli_real_escape_string($connection, $birthdate)."','".mysqli_real_escape_string($connection, $phone)."', '".mysqli_real_escape_string($connection, $residentialAddress)."', '".mysqli_real_escape_string($connection, $postalAddress)."','".mysqli_real_escape_string($connection, $maritalStatus)."', '".mysqli_real_escape_string($connection, $levelofEducation)."', '".mysqli_real_escape_string($connection, $skill)."', '".mysqli_real_escape_string($connection, $position)."', '".mysqli_real_escape_string($connection, $nextofKin)."' , '".mysqli_real_escape_string($connection, $phoneofNextofKin)."', '".mysqli_real_escape_string($connection, $relationwithNextofKin)."','".mysqli_real_escape_string($connection, $ssnitID)."', '".mysqli_real_escape_string($connection, $bankName)."', '".mysqli_real_escape_string($connection, $bankBrach)."','".mysqli_real_escape_string($connection, $accountNumber)."', '".mysqli_real_escape_string($connection, $startingDate)."','".mysqli_real_escape_string($connection, $email)."')";

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

  <title>Portal - Register Staff</title>

  <!-- Custom fonts for this template-->
  <link href="../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--   <link rel="stylesheet" type="text/css" href="css/registerAdmin.css">
 -->
</head>

<body class="bg-gradient-warning">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5" style=" border-radius: 50px;">
      <div class="card-body p-0">
      	 <center>
				<image src="../images/icon.ico"   height="120" href="#">
					<h1> Patrova International School</h1>
			</center>
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-2 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">STAFF REGISTRATION</h1>
              </div>
              <div class="">
	<form action="register.staff.php" method="POST" class="user">
     <div class="form-group">
            <input type="text" required="" class="form-control form-control-user" id="exampleLastName" placeholder="Username" name="username" maxlength="30" value="<?php if(isset($username)){echo($username);} ?>">
            </div>
     <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="password" required="" class="form-control form-control-user" maxlength="32" placeholder="Password" name="password">
            </div>
            <div class="col-sm-6">
              <input type="password" required="" class="form-control form-control-user" placeholder="Password" maxlength="32" name="confirm_password">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="gender" required="" class="form-control form-control-user" placeholder="Gender" maxlength="15"  value="<?php if(isset($gender)){echo($gender);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="firstname" required="" class="form-control form-control-user" placeholder="First Name" maxlength="15"  value="<?php if(isset($firstname)){echo($firstname);} ?>">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="lastname" required="" class="form-control form-control-user" placeholder="Last Name" maxlength="15" value="<?php if(isset($lastname)){echo($lastname);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="othername" placeholder="Other Name" class="form-control form-control-user" maxlength="15" value="<?php if(isset($othername)){echo($othername);} ?>">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="date" name="birthdate" required="" class="form-control form-control-user" placeholder="Date of Birth" maxlength="12"  value="<?php if(isset($birthdate)){echo($birthdate);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="number" name="phone" required="" class="form-control form-control-user" placeholder="Phone Number"  maxlength="30"  value="<?php if(isset($phone)){echo($phone);} ?>">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" required="" class="form-control form-control-user" name="residentialAddress" placeholder="Residential Address" maxlength="30"  value="<?php if(isset($residentialAddress)){echo($residentialAddress);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text"  placeholder="Postal Address" class="form-control form-control-user" name="postalAddress" maxlength="70" value="<?php if(isset($postalAddress)){echo($postalAddress);} ?>">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" required="" name="maritalStatus" class="form-control form-control-user" placeholder="Marital Status" maxlength="20"  value="<?php if(isset($maritalStatus)){echo($maritalStatus);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" required="" name="levelofEducation" class="form-control form-control-user" placeholder="Level of Education"  maxlength="20"  value="<?php if(isset($levelofEducation)){echo($levelofEducation);} ?>">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="skill" class="form-control form-control-user" placeholder="Skill" maxlength="20"  value="<?php if(isset($skill)){echo($skill);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="position" class="form-control form-control-user" placeholder="Position"  maxlength="20"  value="<?php if(isset($position)){echo($position);} ?>">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="nextofKin" required="" class="form-control form-control-user" placeholder="Name of Next of Kin" maxlength="40"  value="<?php if(isset($nextofKin)){echo($nextofKin);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="phoneofNextofKin" class="form-control form-control-user" placeholder="Phone of Next of Kin"  maxlength="15"  value="<?php if(isset($phoneofNextofKin)){echo($phoneofNextofKin);} ?>">
            </div>
         </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="relationwithNextofKin" required="" class="form-control form-control-user" placeholder="Relation of Next of Kin" maxlength="40"  value="<?php if(isset($relationwithNextofKin)){echo($relationwithNextofKin);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="ssnitID" class="form-control form-control-user" placeholder="SSNIT ID"  maxlength="20"  value="<?php if(isset($ssnitID)){echo($ssnitID);} ?>">
            </div>
         </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="bankName" class="form-control form-control-user" placeholder="Name of Bank" maxlength="30"  value="<?php if(isset($bankName)){echo($bankName);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="bankBrach" class="form-control form-control-user" placeholder="Branch"  maxlength="20"  value="<?php if(isset($bankBrach)){echo($bankBrach);} ?>">
            </div>
         </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="accountNumber" class="form-control form-control-user" placeholder="Account Number" maxlength="20"  value="<?php if(isset($accountNumber)){echo($accountNumber);} ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="startingDate" required="" class="form-control form-control-user" placeholder="Starting Date"  maxlength="10"  value="<?php if(isset($startingDate)){echo($startingDate);} ?>">
            </div>
         </div>
          <div class="form-group">
            <input type="email" required="" class="form-control form-control-user" id="exampleLastName" placeholder="Email Address" name="email" maxlength="60" value="<?php if(isset($email)){echo($email);} ?>">
            </div>
          <hr>  
  <input type="submit" value="Register" class="btn btn-warning btn-user btn-block"><br>
  <input type="reset" value="Cancel" class="btn btn-warning btn-user btn-block">
   <hr>
    <div class="text-center">
        <a class="small text-warning" href="../staff/index.php">Staff Login</a>
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
