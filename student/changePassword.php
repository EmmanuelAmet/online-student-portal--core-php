<?php

session_start();
require '../dbConnection/connect.inc.php';

$myuser = $_SESSION['username'];

if(isset($_POST['btnChangeUserPassword']))
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
            $query = mysqli_query($connection,"UPDATE `students` SET `password` = '$password_hash' WHERE `username`='$myuser'");
            $query_run = mysqli_query($connection, $query);
            if($query_run == 1)
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
    }else{
    	header('Location: home.php');
    }






?>