<?php
require_once('connection1.php');

if(isset($_POST['btn']))
{
   
    $Email = mysqli_real_escape_string($conn,$_POST['email']);
    $Password = mysqli_real_escape_string($conn,$_POST['password']);
    $Cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
    
    if (
    empty($_POST['email']) ||
    empty($_POST['password']) ||
    empty($_POST['cpassword'])) {
             echo "Please Fill in the Blanks";
         }
        if($Password!=$Cpassword)
        {
            echo"Password not matched";
        }
        else{
            $pass=md5($Password);
            $sql = "UPDATE artist set password ='$pass' WHERE Email='$Email'" ;
            $result = mysqli_query($conn,$sql);

            if($result==1)
            {
                echo "<script>alert(' updated successfully');</script>";
                echo "<script type='text/javascript'> document.location = 'artistlogin.php'; </script>";
        
            }
            else
            {
                echo "<script>alert(' Something went wrong');</script>";
                echo "<script type='text/javascript'> document.location = 'reset1.php'; </script>";
            }
        }
}
 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>reset password form</title>
        <link rel="stylesheet" href="reset.css">
    </head>
      <body>
          <div class="form-container">
            <div class="form2-box">
                
        
        <form method="POST" id ="send" class="input-wrap" action="reset1.php">
            <h1> Reset password </h1>
            <br>
            <input type="email"class ="input" size=30  name="email" placeholder="Email" required>
            <br>
            <input type="password"class ="input" size=30 maxlength="8" name="password" placeholder=" New password" required>
            <br>
            <input type="password" class="input"size=30 maxlength="8" name="cpassword" placeholder="Confirm password" required>
            <br><br>
            <button type="submit" name="btn" class="s-btn">Reset</button>
            
        </form>
          </div>
          </div>
      </body>