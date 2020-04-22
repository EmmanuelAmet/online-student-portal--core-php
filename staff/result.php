<?php

require '../dbConnection/connect.inc.php';

$class_Score = $_GET['class_score'];
$exam_Score = $_GET['exam_score'];
$indexNumber = $_GET['username'];
$class = $_GET['class'];

if($class_Score > 50)
{
	echo "<script language='javascript' type='text/javascript'>
				alert('The Class Score Must be 50 or less.');
				</script>";
	$total = '';
}
elseif ($exam_Score > 50)
{
	echo "<script language='javascript' type='text/javascript'>
				alert('The Exam Score Must be 50 or less.');
				</script>";
	$total = '';
}elseif ($class_Score > 50 && $exam_Score > 50) {
	echo "<script language='javascript' type='text/javascript'>
				alert('The Class Score and Exam Score Must be 50 or less.');
				</script>";
	$total = '';
}
else
{
	$total = $class_Score + $exam_Score;
}

	
if ($total > 80) {
	$remark = 'Highest';
	$grade = '1';
}elseif ($total > 70) {
	$remark = 'Higher';
	$grade = '2';
}
elseif ($total > 65) {
	$remark = 'High';
	$grade = '3';
}
elseif ($total > 60) {
	$remark = 'High Average';
	$grade = '4';
}
elseif ($total > 55) {
	$remark = 'Average';
	$grade = '5';
}
elseif ($total > '50') {
	$remark = 'Low Average';
	$grade = '6';
}
elseif ($total > 45) {
	$remark = 'Low';
	$grade = '7';
}
elseif ($total == '35') {
	$remark = 'Lower';
	$grade = '8';
	$total = '';
}
elseif ($total == '') {
	$remark = '';
	$grade = '';
	$total = '';
}
else
{
	$grade = '9';
	$remark = 'Lowest';
}

//require 'core.inc.sba.php';

// $class = getuserfield('class');
// $subject = getuserfield('subject');

//<?php echo $subject 



require '../dbConnection/core.inc.php';

$subject = $_SESSION['subject'];

if( isset($_POST['indexNumber']) && 
	isset($_POST['class']) && 
	isset($_POST['subject']) && 
	isset($_POST['class_Score']) && 
	isset($_POST['exam_Score']) &&
	isset($_POST['total']) &&
	isset($_POST['remark']) &&
	isset($_POST['grade']))
{
	$indexNumber = $_POST['indexNumber'];
	$class = $_POST['class'];
	$class_Score = $_POST['class_Score'];
	$exam_Score = $_POST['exam_Score'];
	$total = $_POST['total'];
	$subject = $_POST['subject'];
	$remark = $_POST['remark'];
	$grade = $_POST['grade'];


	if(!empty($indexNumber) && !empty($subject) && !empty($remark) && !empty($class_Score) && !empty($exam_Score) && !empty($total) && !empty($grade) && !empty($class))
	{
		if(strlen($indexNumber) > 30)
		{
			//echo 'Please ahear to maximum length of fields.';
			echo "<script language='javascript' type='text/javascript'>
				alert('Please ahear to maximum length of fields.');
				</script>";
		}
		else
		{
			if($class_Score > 50 || $exam_Score > 50)
		{
			//echo 'Password do not match.';
			echo "<script language='javascript' type='text/javascript'>
				alert('Class Score or Exam Score must not be greater than 50.);
				</script>";
		}
		else
		{
			$query = "SELECT `indexNumber` FROM `$subject` WHERE `indexNumber` = '$indexNumber'";
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
				$query = "INSERT INTO `$subject` VALUES('', '".mysqli_real_escape_string($connection, $indexNumber)."', '".mysqli_real_escape_string($connection,$class)."', '".mysqli_real_escape_string($connection,$class_Score)."', '".mysqli_real_escape_string($connection,$exam_Score)."', '".mysqli_real_escape_string($connection,$total)."' , '".mysqli_real_escape_string($connection,$grade)."' ,'".mysqli_real_escape_string($connection,$remark)."')";

				if($query_run = mysqli_query($connection, $query))
				{
					echo "<script language='javascript' type='text/javascript'>
							alert('$indexNumber result entered successfully');
							</script>";
					//header('Location: index.sba.php');
				}
				else
				{
					//echo 'Registration Failed. Try again later.';
					echo "<script language='javascript' type='text/javascript'>
							alert('Failed. Try again.');
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

	<title>Portal - SBA</title>

	  <!-- Bootstrap styles for this project-->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-gradient-danger">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5" style="border-bottom-right-radius: 200px; border-top-left-radius: 200px;">
      <div class="card-body p-0">
      	 
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-2 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">SCHOOL BASE ASSESSMENT </h1>
              </div>
              <div class="">
	<center>
	<form action="result.php" method="POST" class="user">
		<div class="table-responsive">
			<table border=1>
		<tr>
		<td>
			<table  width=100%>
			<tr>
				<td>
					<img src='../images/ucclogo.jpg' width=80 height=80>
				</td>
				<td>
          <b><font size='5'>Mystic Falls International School</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><br>
          <font size='4' color='grey'><b>Student Terminal Report (Email: info@MysticFalls.com)</b></font>
        </td>
			</tr>
			</table>
		</td>
		</tr>
		<tr>
		<td>
			<table>
				<tr><td><font size='4'>
					<input type="text" required="" class="form-control form-control-user disabled" name="indexNumber" maxlength="30" value="<?php if(isset($indexNumber)){echo($indexNumber);} ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"";?></font></td></tr>
				<tr><td><font size='4'>
					<input type="text" required="" class="form-control form-control-user disabled" name="class" maxlength="30" value="<?php if(isset($class)){echo($class);} ?>"></font></td></tr>
			</table>
		</td>
		</tr>
		<tr>
		<td>
			<table width="100%" class="table table-bordered table-hover table-condense" >
				<tr><th><i>Subject</i></th><th><i>Class Score 50%</i></th><th><i>Exam Score 50%</i></th><th><i>Total marks 100%</i></th><th><i>Grade</i></th><th><i>Remark</i></th></tr>
				<tr><td>
					<input type="text" required="" class="form-control form-control-user disabled" name="subject" maxlength="30" value="<?php if(isset($subject)){echo($subject);} ?>">
				</td>
				<td>
					<input type="number" required="" class="form-control form-control-user disabled" name="class_Score" maxlength="2" value="<?php if(isset($class_Score)){echo($class_Score);} ?>">
				</td>
				<td><input type="number" required="" class="form-control form-control-user disabled" name="exam_Score" maxlength="2" value="<?php if(isset($exam_Score)){echo($exam_Score);} ?>">
				</td>
				<td><input type="number" required="" class="form-control form-control-user disabled" name="total" maxlength="3" value="<?php if(isset($total)){echo($total);} ?>">
				</td>
				<td><input type="text" required="" class="form-control form-control-user disabled" name="grade" maxlength="1" value="<?php if(isset($grade)){echo($grade);} ?>"></td><td><input type="text" class="form-control form-control-user" name="remark" maxlength="30" value="<?php if(isset($remark)){echo($remark);} ?>"></td></tr>
			</table>
		</td>
		</tr>
	</table>
	
		</div><hr>  
					<input type='submit' value='Save' class='btn btn-danger btn-user btn-block'><br>
					<a href="home.php" class="btn btn-danger btn-user btn-block">Back to Home</a>
					 <hr>
	</form>

</center>

</div>
</div>
</body>
</html>