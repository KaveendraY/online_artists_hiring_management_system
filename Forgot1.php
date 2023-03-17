<?php
  require_once('connection1.php');

  if(isset($_POST['sbtn']))
  {

      $Email = mysqli_real_escape_string($conn,$_POST['email']);
    
          
           $sql = " SELECT * from artist where Email ='$Email'";
           $result = mysqli_query($conn,$sql);
           $num = mysqli_num_rows($result);

           if($num)
           {
             $suject = "Email test via php using localhost";
             $body = "Hi,Your activation link is http://localhost/hire/reset1.php
             This is a test email send from Localhost.";
             $sender ="From:tharushinishekadesilva@gmail.com";

             if(mail($Email,$suject,$body,$sender)){
                echo "<script>alert('Email sent succesfully to $Email')</script>";
             }
           
           else
           {
            echo "<script>alert('Recheck your Email sent succesfully to $Email')</script>";
           }
       
  }
}
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>forgot password form</title>
        <link rel="stylesheet" href="Forgot.css">
        
    </head>
      <body>
          <div class="form-container">
            <div class="form2-box">
                
        
        <form method="POST" id ="send" class="input-wrap" action="Forgot1.php">
            <h2  >Request a new password</h2>
            <br>
            <br>
            <P>Please Enter your email address into the box below and we will begin your password reset process</P>
            <br>
            <input type="email" name="email" size=40  class ="input-mail" placeholder="Enter Email Here" required>
            <br>
            <br>
            <button type="submit" name="sbtn" class="s-btn">Request a new password</button>  
            
            
        </form>
          </div>
          </div>
      </body>