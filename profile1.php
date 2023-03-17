<?php
 session_start();
include_once('connection1.php');

// for deleting user
if(isset($_GET['email']))
{
   
    $Email=$_GET['email'];
    $user=$_SESSION['artistname'];
    
$msg=mysqli_query($conn,"SELECT * FROM hire WHERE c_email  ='$Email'");
if($msg)
{
    $suject = "Email send via php using localhost";
    $body = "Hi, $Email Your request is confirmed.Now you can hire.
    This email send from $user.";
    $sender ="From:tharushinishekadesilva@gmail.com";

    if(mail($Email,$suject,$body,$sender)){
      
       echo "<script>alert('Email sent succesfully to $Email')</script>";
       echo "<script type='text/javascript'> document.location = 'manage_hire.php'; </script>";
    }
  
  else
  {
   echo "<script>alert('Recheck your Email sent succesfully to $Email')</script>";
   echo "<script type='text/javascript'> document.location = 'manage_hire.php'; </script>";
  }
}
}

   
?>