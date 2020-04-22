<?php
require '../dbConnection/connect.inc.php';
require '../dbConnection/core.inc.php';

if(login())
{
  $myuser = $_SESSION['username'];
  ?>
  <div id="wrapper">
  <div class="sidebar sidebar-dark bg-warning">

    <form action="home.php" method="GET">
      <li class="nav-item action">
       
        <center>
          <img src="../images/ucclogo.jpg" class="img-responsive img-thumbnail" width="90" height="70">
        </center>
         <small class="nav-link text-center font-weight-bold">STUDENT DASHBOARD</small>
      </li>
      <li class="nav-item active">
        <hr>
        <button type="submit" name="btnService" class="btn nav-link bg-gradient-warning ">SERVICE INFO</button>

        <button type="submit" name="btnPersonalDetail" class="btn nav-link bg-gradient-warning ">PERSONAL INFO</button>

        <button type="submit" name="btnVerifyDetail" class="btn nav-link bg-gradient-warning ">VERIFY DETAILS</button>

        <button type="submit" name="btnResult" class="btn nav-link bg-gradient-warning ">STATEMENT OF RESULTS</button>

        <button type="submit" name="btnTimeTable" class="btn nav-link bg-gradient-warning ">TIME TABLE</button>

        <button type="submit" name="btnFees" class="btn nav-link bg-gradient-warning ">FEES</button>

        <button type="submit" name="btnChangePassword" class="btn nav-link bg-gradient-warning ">CHANGE PASSWORD</button>

        <button type="submit" name="btnLogout" class="btn nav-link bg-gradient-warning ">LOGOUT</button>
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
              <h6 class='m-0 font-weight-bold text-warning'>SERVICE INFORMATION</h6>
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
              <h6 class='m-0 font-weight-bold text-warning'>SERVICE INFORMATION</h6>
            </div>
            <div class='card-body'>
              <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        </div>
              <div class="modal-body">Select "Logout" below if you are ready to logout your account.</div>
        <div class="modal-footer">
          <a class="btn btn-warning" href="home.php">Cancel</a>
          <a class="btn btn-warning" href="logout.php">Logout</a>
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
              <h6 class='m-0 font-weight-bold text-warning'>CHANGE PASSWORD</h6>
            </div>
            <div class='card-body'>
              <h5>CREATING NEW PASSWORD</h5>
              <hr>
              <form action='changePassword.php' method='POST' class='user'>
                <div class="form-group">
                  <input type='password' required="" class='form-control form-control-user' id='exampleLastName' placeholder='Enter New Password' name='newPassword' maxlength='30'>
                </div>
                <div class="form-group">
                  <input type='password' required="" class='form-control form-control-user' id='exampleLastName' placeholder='Confirm Passwords' name='confirmPassword' maxlength='30'>
                </div>
                <hr>
                <input type="submit" name="btnChangeUserPassword" class="btn btn-warning btn-user btn-block" value="Submit">
                <br>
                <input type='reset' value='Cancel' class='btn btn-warning btn-user btn-block'>
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

<!-- Personal Information Button -->
  <?php
  if(isset($_GET['btnPersonalDetail']))
  {
    $query = mysqli_query($connection, "SELECT * FROM students WHERE username='$myuser'");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-warning'>PERSONAL INFORMATION</h6>
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
                        <th>Username</th>
                        <td><?php echo $row['username']; ?></td>
                      </tr>
                      <tr>
                        <th>Gender</th>
                        <td><?php echo strtoupper($row['gender']); ?></td>
                      </tr>
                      <tr>
                        <th>First Name</th>
                        <td><?php echo strtoupper($row['firstname']); ?></td>
                      </tr>
                      <tr>
                        <th>Last Name</th>
                        <td><?php echo strtoupper($row['lastname']); ?></td>
                      </tr>
                      <tr>
                        <th>Other Name</th>
                        <td><?php echo strtoupper($row['othername']); ?></td>
                      </tr>
                      <tr>
                        <th>Class</th>
                        <td><?php echo strtoupper($row['class']); ?></td>
                      </tr>
                      <tr>
                        <th>Residential Address</th>
                        <td><?php echo strtoupper($row['residentialAddress']); ?></td>
                      </tr>
                      <tr>
                        <th>Postal Address</th>
                        <td> <?php echo strtoupper($row['postalAddress']); ?></td>
                      </tr>
                      <tr>
                        <th>Guardian's Name</th>
                        <td><?php echo strtoupper($row['guardianName']); ?></td>
                      </tr>
                      <tr>
                        <th>Relation With Guardian</th>
                        <td><?php echo strtoupper($row['guardianOccupation']); ?></td>
                      </tr>
                      <tr>
                        <th>Date of Admission</th>
                        <td><?php echo strtoupper($row['dateOfEnrollment']); ?></td>
                      </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                  </table>
                  <!-- <form action="ho.php" method="GET">
                    <button name="btnUpdatePersonalDetails" class="btn btn-block btn-warning">Update Info</button>
                  </form> -->
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
    $query = mysqli_query($connection, "SELECT * FROM students WHERE username='$myuser'");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-lg-6 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-warning'>VERIFY INFORMATION</h6>
            </div>
            <div class='card-body'>
              <div class="">
                <div class="table-responsive">
                  <div id="printPersonalDetails">
                    <table border="1" class="table table-bordered table-hover table-striped">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                      ?>
                      <tbody>
                      <tr>
                        <th>USERNAME</th>
                        <td><?php echo $row['username']; ?></td>
                      </tr>
                      <tr>
                        <th>GENDER</th>
                        <td><?php echo strtoupper($row['gender']); ?></td>
                      </tr>
                      <tr>
                        <th>FIRST NAME</th>
                        <td><?php echo strtoupper($row['firstname']); ?></td>
                      </tr>
                      <tr>
                        <th>LAST NAME</th>
                        <td><?php echo strtoupper($row['lastname']); ?></td>
                      </tr>
                      <tr>
                        <th>OTHER NAME</th>
                        <td><?php echo strtoupper($row['othername']); ?></td>
                      </tr>
                      <tr>
                        <th>CLASS</th>
                        <td><?php echo strtoupper($row['class']); ?></td>
                      </tr>
                      <tr>
                        <th>RESIDENTIAL ADDRESS</th>
                        <td><?php echo strtoupper($row['residentialAddress']); ?></td>
                      </tr>
                      <tr>
                        <th>POSTAL ADDRESS</th>
                        <td><?php echo strtoupper($row['postalAddress']); ?></td>
                      </tr>
                      <tr>
                        <th>GUARDIAN'S NAME</th>
                        <td><?php echo strtoupper($row['guardianName']); ?></td>
                      </tr>
                      <tr>
                        <th>RELATION WITH GUARDIAN</th>
                        <td><?php echo strtoupper($row['guardianOccupation']); ?></td>
                      </tr>
                      <tr>
                        <th>DATE OF ENROLLMENT</th>
                        <td><?php echo strtoupper($row['dateOfEnrollment']); ?></td>
                      </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                  </table>
                  </div>
                  <form action="home.php" method="GET">
                    <button type="submit" name="btnVerify" class="btn btn-block btn-warning">VERIFY INFO</button>
                  </form>
                  <button class="btn btn-block btn-warning" onclick="printContent('printPersonalDetails')">PRINT</button>

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
              <h6 class='m-0 font-weight-bold text-warning'>VERIFY PERONAL INFORMATION</h6>
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
  if(isset($_GET['btnResult']))
  {
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-8 col-lg-8 col-sm-12'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-warning'>STATEMENT OF RESULT</h6>
            </div>
            <div class='card-body'>
              <?php
$query = "SELECT * FROM mathematics WHERE username = '{$myuser}' ";
  $result = mysqli_query($connection, $query);

if($result == false)
     {
      
     }else
     {
     $row = mysqli_fetch_array($result);
     $mathsClass = $row['ClassScore'];
     $mathsExam = $row['ExamScore'];
     $mathsTotal = $row['TotalScore'];
     $mathsGrade = $row['Grade'];
     $mathsRemark = $row['Remark'];

     if($row['ClassScore'] == '' || $row['ExamScore'] == '' )
      {
        $mathsClass = "IC";
        $mathsExam = 'IC';
        $mathsGrade = 'IC';
        $mathsTotal = 'IC';
        $mathsRemark = 'IC';
      }

  
     }

  
  $query = "SELECT * FROM english WHERE username = '{$myuser}' ";
  $result = mysqli_query($connection, $query);
  if($result == false)
  {

  }else
  {
     $row = mysqli_fetch_array($result);
     $EnglishClass = $row['ClassScore'];
     $EnglishExam = $row['ExamScore'];
     $EnglishTotal = $row['TotalScore'];
     $EnglishGrade = $row['Grade'];
     $EnglishRemark = $row['Remark'];
  }
  if($row['ClassScore'] == '' || $row['ExamScore'] == '' )
  {
    $EnglishClass = "IC";
    $EnglishExam = 'IC';
    $EnglishGrade = 'IC';
    $EnglishTotal = 'IC';
    $EnglishRemark = 'IC';
  }


  $query = "SELECT * FROM social WHERE username = '{$myuser}' ";
  $result = mysqli_query($connection, $query);
  if($result == false)
  {

  }else
  {
     $row = mysqli_fetch_array($result);
     $SocialClass = $row['ClassScore'];
     $SocialExam = $row['ExamScore'];
     $SocialTotal = $row['TotalScore'];
     $SocialGrade = $row['Grade'];
     $SocialRemark = $row['Remark'];
  }
  
  if($row['ClassScore'] == '' || $row['ExamScore'] == '' )
  {
    $SocialClass = "IC";
    $SocialExam = 'IC';
    $SocialGrade = 'IC';
    $SocialTotal = 'IC';
    $SocialRemark = 'IC';
  }

  $query = "SELECT * FROM science WHERE username = '{$myuser}' ";
  $result = mysqli_query($connection, $query);
  if($result == false)
  {

  }else
  {
    $row = mysqli_fetch_array($result);
     $ScienceClass = $row['ClassScore'];
     $ScienceExam = $row['ExamScore'];
     $ScienceTotal = $row['TotalScore'];
     $ScienceGrade = $row['Grade'];
     $ScienceRemark = $row['Remark'];
  }
  
     
    if($row['ClassScore'] == '' || $row['ExamScore'] == '' )
  {
    $ScienceClass = "IC";
    $ScienceExam = 'IC';
    $ScienceGrade = 'IC';
    $ScienceTotal = 'IC';
    $ScienceRemark = 'IC';
  }

  
  $query = "SELECT * FROM rme WHERE username = '{$myuser}' ";
  $result = mysqli_query($connection, $query);

  if($result == false)
  {

  }else
  {
    $row = mysqli_fetch_array($result);
     $RMEClass = $row['ClassScore'];
     $RMEExam = $row['ExamScore'];
     $RMETotal = $row['TotalScore'];
     $RMEGrade = $row['Grade'];
     $RMERemark = $row['Remark'];
  }

  if($row['ClassScore'] == '' || $row['ExamScore'] == '' )
  {
    $RMEClass = 'IC';
    $RMEExam = 'IC';
    $RMEGrade = 'IC';
    $RMETotal = 'IC';
    $RMERemark = 'IC';
  }
  
  $query = "SELECT * FROM ict WHERE username = '{$myuser}' ";
  $result = mysqli_query($connection, $query);

  if($result == false)
  {

  }else
  {
    $row = mysqli_fetch_array($result);
     $ICTClass = $row['ClassScore'];
     $ICTExam = $row['ExamScore'];
     $ICTTotal = $row['TotalScore'];
     $ICTGrade = $row['Grade'];
     $ICTRemark = $row['Remark'];
  }
  
  if($row['ClassScore'] == '' || $row['ExamScore'] == '' )
  {
    $ICTClass = 'IC';
    $ICTExam = 'IC';
    $ICTGrade = 'IC';
    $ICTTotal = 'IC';
    $ICTRemark = 'IC';
  }
  
  $query = "SELECT * FROM bdt WHERE username = '{$myuser}' ";
  $result = mysqli_query($connection, $query);

  if($result == false)
  {

  }else
  {
    $row = mysqli_fetch_array($result);
     $BDTClass = $row['ClassScore'];
     $BDTExam = $row['ExamScore'];
     $BDTTotal = $row['TotalScore'];
     $BDTGrade = $row['Grade'];
     $BDTRemark = $row['Remark'];
  }
  
  if($row['ClassScore'] == '' || $row['ExamScore'] == '' )
  {
    $BDTClass = 'IC';
    $BDTExam = 'IC';
    $BDTGrade = 'IC';
    $BDTTotal = 'IC';
    $BDTRemark = 'IC';
  }

  $query = "SELECT * FROM GhanaianLanguage WHERE username = '{$myuser}' ";
  $result = mysqli_query($connection, $query);

  if($result == false)
  {

  }else
  {
     $row = mysqli_fetch_array($result);
     $GHLanguageClass = $row['ClassScore'];
     $GHLanguageExam = $row['ExamScore'];
     $GHLanguageTotal = $row['TotalScore'];
     $GHLanguageGrade = $row['Grade'];
     $GHLanguageRemark = $row['Remark'];
  }  
  
  if($row['ClassScore'] == '' || $row['ExamScore'] == '' )
  {
    $GHLanguageClass = 'IC';
    $GHLanguageExam = 'IC';
    $GHLanguageGrade = 'IC';
    $GHLanguageTotal = 'IC';
    $GHLanguageRemark = 'IC';
  }

  $query = "SELECT * FROM french WHERE username = '{$myuser}' ";
  $result = mysqli_query($connection, $query);

  if($result == false)
  {

  }else
  {
    $row = mysqli_fetch_array($result);
     $FrenchClass = $row['ClassScore'];
     $FrenchExam = $row['ExamScore'];
     $FrenchTotal = $row['TotalScore'];
     $FrenchGrade = $row['Grade'];
     $FrenchRemark = $row['Remark'];
  }
  
     
  
  if($row['ClassScore'] == '' || $row['ExamScore'] == '' )
  {
    $FrenchClass = 'IC';
    $FrenchExam = 'IC';
    $FrenchGrade = 'IC';
    $FrenchTotal = 'IC';
    $FrenchRemark = 'IC';
  }
  
  if(!empty($ScienceClass) && !empty($ScienceExam))
  {
    $coreSubjects = "";
  }else{
       $coreSubjects = $mathsGrade + $EnglishGrade + $SocialGrade + $ScienceGrade;

  }

  if($mathsClass == 'IC' || $ScienceClass == 'IC')
  {
    $rawScore = '';
  }else
  {
       $rawScore = $mathsTotal + $SocialTotal + $EnglishTotal + $ScienceTotal + $RMETotal + $ICTTotal + $BDTTotal + $GHLanguageTotal + $FrenchTotal;

  }

   //$electives = array('$FrenchGrade', '$GHLanguageGrade', '$BDTGrade', '$ICTGrade', '$RMEGrade');
   // $first = max($electives);
   // $second = min($electives);
                      
  
?>
  <div id="result">
    <center>
  <div class="table-responsive">
    <table border="1">
    <tr>
    <td>
      <table  width=100%>
      <tr>
        <td>
          <img src='../images/ucclogo.jpg' width=80 height=70>
        </td>
        <td>
          <b><font size='5'>PATROVA INTERNATIONAL SCHOOL</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><br><br>
          <font size='4' color='grey'><b>Student Terminal Report(Post: P.O BOX OS 1537, ACCRA-OSU)</b></font>
        </td>
      </tr>
      </table>
    </td>
    </tr>
    <tr>
    <td>
      <table>
        <tr><td><font size='4'>NAME OF <br>STUDENT: <?php echo strtoupper($_SESSION['firstname']); echo " "; echo strtoupper($_SESSION['lastname']); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INDEX NUMBER: <?php echo "$myuser"; ?></font></td></tr>
        <tr><td><font size='4'>CLASS: FORM 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TERM: 3</font></td></tr>
      </table>
    </td>
    </tr>
    <tr>
    <td>
      <table width="100%" class="table table-bordered table-hover table-condense">
        <tr><th><i>Subjects</i></th><th><i>Class score 50%</i></th><th><i>Exam Score 50%</i></th><th><i>Total Score 100%</i></th><th><i>Grade</i></th><th><i>Remark</i></th></tr>
        <td style="background-color: #DCDCDC;" colspan=6><div class='text-danger'><B>&nbsp;CORE</B></div></td>
        <tr><td>&nbsp;English Language</td><td align="center"><?php echo "$EnglishClass"; ?></td><td align="center"><?php echo "$EnglishExam"; ?></td><td align="center"><?php echo "$EnglishTotal"; ?></td><td align="center"><?php echo "$EnglishGrade"; ?></td><td><?php echo "$EnglishRemark"; ?></td></tr>
        <tr><td>&nbsp;Integrated Science</td><td align="center"><?php echo "$ScienceClass"; ?></td><td align="center"><?php echo "$ScienceExam"; ?></td><td align="center"><?php echo "$ScienceTotal"; ?></td><td align="center"><?php echo "$ScienceGrade"; ?></td><td><?php echo "$ScienceRemark"; ?></td></tr>
        <tr><td>&nbsp;Mathematics</td><td align="center"><?php echo "$mathsClass"; ?></td><td align="center"><?php echo "$mathsExam"; ?></td><td align="center"><?php echo "$mathsTotal"; ?></td><td align="center"><?php echo "$mathsGrade"; ?></td><td><?php echo "$mathsRemark"; ?></td></tr>
        <tr><td>&nbsp;Social Studies</td><td align="center"><?php echo "$SocialClass"; ?></td><td align="center"><?php echo "$SocialExam"; ?></td><td align="center"><?php echo "$SocialTotal"; ?></td><td align="center"><?php echo "$SocialGrade"; ?></td><td><?php echo "$SocialRemark"; ?></td></tr>
        <td style="background-color: #DCDCDC;" colspan=6><div class='text-danger'><B>&nbsp;ELECTIVES</B></div></td>
        <tr><td>&nbsp;I.C.T</td><td align="center"><?php echo "$ICTClass"; ?></td><td align="center"><?php echo "$ICTExam"; ?></td><td align="center"><?php echo "$ICTTotal"; ?></td><td align="center"><?php echo "$ICTGrade"; ?></td><td><?php echo "$ICTRemark"; ?></td></tr>
        <tr><td>&nbsp;B.D.T</td><td align="center"><?php echo "$BDTClass"; ?></td><td align="center"><?php echo "$BDTExam"; ?></td><td align="center"><?php echo "$BDTTotal"; ?></td><td align="center"><?php echo "$BDTGrade"; ?></td><td><?php echo "$BDTRemark"; ?></td></tr>
        <tr><td>&nbsp;R.M.E</td><td align="center"><?php echo "$RMEClass"; ?></td><td align="center"><?php echo "$RMEExam"; ?></td><td align="center"><?php echo "$RMETotal"; ?></td><td align="center"><?php echo "$RMEGrade"; ?></td><td><?php echo "$RMERemark"; ?></td></tr>
        <tr><td>&nbsp;Ghanaian Language</td><td align="center"><?php echo "$GHLanguageClass"; ?></td><td align="center"><?php echo "$GHLanguageExam"; ?></td><td align="center"><?php echo "$GHLanguageTotal"; ?></td><td align="center"><?php echo "$GHLanguageGrade"; ?></td><td><?php echo "$GHLanguageRemark"; ?></td></tr>
        <tr><td>&nbsp;French</td><td align="center"><?php echo "$FrenchClass"; ?></td><td align="center"><?php echo "$FrenchExam"; ?></td><td align="center"><?php echo "$FrenchTotal"; ?></td><td align="center"><?php echo "$FrenchGrade"; ?></td><td><?php echo "$FrenchRemark"; ?></td></tr>

      </table>
    </td>
    </tr>

    <tr>
    <td>
      <table border="" width="100%" class="table-hover">
        <tr class="warning"><td>&nbsp;ATTENDANCE</td><td>&nbsp;56 OUT OF 60</td><td>&nbsp;TOTAL SCORE: &nbsp; <?php echo "$rawScore/900"; ?></td></tr>
        <tr><td>&nbsp;STATUS</td><td colspan=3>&nbsp;PROMOTED</td></tr>
        <tr><td>&nbsp;CONDUCT</td><td colspan=3>&nbsp;HONEST</td></tr>
        <tr><td>&nbsp;ATTITUDE</td><td colspan=3>&nbsp;SOCIABLE</td></tr>
        <tr><td>&nbsp;INTEREST</td><td colspan=3>&nbsp;SPORTS AND GAME</td></tr>
        <tr><td>&nbsp;REMARK</td><td colspan=3>&nbsp;STUDY YOUR GRADES AND IMPROVE UPON THE WEAK ONES.</td></tr>
      </table><br>
      <table border="1" width="50%" class="table-borderd table-hover">
        <tr><td align="center"><b>GRADING CODE</b></td><td align="center"><b>GRADE</b></td><td><b>&nbsp;REMARK</b></td></tr>
        <tr><td align="center">80 - 100</td><td align="center">1</td><td>&nbsp;Highest</td></tr>
        <tr><td align="center">70 - 79</td><td align="center">2</td><td>&nbsp;Higher</td></tr>
        <tr><td align="center">65 - 69</td><td align="center">3</td><td>&nbsp;High</td></tr>
        <tr><td align="center">60 - 64</td><td align="center">4</td><td>&nbsp;High Average</td></tr>
        <tr><td align="center">55 - 59</td><td align="center">5</td><td>&nbsp;Average</td></tr>
        <tr><td align="center">50 - 54</td><td align="center">6</td><td>&nbsp;Low Average</td></tr>
        <tr><td align="center">45 - 49</td><td align="center">7</td><td>&nbsp;Low</td></tr>
        <tr><td align="center">35 - 44</td><td align="center">8</td><td>&nbsp;Lower</td></tr>
        <tr><td align="center">00 - 34</td><td align="center">9</td><td>&nbsp;Lowest</td></tr>
      </table>
      <font size='3' color='blue'><I><b>ANY ALTRATION TO THIS DOCUMENT RENDERS IT INVALID.</b></I></font><br>
      <font size='3' color='green'><I><b>DATE & TIME PRINTED: 34/09/2019 TIME: 10:30</b></I></font><br>
      <font size='3' color='orange'><I><b>POWERED BY CYPHER SOFTWARE. For more info. call: +233 546501162/+233 247101346</b></I></font>
    </td>
    </tr>
  </table>
  </div>
</center>
  </div>
  <br>
  <center>
    <button class="btn btn-warning btn-block " onclick="printContent('result')">Print</button>
  </center>
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
              <h6 class='m-0 font-weight-bold text-warning'>EXAMINATION TIME TABLE</h6>
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
          <button class="btn btn-warning btn-block" onclick="printContent('printTimeTable')">Print</button>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>


  <!-- Fees Button -->
  <?php
  if(isset($_GET['btnFees']))
  {
    $query = mysqli_query($connection, "SELECT * FROM fees WHERE username='$myuser'");
    ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xl-6 col-md-8 col-lg-6 col-sm-8'>
          <div class='card shadow mb-5'>
            <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
              <h6 class='m-0 font-weight-bold text-warning'>FEES</h6>
            </div>
            <div class='card-body'>
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <?php
                  if($row = mysqli_fetch_array($query))
                  {
                    ?>
                    <tbody>
                      <tr>
                        <th>Firstname</th>
                        <td><?php echo $_SESSION['firstname']; ?></td>
                      </tr>
                      <tr>
                        <th>Lastname</th>
                        <td><?php echo $_SESSION['lastname']; ?></td>
                      </tr>
                    <tr>
                      <th>Username</th>
                      <td><?php echo $row['username']; ?></td>
                    </tr>
                    <tr>
                      <th>Payment Made</th>
                      <td><?php echo $row['paymentMade']; ?></td>
                    </tr>
                    <tr>
                      <th>Existing Balance</th>
                      <td><?php echo $row['existingBalance']; ?></td>
                    </tr>
                    <tr>
                      <th>Fees For This Academic Year</th>
                      <td><?php echo $row['feesForAcademicYear']; ?></td>
                    </tr>
                    <tr>
                      <th>Balance Carry Forward</th>
                      <?php  $moneyCarry = $row['feesForAcademicYear'] - $row['paymentMade'] ?>
                      <td><?php echo $moneyCarry; ?></td>
                    </tr>
                  </tbody>
                  <?php
                  }
                  ?>
                </table>
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
