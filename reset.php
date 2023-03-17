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
            $sql = "UPDATE user set password ='$pass' WHERE Email='$Email'" ;
            $result = mysqli_query($conn,$sql);

            if($result==1)
            {
                 include('cutomer.html');
            }
            else
            {
              include('Forgot.html');
            }
        }
}
 
?>