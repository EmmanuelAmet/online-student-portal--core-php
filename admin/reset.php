<?php
require '../dbConnection/connect.inc.php';
require '../dbConnection/core.inc.php';

if(login())
{
  $myuser = $_SESSION['username'];
  ?>
  <div id="wrapper">

  <!-- Change Password -->
  <?php
  if(isset($_GET['btnChangePassword']))
  {
    ?>
    <?php 
     if(isset($_POST['btnReset']))
     {
      if( isset($_POST['password']) && 
          isset($_POST['newPassword']) && 
          isset($_POST['confirmPassword']))
{
  $oldPassword = $_POST['oldPassword'];
  $passwordOld = md5($oldPassword);
  $newPassword = $_POST['newPassword'];
  
  $confirmPassword = $_POST['confirmPassword'];
  $password_hash = md5($confirmPassword);

  if(!empty($oldPassword) && !empty($newPassword) && !empty($confirmPassword))
  {
    if(strlen($newPassword) > 30 || strlen($confirmPassword) > 30)
    {
      echo "<script language='javascript' type='text/javascript'>
        alert('Please ahear to maximum length of fields.');
        </script>";
    }
    else
    {
        if($newPassword != $confirmPassword)
      {
        echo "<script language='javascript' type='text/javascript'>
          alert('Password do not match.);
          </script>";
      }
      else
      {
        $query = "SELECT `password` FROM `admin` WHERE `password` = '$passwordOld'";
        $query_run = mysqli_query($connection, $query);
          if(mysqli_num_rows($query_run) == 1)
          {
            $query = mysqli_query($connection,"UPDATE admin SET password =' $password_hash' where username='$myuser'");

            if($query_run = mysqli_query($connection, $query))
            {
              echo "<script language='javascript' type='text/javascript'>
                  alert('Password has been Reset successfully');
                  </script>";
            }
            else
            {
              echo "<script language='javascript' type='text/javascript'>
                  alert('Password Reset Failed. Try again.');
                  </script>";
            }
          }
          else
          {
            echo "<script language='javascript' type='text/javascript'>
                  alert('Old Password Do Not Match. Try again.');
                  </script>";
          }
      }
    }
  }
  else
  {
    echo "<script language='javascript' type='text/javascript'>
              alert('All fields are required.');
              </script>";
  }
}
     }
      ?>

    
    <?php
  }
  ?>

</div>
</div>

<?php
}else{
  header('Location: index.php');
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

  <title>MFI - Admin Dashboard</title>

  <!-- Bootstrap styles for this project-->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Script for printing -->
  <script>
    function printContent(el) {
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>

</head>

<body>
  <div class='container-fluid'>
        <div class='row'>
         <div class='col-xl-3 col-lg-3 col-md-3'>
           <div class='card shadow mb-2'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>CHANGE PASSWORD</h6>
            </div>
            <div class='card-body'>
              <h5>CREATING NEW PASSWORD</h5>
              <hr>
              <form action='home.php' method='POST' class='user'>
                <div class='form-group'>
                  <input type='password' required="" class='form-control form-control-user' id='exampleLastName' placeholder='Enter Old Password' name='oldPassword' maxlength='30'>
                </div>
                <div class="form-group">
                  <input type='password' required="" class='form-control form-control-user' id='exampleLastName' placeholder='Enter New Password' name='newPassword' maxlength='30'>
                </div>
                <div class="form-group">
                  <input type='password' required="" class='form-control form-control-user' id='exampleLastName' placeholder='Confirm Passwords' name='confirmPassword' maxlength='30'>
                </div>
                <hr>
                <input type='submit' name="btnReset" value='Submit' class='btn btn-primary btn-user btn-block'>
                <br>
                <input type='reset' value='Cancel' class='btn btn-primary btn-user btn-block'>
                <hr>
                </div>                
              </form>
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
<script src="../bootstrap/js/jquery.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>