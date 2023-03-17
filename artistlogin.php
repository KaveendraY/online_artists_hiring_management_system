<?php session_start(); 
include_once('connection1.php');
// Code for login 
if(isset($_POST['btn']))
{
  $email=$_POST['email'];
  $pass=md5($_POST['pass']);
  
$ret=mysqli_query($conn,"SELECT * FROM artist WHERE Email='$email' and password='$pass'");

$num=mysqli_fetch_array($ret);
$status=$num['status'];

$ret2=mysqli_query($conn,"SELECT * FROM artist WHERE Email='$email' and password='$pass'");
$check_user=mysqli_num_rows($ret2);
if($check_user>0)
{

$_SESSION['btn']=$_POST['email'];
$_SESSION['artistid']=$num['Ar_id'];
$_SESSION['artistname']=$num['username'];
$_SESSION['status']=$num['status'];


if($status=="approved"){
  echo '<script type  = "text/javascript">';
  echo 'alert("Login Success!");';
  echo 'window.location.href = "artistdash.php"';
  echo '</script>';
}
elseif($status=="pending"){
  echo '<script type  = "text/javascript">';
  echo 'alert("Your account is still pending for approval!");';
  echo 'window.location.href = "artistlogin.php"';
  echo '</script>';
}else{
  echo "<script>alert('Invalid username or password');</script>";
  $extra="artistlogin.php";
  echo "<script>window.location.href='".$extra."'</script>";
  exit();
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home page</title>
    <link rel="stylesheet" href="artistlogin1.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    
    </head>
      <body>
          <div class="form-container">
            <div class="form2-box">
                
        
        <form method="POST" id ="send" class="input-wrap" action="artistlogin.php">
            <h1> Login </h1>
            <br>
                <input type="email" name="email" class ="input-field" placeholder="Enter Email Here" required>
                <br>
                <input type="password" name="pass" maxlength="8"  class ="input-field" placeholder="Enter password" required>
                <a href="Forgot1.php">Forgot Password?</a>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                 <br><br><br><br>
                <button type="submit" onclick="result()"  name="btn" class="submit-btn">Log in</button>  
               
          
        </form>
        <a href="home.html">Back to Home</a>
        <br>
        <a href="index.php">Login as admin</a>
                                  
           
          </div>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      </body>