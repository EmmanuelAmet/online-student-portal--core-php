<?php

session_start();

require '../dbConnection/connect.inc.php';

if(isset($_POST['Login']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_hash = md5($_POST['password']);

	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password_hash);

	$query = "SELECT * FROM admin WHERE username = '{$username}' ";
	$result = mysqli_query($connection, $query);

	if(!$result)
	{
		die('QUERY FAILED'.mysqli_error($connection));
	}

	while ($row = mysqli_fetch_array($result)) {
		 $db_username = $row['username'];
		 $db_password = $row['password'];
		 $db_firstname = $row['firstname'];
		 $db_lastname = $row['lastname'];
	}

	if($username != $db_username|| $password != $db_password)
	{
		header('Location: error.php');
	}elseif ($username == $db_username && $password == $db_password) {

		$_SESSION['username'] = $db_username;
		$_SESSION['firstname'] = $db_firstname;
		$_SESSION['lastname'] = $db_lastname;

		header('Location: home.php');
	}else{

	}
}

?>