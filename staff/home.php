<?php
require '../dbConnection/connect.inc.php';
require '../dbConnection/core.inc.php';

if(login())
{
  $myuser = $_SESSION['username'];
  $subject = $_SESSION['subject'];
  ?>
  <div id="wrapper">
  <div class="sidebar sidebar-dark bg-danger">

    <form action="home.php" method="GET">
      <li class="nav-item action">
       
        <center>
          <img src="../images/ucclogo.jpg" class="img-responsive img-thumbnail" width="90" height="70">
        </center>
         <small class="nav-link text-center font-weight-bold">STUDENT DASHBOARD</small>
      </li>
      <li class="nav-item active">
        <hr>
<!--         <button type="submit" name="btnService" class="btn nav-link bg-danger ">Username: <?php echo $myuser ?></button>

 -->    <button type='submit' class='nav-link  btn bg-gradient-danger btn-block'>&nbsp;&nbsp;<?php echo $subject ?></button>
        <button type="submit" name="btnService" class="btn nav-link bg-gradient-danger ">SERVICE INFO</button>

        <button type="submit" name="btnPersonalDetail" class="btn nav-link bg-gradient-danger ">PERSONAL INFO</button>

        <button type="submit" name="btnVerifyDetail" class="btn nav-link bg-gradient-danger ">VERIFY DETAILS</button>
        
        <button type="submit" name="btnEnterResult" class="btn nav-link bg-gradient-danger ">ENTER RESULT</button>
       
        <button type="submit" name="btnResult" class="btn nav-link bg-gradient-danger ">STATEMENT OF RESULTS</button>

        <button type="submit" name="btnTimeTable" class="btn nav-link bg-gradient-danger ">TIME TABLE</button>

        <button type="submit" name="btnChangePassword" class="btn nav-link bg-gradient-dang ">CHANGE PASSWORD</button>

        <button type="submit" name="btnLogout" class="btn nav-link bg-gradient-danger ">LOGOUT</button>
      </li>
    </form>
  </div>


  

  <div id="content-wrapper"> 
    <nav class="navbar bg-white topbar navbar-fixed-top mb-4 shadow static-top ">
      <h4>Mystic Falls International</h4>
      <small class="text-right"><?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?></small>
    </nav>

  <?php
  if(isset($_GET['btnService']))
  {
    ?>

    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-danger'>SERVICE INFORMATION</h6>
            </div>
            <div class='card-body'>
              <p>
        You are kindly invited to participate in the research entitled Assessment and Awareness Creation of Hypokenetic risk Risk Factor of Disease for life modification. <br>
        The University of Cape Coast (UCC) is committed to providing a Campus free from Sexual Harassment, assult,stalking and intimate partner violence. <br>
        The purpose of this questionaire is to assess the campus climate and culture in relation to Sexual Harassment, including the experience of students and degree to which students feel safe and respect, particularly in regard to issues of sexual harassment. <br>
        We are interested in learning more about students' knowledge and satisfaction related to UCC resources and policies on sexual harassment.<br>
        The data we collect will be use to improve campus response, intervention, and prevention efforts.<br>
        Thank you.<br>
        </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
  }
  ?>

  <!-- Enter Results -->
  <?php
  if (isset($_GET['btnEnterResult'])) {
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-3 col-lg-3'>
          <div class='card shadow mb-2'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-danger'>SBA</h6>
            </div>
            <div class='card-body'>
              <p>PLEASE ENTER: STUDENT'S INDEX NUMBER, CLASS SCORE AND EXAM SCORE <br></p>
              <hr>
              <form action='result.php' method='GET' class='user'>
                <div class='form-group'>
                  <input type='text' required="" class='form-control form-control-user' id='exampleLastName' placeholder='Username' name='username' maxlength='30'>
                </div>
                <div class='form-group'>
                  <input type='text' required="" class='form-control form-control-user' id='exampleLastName' placeholder='Class' name='class' maxlength='30'>
                </div>
                <div class='form-group row'>
                  <div class='col-sm-6 mb-3 mb-sm-0'>
                    <input type='number' required="" name='class_score' class='form-control form-control-user' placeholder='Enter Class Score' maxlength='2'>
                  </div>
                  <div class='col-sm-6'>
                    <input type='number' required="" name='exam_score' class='form-control form-control-user' placeholder='Enter Exam Score' maxlength='2'>
                  </div>
                </div>
                <hr>
                <input type='submit' value='Compute' class='btn btn-danger btn-user btn-block'><br>
                <input type='reset' value='Cancel' class='btn btn-danger btn-user btn-block'>
                <hr>
              </form>
              <?php
            }
            ?>

  <!-- Logout Button -->
  <?php
  if(isset($_GET['btnLogout']))
  {
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-danger'>SERVICE INFORMATION</h6>
            </div>
            <div class='card-body'>
              <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        </div>
              <div class="modal-body">Select "Logout" below if you are ready to logout your account.</div>
        <div class="modal-footer">
          <a class="btn btn-danger" href="home.php">Cancel</a>
          <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

<!-- Personal Information Button -->
<?php
  if (isset($_GET['btnPersonalDetail'])) {
    $query = mysqli_query($connection, "SELECT * FROM sba_users WHERE username='$myuser'");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-8 col-lg-7'>
          <div class='card shadow mb-4'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-danger'>PERSONAL DETAILS</h6>
            </div>
            <div class='card-body'>
              <div class='table-responsive'>
                <div id="printDetail">
                  <table class='table table-striped table-bordered table-hover table-condensed' border="1" width="100%">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                      ?>
                      <tr>
                        <th align="left">USERNAME</th>
                        <td><?php echo strtoupper($row['username']); ?></td>
                      </tr>
                    <tr>
                      <th align="left">FIRST NAME</th>
                      <td><?php echo strtoupper($row['firstname']); ?></td>
                    </tr>
                    <tr>
                    <th align="left">LAST NAME</th>
                    <td><?php echo strtoupper($row['lastname']); ?></td>
                    <tr>
                    <th>SUBJECT</th>
                    <td> <?php echo strtoupper($row['subject']);?></td>
                    </tr>
                    <tr>
                    <th>CLASS</th>
                    <td> <?php echo $row['class']; ?></td>
                    </tr>
                    <?php
                  }
                  ?>
                </table>
              </div>
              <button class="btn btn-danger btn-user btn-block" onclick="printContent('printDetail')">Print</button>
            </div>
            <?php
          }
          ?>


  <!-- Verify Information Button -->
  <?php
  if(isset($_GET['btnVerifyDetail']))
  {
    $query = mysqli_query($connection, "SELECT * FROM sba_users WHERE username='$myuser'");
    ?>

    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-danger'>VERIFY INFORMATION</h6>
            </div>
            <div class='card-body'>
              <div class="">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                      ?>
                      <tbody>
                      <tr>
                        <th align="left">USERNAME</th>
                        <td><?php echo strtoupper($row['username']); ?></td>
                      </tr>
                    <tr>
                      <th align="left">FIRST NAME</th>
                      <td><?php echo strtoupper($row['firstname']); ?></td>
                    </tr>
                    <tr>
                    <th align="left">LAST NAME</th>
                    <td><?php echo strtoupper($row['lastname']); ?></td>
                    <tr>
                    <th>SUBJECT</th>
                    <td> <?php echo strtoupper($row['subject']);?></td>
                    </tr>
                    <tr>
                    <th>CLASS</th>
                    <td> <?php echo $row['class']; ?></td>
                    </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                  </table>
                  <form action="home.php" method="GET">
                    <button type="submit" name="btnVerify" class="btn btn-block btn-danger">VERIFY INFO</button>
                  </form>
                  <button class="btn btn-block btn-danger">PRINT</button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
  }
     ?>

    <!-- Confirm Verify Button -->
  <?php
  if(isset($_GET['btnVerify']))
  {
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-danger'>VERIFY PERONAL INFORMATION</h6>
            </div>
            <div class='card-body'>
              <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hi <?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?></h5>
        </div>
              <div class="modal-body">You have Succefully Verify your personal information.</div>
        <div class="modal-footer">
          <a class="btn " href="#">Thanks</a>
        </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>


  <!-- Statement of Result Button -->
  <?php
  if (isset($_GET['btnResult'])) {
        $res = mysqli_query($connection, "SELECT * FROM $subject");

        ?>
      <div class='container-fluid'>
        <div class='row'>
        <div class='col-xl-12 col-lg-12'>
              <div class='card shadow mb-4'>
              <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
                  <h6 class='m-0 font-weight-bold text-danger'>STUDENTS RESULTS FOR <?php echo strtoupper($subject) ?></h6>
                  <div class='dropdown no-arrow'>
                  <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                      <i class='fas fa-ellipsis-v fa-sm fa-fw text-gray-400'></i>
                    </a>
                    <div class='dropdown-menu dropdown-menu-right shadow animated--fade-in' aria-labelledby='dropdownMenuLink'>
                      <div class='dropdown-header'></div>
                      <div class='dropdown-divider'></div>
                      <div class='dropdown-divider'></div>
                    </div>
                  </div>
                </div>
              <div class='card-body'>
                <form action="home.php" method="post" class=" form-inline mr-auto  my-md-0  navbar-search">
                <div class="input-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <input name="search" type="text" class="form-control bg-light border-1 small" placeholder="Search by username, firstname, lastname or othername ..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button name="submit" class="btn btn-danger" type="button">
                      <i class="fas fa-search fa-sm">Search</i>
                    </button>
                  </div>
                </div>
              </form><br><br>
          
      <div class='table-responsive'>
        <table class='table table-striped table-bordered table-hover table-condense'>
      <tr>
      <th>USERNAME</th>
      <th>CLASS</th>
      <th>CLASS SCORE 50%</th>
      <th>EXAM SCORE 50%</th>
      <th>TOTAL SCORE 100%</th>
      <th>GRADE</th>
      <th>REMARK</th>
      </tr>
      
      <?php
      while ($row = mysqli_fetch_array($res)) {
        ?>
        <div>
        <tr>
        <td><?php echo strtoupper($row['username']); ?></td>
        <td><?php echo $row['Class']; ?></td>
        <td><?php echo $row['ClassScore']; ?></td>
        <td><?php echo strtoupper($row['ExamScore']); ?></td>
        <td><?php echo strtoupper($row['TotalScore']); ?></td>
        <td><?php echo strtoupper($row['Grade']); ?></td>
        <td><?php echo $row['Remark']; ?></td>
        </tr>     

        <?php
      }
      ?>
      </table>
  </div>

      <?php
    }
    ?>


    <!-- Change Password -->
  <?php
  if(isset($_GET['btnChangePassword']))
  {
    ?>
    <div class='container-fluid'>
        <div class='row'>
         <div class='col-xl-3 col-lg-3 col-md-3'>
           <div class='card shadow mb-2'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-dang'>CHANGE PASSWORD</h6>
            </div>
            <div class='card-body'>
              <h5>CREATING NEW PASSWORD</h5>
              <hr>
              <form action='result.php' method='GET' class='user'>
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
                <input type='submit' value='Search' class='btn btn-danger btn-user btn-block'>
                <br>
                <input type='reset' value='Cancel' class='btn btn-danger btn-user btn-block'>
                <hr>
                </div>                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>


  <!-- Time Table Button -->
  <?php
  if(isset($_GET['btnTimeTable']))
  {
    $res = mysqli_query($connection, "SELECT * FROM timeTable");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-8 col-lg-8 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-danger'>EXAMINATION TIME TABLE</h6>
            </div>
            <div class='card-body'>
              <div class="table-responsive">
            <div class='table-responsive'><table class='table table-striped table-bordered table-hover table-condense'>
              <thead>
                <tr>
                  <th>ROLL</th>
                  <th>SUBJECT NAME</th>
                  <th>DATE</th>
                  <th>ETIME</th>
                  <th>VENUE</th>
                </tr>
              </thead>
      
      <?php
      while ($row = mysqli_fetch_array($res)) {
        ?>
        <tbody>
          <tr>
          <td><?php echo strtoupper($row['id']); ?></td>
          <td><?php echo $row['subject']; ?></td>
          <td><?php echo $row['examDate']; ?></td>
          <td><?php echo strtoupper($row['examTime']); ?></td>
          <td><?php echo strtoupper($row['venue']); ?></td>
        </tr>   
        </tbody>  

        <?php
      }
      ?>
      </table>
  </div>
          <button class="btn btn-danger btn-block" onclick="printContent('printTimeTable')">Print</button>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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

  <title>STUDENT PORTAL</title>

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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to logout your account.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-info" href="logout.php">Logout</a>
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
