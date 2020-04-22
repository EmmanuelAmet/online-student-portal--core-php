<?php
require '../dbConnection/connect.inc.php';
require '../dbConnection/core.inc.php';

if(login())
{
  $myuser = $_SESSION['username'];
  ?>
  <div id="wrapper">
  <div class="sidebar sidebar-dark bg-primary hidden-print">

    <form action="home.php" method="GET">
      <li class="nav-item action">
       
        <center>
          <img src="../images/ucclogo.jpg" class="img-responsive img-thumbnail" width="90" height="70">
        </center>
         <small class="nav-link text-center font-weight-bold">ADMIN DASHBOARD</small>
      </li>
      <li class="nav-item active">
        <hr>
<!--         <button type="submit" name="btnService" class="btn nav-link bg-primary ">Username: <?php echo $myuser ?></button>
 -->    <button type="submit" name="btnService" class="btn nav-link bg-gradient-primary ">SERVICE INFO</button>

        <button type="submit" name="btnPersonalDetail" class="btn nav-link bg-gradient-primary ">PERSONAL INFO</button>

        <button type="submit" name="btnVerifyDetail" class="btn nav-link bg-gradient-primary ">VERIFY DETAILS</button>

        <button name='btnStudentDetail' type='submit' class='nav-link btn bg-gradient-primary btn-block'> STUDENT DETAILS</button>

        <button name='btnStaffDetail' type='submit' class='nav-link  btn bg-gradient-primary btn-block'> STAFF DETAILS</button>

        <button name='btnRegister' type='submit' class='nav-link  btn bg-gradient-primary btn-block'> REGISTER PAGE</button>

        <button name='btnReport' type='submit' class='nav-link btn bg-gradient-primary btn-block'> REPORT</button>

        <button type="submit" name="btnResult" class="btn nav-link bg-gradient-primary ">STATEMENT OF RESULTS</button>

        <button type="submit" name="btnTimeTable" class="btn nav-link bg-gradient-primary ">TIME TABLE</button>

        <button type="submit" name="btnFees" class="btn nav-link bg-gradient-primary ">FEES</button>

        <button type="submit" name="btnChangePassword" class="btn nav-link bg-gradient-primary ">CHANGE PASSWORD</button>

        <button type="submit" name="btnLogout" class="btn nav-link bg-gradient-primary ">LOGOUT</button>
      </li>
    </form>
  </div>


  

  <div id="content-wrapper"> 
    <nav class="navbar bg-white topbar navbar-fixed-top mb-4 shadow navbar-fixed-top static-top ">
      <h4 class="col-xl-6 col-md-8 col-sm-6 col-xs-4">Mystic Falls International</h4>
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
              <h6 class='m-0 font-weight-bold text-primary'>SERVICE INFORMATION</h6>
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
              <h6 class='m-0 font-weight-bold text-primary'>SERVICE INFORMATION</h6>
            </div>
            <div class='card-body'>
              <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        </div>
              <div class="modal-body">Select "Logout" below if you are ready to logout your account.</div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="home.php">Cancel</a>
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
  if(isset($_GET['btnPersonalDetail']))
  {
    $query = mysqli_query($connection, "SELECT * FROM admin WHERE username='$myuser'");
    ?>

    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>VERIFY INFORMATION</h6>
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
                          <td><?php echo $row['username']; ?></td>
                          </tr>
                          <tr>
                          <th align="left">FIRST NAME</th>
                          <td><?php echo strtoupper($row['firstname']); ?></td>
                          </tr>
                          <tr>
                          <th align="left">LAST NAME</th>
                          <td><?php echo strtoupper($row['lastname']); ?></td>
                          <tr>
                          <th align="left">OTHER NAME</th>
                          <td> <?php echo strtoupper($row['othername']);?></td>
                          </tr>
                          <tr>
                          <th align="left">POSITION</th>
                          <td> <?php echo strtoupper($row['position']); ?></td>
                          </tr>
                          <tr>
                          <th align="left">EMAIL ADDRESS</th>
                          <td><input class="form-control" type="email" placeholder="<?php echo $row['email'];?>" name=""></td>
                      </tbody>
                      <?php
                    }
                    ?>
                  </table>
                  <form action="home.php" method="GET">
                    <button type="submit" name="btnUpdateInfo" class="btn btn-block btn-primary">UPDATE INFO</button>
                  </form>
                  <button class="btn btn-block btn-primary">PRINT</button>

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


  <!-- Verify Information Button -->
  <?php
  if(isset($_GET['btnVerifyDetail']))
  {
    $query = mysqli_query($connection, "SELECT * FROM admin WHERE username='$myuser'");
    ?>

    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>VERIFY INFORMATION</h6>
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
                          <td><?php echo $row['username']; ?></td>
                          </tr>
                          <tr>
                          <th align="left">FIRST NAME</th>
                          <td><?php echo strtoupper($row['firstname']); ?></td>
                          </tr>
                          <tr>
                          <th align="left">LAST NAME</th>
                          <td><?php echo strtoupper($row['lastname']); ?></td>
                          <tr>
                          <th align="left">OTHER NAME</th>
                          <td> <?php echo strtoupper($row['othername']);?></td>
                          </tr>
                          <tr>
                          <th align="left">POSITION</th>
                          <td> <?php echo strtoupper($row['position']); ?></td>
                          </tr>
                          <tr>
                          <th align="left">EMAIL ADDRESS</th>
                          <td> <?php echo $row['email'];?></td>
                      </tbody>
                      <?php
                    }
                    ?>
                  </table>
                  <form action="home.php" method="GET">
                    <button type="submit" name="btnVerify" class="btn btn-block btn-primary">VERIFY INFO</button>
                  </form>
                  <button class="btn btn-block btn-primary">PRINT</button>

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

       <!-- Update Personal Info Button -->
  <?php
  if(isset($_GET['btnUpdateInfo']))
  {
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>UPDATE PERONAL INFORMATION</h6>
            </div>
            <div class='card-body'>
              <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hi <?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?></h5>
        </div>
              <div class="modal-body">You have Succefully Updated your Personal Information.</div>
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
              <h6 class='m-0 font-weight-bold text-primary'>VERIFY PERONAL INFORMATION</h6>
            </div>
            <div class='card-body'>
              <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hi <?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?></h5>
        </div>
              <div class="modal-body">You have Succefully Verified your personal information.</div>
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


  <!-- Time Table Button -->
  <?php
  if(isset($_GET['btnTimeTable']))
  {
    $query = mysqli_query($connection, "SELECT * FROM timeTable");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-8 col-lg-8 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>EXAMINATION TIME TABLE</h6>
            </div>
            <div class='card-body'>
              <div class="table-responsive">
            <div class='table-responsive'>
              <table class='table table-striped table-bordered table-hover table-condense'>
              <thead>
                <tr>
                  <th>ROLL</th>
                  <th>SUBJECT NAME</th>
                  <th>DATE</th>
                  <th>ETIME</th>
                  <th>VENUE</th>
                </tr>
              </thead>
                <form> 
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td><input type="text" placeholder="Subject" class="form-control" name=""></td>
                    <td><input type="text" placeholder="Exam Date" class="form-control" name=""></td>
                    <td><input type="text" placeholder="Time For Exam" class="form-control" name=""></td>
                    <td><input type="text" placeholder="Venue For Exam" class="form-control" name=""></td>
                  </tr>
                </tbody>
            </table>
          </div>
          <input type="submit" value="Add" class="btn btn-primary btn-block" name="">
                </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-8 col-lg-8 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>EXAMINATION TIME TABLE DETAILS</h6>
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
      while ($row = mysqli_fetch_array($query)) {
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
          <button class="btn btn-primary btn-block" onclick="printContent('printTimeTable')">Print</button>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>

  <!-- Report Button -->
   <?php
  if(isset($_GET['btnReport']))
  {
    $res = mysqli_query($connection, "SELECT * FROM timeTable");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-10 col-lg-10 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>USER REPORT</h6>
            </div>
            <div class='card-body'>
              <div class="container-fluid">
                <div class="row">
                  <!-- Total Students Script -->
               <?php
                 $query = "SELECT * FROM admin";
                 $select_all_admin = mysqli_query($connection,$query);
                 $totalAdmin = mysqli_num_rows($select_all_admin);
               ?>
                <!-- Total Students -->
            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">TOTAL NUMBER OF ADMIN</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalAdmin; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Employee Script -->
             <?php
             $query = "SELECT * FROM employees";
             $select_all_employees = mysqli_query($connection,$query);
             $totalEmployees = mysqli_num_rows($select_all_employees);
             ?>
            <!-- Total Employees -->
             <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">TOTAL NUMBER OF EMPLOYEES</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalEmployees; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
           $query = "SELECT * FROM sba_users";
           $select_all_sba_users = mysqli_query($connection,$query);
           $totalSBAUsers = mysqli_num_rows($select_all_sba_users);
         ?>
      <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">SBA USERS</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalSBAUsers; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Students Script -->
             <?php
               $query = "SELECT * FROM students";
               $select_all_students = mysqli_query($connection,$query);
               $totalStudents = mysqli_num_rows($select_all_students);
             ?>

            <!-- Total Students -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">TOTAL NUMBER OF STUDENTS</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h3 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalStudents; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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

  <!-- Generating Staff Details -->
  <?php
  if (isset($_GET['btnStaffDetail'])){
    $query = mysqli_query($connection, "SELECT * FROM employees");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-12 col-lg-12'>
          <div class='card shadow mb-4'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>EMPLOYEES DETAILS</h6>
            </div>
            <div class='card-body'>
              <form action="home.php" method="GET" class=" form-inline mr-auto ml-md-3  my-md-0  navbar-search">
                <div class="input-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <input name="txtSearchEmployee" type="text" class="form-control bg-light border-1 small" placeholder="Search by username, firstname, lastname or othername ..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button name="btnSearchEmployee" class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm">Search</i>
                    </button>
                  </div>
                </div>
              </form>
              <br><br>
              <div class='table-responsive'>
                <table class='table table-striped table-bordered table-hover table-condensed'>
                  <tr>
                    <th>USERNAME</th>
                      <th>GENDER</th>
                      <th>FIRST NAME</th>
                      <th>LAST NAME</th>
                      <th>OTHER NAME</th>
                      <th>DATE OF BIRTH</th>
                      <th>PHONE NUMBER</th>
                      <th>RESIDENTIAL ADDRESS</th>
                      <th>POSTAL ADDRESS</th>
                      <th>MARITAL STATUS</th>
                      <th>LEVEL OF EDUCATON</th>
                      <th>SKILL</th>
                      <th>POSITION</th>
                      <th>NEXT OF KIN</th>
                      <th>PHONE OF NEXT OF KIN</th>
                      <th>RELATION WITH NEXT OF KIN</th>
                      <th>SSNIT ID</th>
                      <th>NAME OF BANK</th>
                      <th>BRANCH OF BANK</th>
                      <th>ACCOUNT NUMBER</th>
                      <th>STARTING DATE</th>
                      <th>EMAIL ADDRESS</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($query)){
                      ?>
                        <tr>
                          <td><?php echo strtoupper($row['username']); ?></td>
                          <td><?php echo $row['gender']; ?></td>
                          <td><?php echo strtoupper($row['firstName']); ?></td>
                          <td><?php echo strtoupper($row['lastname']); ?></td>
                          <td><?php echo strtoupper($row['otherName']); ?></td>
                          <td><?php echo $row['birthdate']; ?></td>
                          <td><?php echo $row['phone']; ?></td>
                          <td><?php echo strtoupper($row['residentialAddress']); ?></td>
                          <td><?php echo strtoupper($row['postalAddress']); ?></td>
                          <td><?php echo $row['maritalStatus']; ?></td>
                          <td><?php echo strtoupper($row['levelofEducation']); ?></td>
                          <td><?php echo strtoupper($row['skill']); ?></td>
                          <td><?php echo strtoupper($row['position']); ?></td>
                          <td><?php echo strtoupper($row['nextofKin']); ?></td>
                          <td><?php echo strtoupper($row['phoneofNextofKin']); ?></td>
                          <td><?php echo $row['relationwithNextofKin']; ?></td>
                          <td><?php echo $row['ssnitID']; ?></td>
                          <td><?php echo strtoupper($row['bankName']); ?></td>
                          <td><?php echo strtoupper($row['bankBrach']); ?></td>
                          <td><?php echo strtoupper($row['accountNumber']); ?></td>
                          <td><?php echo $row['startingDate']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                        </tr>
                        <?php
                      }
                      ?>
                    </table>
                  </div>
                  <?php
                }
                ?>


  <!-- Generate Student Terminal Report -->
  <?php
  if (isset($_GET['btnResult'])) {
        ?>
      <div class='container-fluid'>
        <div class='row'>
         <div class='col-xl-3 col-lg-3 col-md-3'>
           <div class='card shadow mb-2'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>EXAMINATION REPORT</h6>
            </div>
            <div class='card-body'>
              <h5>GENERATE TERMINAL REPORT</h5>
              <p>To Generate Terminal Report For A Particular Student, Kindly enter His/Her Index Number <br></p>
              <hr>
              <form action='result.php' method='GET' class='user'>
                <div class='form-group'>
                  <input type='text' required="" class='form-control form-control-user' id='exampleLastName' placeholder='Enter Index Number' name='username' maxlength='30'>
                </div>
                <hr>
                <input type='submit' value='Search' class='btn btn-primary btn-user btn-block'>
                <br>
                <input type='reset' value='Cancel' class='btn btn-primary btn-user btn-block'>
                <hr>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
        <?php
      }
      ?>
      

  <!-- Fees Deatails -->
  <?php
  if (isset($_GET['btnFees'])){
    $query = mysqli_query($connection, "SELECT * FROM fees");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-8 col-lg-7'>
          <div class='card shadow mb-4'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>FEES DETAILS</h6>
            </div>
            <div class='card-body'>
              <form action="home.php" method="GET" class=" form-inline mr-auto  my-md-0  navbar-search">
                <div class="input-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <input required="" name="txtSearchFees" type="text" class="form-control bg-light border-1 small" placeholder="Search by username, firstname, lastname or othername ..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button name="btnSearchFees" class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm">Search</i>
                    </button>
                  </div>
                </div>
              </form><br><br>
              <div class='table-responsive'>
                <div id='printfees'>
                  <div class='table-responsive'>
                    <table border="1" width="100%" class='table table-striped table-bordered table-hover table-condensed'>
                      <tr>
                        <th>USERNAME</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>CLASS</th>
                        <th>EXISTING BALANCE</th>
                        <th>FEES FOR THE ACADEMIC YEAR</th>
                        <th>PAYMENT MADE</th>
                        <th>BALANCE CARRY FORWARD</th>
                      </tr>
                      <?php
                      while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                          <td><?php echo strtoupper($row['username']); ?></td>
                          <td><?php echo strtoupper($row['firstname']); ?></td>
                          <td><?php echo strtoupper($row['lastname']); ?></td>
                          <td><?php echo $row['class']; ?></td>
                          <td><?php echo strtoupper($row['existingBalance']); ?></td>
                          <td><?php echo strtoupper($row['feesForAcademicYear']); ?></td>
                          <td><?php echo $row['paymentMade']; ?></td>
                          <td><?php echo strtoupper($row['balanceCarryForward']); ?></td>
                        </tr>
                        <?php
                      }
                      ?>
                    </table>
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" onclick="printContent('printfees')">Print</button><?php
              }
              ?>

  <!-- Generating Details for All students in the in system -->
  <?php
  if (isset($_GET['btnStudentDetail'])){
    $query = mysqli_query($connection, "SELECT * FROM students");
    ?>
    <div class='container-fluid'>
      <div class='d-sm-flex align-items-center justify-content-between mb-4'>
        <h1 class='h3 mb-0 text-gray-800'></h1>
      </div>
      <div class='row'>
        <div class='col-xl-12 col-lg-12'>
          <div class='card shadow mb-4'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>STUDENT DETAILS</h6>
            </div>
            <div class='card-body'>
              <form action="home.php" method="GET" class=" form-inline mr-auto  my-md-0  navbar-search">
                <div class="input-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <input name="txtSearchStudent" required="" type="text" class="form-control bg-light border-1 small" placeholder="Search by username, firstname, lastname or othername ..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                      <button name="btnSearchStudent" class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm">Search</i>
                    </button>
                  </div>
                </div>
              </form>
                <br>
                <div class='table-responsive'>
                  <table class='table table-striped table-bordered table-hover table-condense'>
                  <tr>
                    <th> INDEX NUMBER </th>
                    <th> FIRST NAME </th>
                    <th> LAST NAME </th>
                    <th> OTHER NAME </th>
                    <th> GENDER </th>
                    <th> CLASS </th>
                    <th> DATE OF BIRTH </th>
                    <th> DURATION OF STUDY </th>
                    <th> DATE OF ENROLLMENT </th>
                    <th> GUARDIAN'S NAME </th>
                    <th> GUARDIAN'S OCCUPATION </th>
                    <th> GUARDIAN'S PHONE </th>
                    <th> RELATION WITH GUARDIAN </th>
                    <th> RESIDENTIAL ADDRESS </th>
                    <th> POSTAL ADDRESS </th>
                  </tr>
                  <?php
                  while ($row = mysqli_fetch_array($query)){
                    ?>
                    <div>
                      <tr>
                        <td><?php echo strtoupper($row['username']);?> </td>
                        <td><?php echo strtoupper($row['firstname']); ?></td>
                        <td><?php echo strtoupper($row['lastname']); ?></td>
                        <td><?php echo strtoupper($row['othername']); ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['birthdate']; ?></td>
                        <td><?php echo strtoupper($row['durationOfStudy']); ?></td>
                        <td><?php echo strtoupper($row['dateOfEnrollment']); ?></td>
                        <td><?php echo $row['guardianName']; ?></td>
                        <td><?php echo strtoupper($row['guardianOccupation']); ?></td>
                        <td><?php echo strtoupper($row['guardianPhone']); ?></td>
                        <td><?php echo strtoupper($row['relationWithGuardian']); ?></td>
                        <td><?php echo strtoupper($row['residentialAddress']); ?></td>
                        <td><?php echo strtoupper($row['postalAddress']); ?></td>
                     </tr>
                     <?php
                   }
                   ?>
                 </table></div>
                 <?php
               }
               ?>


  <!-- Search Staff -->
  <?php
  if(isset($_GET['btnSearchEmployee']))
  {
   $searchEmployee = $_GET['txtSearchEmployee'];
    $query = mysqli_query($connection, "SELECT * FROM employees WHERE username='$searchEmployee'");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>SEARCH STAFF</h6>
            </div>
            <div class='card-body'>
              <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <?php
                    if($row = mysqli_fetch_array($query)) {
                      ?>
                      <tbody>
                      <tr>
                        <th>Username</th>
                        <td><?php echo $row['username']; ?></td>
                      </tr>
                      <tr>
                        <th>Gender</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['gender']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>First Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['firstName']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Last Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['lastname']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Other Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['otherName']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Date of Birth</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['birthdate']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Telephone Number</th>
                        <td><input class="form-control" placeholder="<?php echo strtoupper($row['phone']); ?>" type="text" name=""></td>
                      </tr>
                      <tr>
                        <th>Residential Address</th>
                        <td><input class="form-control" placeholder="<?php echo strtoupper($row['residentialAddress']); ?>" type="text" name=""></td>
                      </tr>
                      <tr>
                        <th>Postal Address</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['postalAddress']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>MaritalStatus</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['maritalStatus']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Level of Education</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['levelofEducation']); ?>" name=""></td>
                      </tr>

                      <tr>
                        <th>Position</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['position']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Next of Kin</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['nextofKin']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Phone of Next of Kin</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['phoneofNextofKin']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Relation with Next of Kin</th>
                        <td><input class="form-control" placeholder="<?php echo strtoupper($row['relationwithNextofKin']); ?>" type="text" name=""></td>
                      </tr>
                      <tr>
                        <th>SSNIT Number</th>
                        <td><input class="form-control" placeholder="<?php echo strtoupper($row['ssnitID']); ?>" type="text" name=""></td>
                      </tr>
                      <tr>
                        <th>Name of Bank</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['bankName']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Branch of Bank</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['bankBrach']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Account Number</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['accountNumber']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Starting Date</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['startingDate']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['email']); ?>" name=""></td>
                      </tr>
                    </tbody>
                    
                  </table>
                  <button class="btn btn-block btn-primary">Update Info</button>
                  <?php
                    }
                    else
                   {
                    echo "No Result Found For the username Entered, checj and Try Again... ";
                  }
                    ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>


  <!-- Search Search Student Button -->
  <?php
  if(isset($_GET['btnSearchStudent']))
  {
    $searchStudent = $_GET['txtSearchStudent'];
    $query = mysqli_query($connection, "SELECT * FROM students WHERE username='$searchStudent'");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>SEARCH STUDENT</h6>
            </div>
            <div class='card-body'>
              <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <?php
                    if($row = mysqli_fetch_array($query)) {
                      ?>
                      <tbody>
                      <tr>
                        <th>Username</th>
                        <td><?php echo $row['username']; ?></td>
                      </tr>
                      <tr>
                        <th>Gender</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['gender']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>First Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['firstname']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Last Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['lastname']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Other Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['othername']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Class</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['class']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Residential Address</th>
                        <td><input class="form-control" placeholder="<?php echo strtoupper($row['residentialAddress']); ?>" type="text" name=""></td>
                      </tr>
                      <tr>
                        <th>Postal Address</th>
                        <td><input class="form-control" placeholder="<?php echo strtoupper($row['postalAddress']); ?>" type="text" name=""></td>
                      </tr>
                      <tr>
                        <th>Guardian's Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['guardianName']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Relation With Guardian</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['guardianOccupation']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Date of Admission</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['dateOfEnrollment']); ?>" name=""></td>
                      </tr>
                    </tbody>
                    
                  </table>
                  <button class="btn btn-block btn-primary">Update Info</button>
                  <?php
                    }
                    else
                   {
                    echo "No Result Found For the username Entered, checj and Try Again... ";
                  }
                    ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>


  <!-- Search Search Student Button -->
  <?php
  if(isset($_GET['btnSearchFees']))
  {
    $searchFees = $_GET['txtSearchFees'];
    $query = mysqli_query($connection, "SELECT * FROM fees WHERE username='$searchFees'");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-primary'>SEARCH STUDENT FEES</h6>
            </div>
            <div class='card-body'>
              <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <?php
                    if($row = mysqli_fetch_array($query)) {
                      ?>
                      <tbody>
                      <tr>
                        <th>Username</th>
                        <td><?php echo $row['username']; ?></td>
                      </tr>
                      <tr>
                        <th>Gender</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['gender']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>First Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['firstname']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Last Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['lastname']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Other Name</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['othername']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Class</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['class']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Existing Balance</th>
                        <td><input class="form-control" placeholder="<?php echo strtoupper($row['existingBalance']); ?>" type="text" name=""></td>
                      </tr>
                      <tr>
                        <th>Fees For Academic Year</th>
                        <td><input class="form-control" placeholder="<?php echo strtoupper($row['feesForAcademicYear']); ?>" type="text" name=""></td>
                      </tr>
                      <tr>
                        <th>Payment Made</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['paymentMade']); ?>" name=""></td>
                      </tr>
                      <tr>
                        <th>Balance Carry Forward</th>
                        <td><input type="text" class="form-control" placeholder="<?php echo strtoupper($row['balanceCarryForward']); ?>" name=""></td>
                      </tr>
                    </tbody>
                    
                  </table>
                  <button class="btn btn-block btn-primary">Update Info</button>
                  <?php
                    }
                    else
                   {
                    echo "No Result Found For the username Entered, checj and Try Again... ";
                  }
                    ?>
                </div>
            </div>
          </div>
        </div>
      </div>
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
              <h6 class='m-0 font-weight-bold text-primary'>CHANGE PASSWORD</h6>
            </div>
            <div class='card-body'>
              <h5>CREATING NEW PASSWORD</h5>
              <hr>
              <form action='home.php' method='GET' class='user'>
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
        </div>
      </div>
    </div>
    <?php

    if(isset($_GET['btnReset']))
    {
      if(isset($_POST['newPassword']) && isset($_POST['confirmPassword']))
      {
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $password_hash = md5($confirmPassword);

        if(strlen($newPassword) > 32 && strlen($confirmPassword) > 32)
        {
          echo "<script language='javascript' type='text/javascript'>
                  alert('maximum length exceeded.');
                  </script>";
        }else
        {
          if($newPassword != $confirmPassword)
          {
            echo "<script language='javascript' type='text/javascript'>
                  alert('Password do not match, please try again.');
                  </script>";
          }else
          {
            $query = mysqli_query($connection,"UPDATE admin SET password =' $password_hash' where username='$myuser'");
            if($query_run = mysqli_query($connection, $query))
            {
              echo "<script language='javascript' type='text/javascript'>
                  alert('Password has been Reset successfully');
                  </script>";
                }else
                {
                  echo "<script language='javascript' type='text/javascript'>
                  alert('Password Reset Failed. Please try again.');
                  </script>";
                }
          }
        }
      }
    }
  }
  ?>


  <!-- Registration Page -->
  <?php
  if (isset($_GET['btnRegister'])) {
        ?>

    <div class='container-fluid'>
        <div class='d-sm-flex align-items-center justify-content-between mb-4'>
            <h1 class='h3 mb-0 text-gray-800'></h1>
            
          </div>
        <div class='row'>
        <div class='col-xl-8 col-lg-7'>
              <div class='card shadow mb-4'>
              <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
                  <h6 class='m-0 font-weight-bold text-primary'>REGISTER PAGES</h6>
                  <div class='dropdown no-arrow'>
                  <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                      <i class='fas fa-ellipsis-v fa-sm fa-fw text-gray-400'></i>
                    </a>
                    <div class='dropdown-menu dropdown-menu-right shadow animated--fade-in' aria-labelledby='dropdownMenuLink'>
                      <div class='dropdown-header'>Select your Choice:</div>
                      <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='#'>print</a>
                      <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='#'>print preview</a>
                    </div>
                  </div>
                </div>
              <div class='card-body'>

                <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row One-->
          <div class="row">

          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">
                        <a href="">Admin</a>
                      </div>
                      <div class="row no-gutters align-items-center text-uppercase">
                        <div class="col">
                          <li class="nav-item active">
                  <a class="nav-link btn-primary font-weight-bold" style="border-radius: 20px;" href="../register/register.admin.php">
                    <i class="fas fa fa-arrow-circle-right"></i>
                    <span>register</span></a>
                </li>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">
                        <a href="">STAFF</a>
                      </div>
                      <div class="row no-gutters align-items-center text-uppercase">
                        <div class="col">
                          <li class="nav-item active">
                  <a class="nav-link btn-primary font-weight-bold" style="border-radius: 20px;" href="../register/register.staff.php">
                    <i class="fas fa fa-arrow-circle-right"></i>
                    <span>register</span></a>
                </li>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">
                        <a href="">SBA USERS</a>
                      </div>
                      <div class="row no-gutters align-items-center text-uppercase">
                        <div class="col">
                          <li class="nav-item active">
                  <a class="nav-link btn-primary font-weight-bold" style="border-radius: 20px;" href="../register/register.sba.php">
                    <i class="fas fa fa-arrow-circle-right"></i>
                    <span>register</span></a>
                </li>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">
                        <a href="">STUDENT</a>
                      </div>
                      <div class="row no-gutters align-items-center text-uppercase">
                        <div class="col">
                          <li class="nav-item active">
                  <a class="nav-link btn-primary font-weight-bold" style="border-radius: 20px;" href="../register/register.student.php">
                    <i class="fas fa fa-arrow-circle-right"></i>
                    <span>register</span></a>
                </li>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

  </div>

    <!-- Content Row Two-->
          <div class="row">

          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">
                        <a href="">TUITION FEE</a>
                      </div>
                      <div class="row no-gutters align-items-center text-uppercase">
                        <div class="col">
                          <li class="nav-item active">
                  <a class="nav-link btn-primary font-weight-bold" style="border-radius: 20px;" href="../register/register.fees.php">
                    <i class="fas fa fa-arrow-circle-right"></i>
                    <span>register</span></a>
                </li>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">
                        <a href="">Staff Login</a>
                      </div>
                      <div class="row no-gutters align-items-center text-uppercase">
                        <div class="col">
                          <li class="nav-item active">
                  <a class="nav-link btn-primary font-weight-bold" style="border-radius: 20px;" href="../staff/index.php">
                    <i class="fas fa fa-arrow-circle-right"></i>
                    <span>Login</span></a>
                </li>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">
                        <a href="">SBA Login</a>
                      </div>
                      <div class="row no-gutters align-items-center text-uppercase">
                        <div class="col">
                          <li class="nav-item active">
                  <a class="nav-link btn-primary font-weight-bold" style="border-radius: 20px;" href="../sba/index.php">
                    <i class="fas fa fa-arrow-circle-right"></i>
                    <span>Login</span></a>
                </li>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-30 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-mb font-weight-bold text-primary text-uppercase mb-1">
                        <a href="">Student</a>
                      </div>
                      <div class="row no-gutters align-items-center text-uppercase">
                        <div class="col">
                          <li class="nav-item active">
                  <a class="nav-link btn-primary font-weight-bold" style="border-radius: 20px;" href="../students/index.php">
                    <i class="fas fa fa-arrow-circle-right"></i>
                    <span>Login</span></a>
                </li>
                        </div>
                      </div>
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
