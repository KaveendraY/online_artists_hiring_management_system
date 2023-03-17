
<?php
require_once('connection1.php');

if(isset($_POST['btn']))
{
    $Username = mysqli_real_escape_string($conn,$_POST['username']);
    $Email = mysqli_real_escape_string($conn,$_POST['email']);
    $Tel = mysqli_real_escape_string($conn,$_POST['tel']);
    $Password = mysqli_real_escape_string($conn,$_POST['password']);
    $Cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);

    if (empty($_POST['username']) ||
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
             $sql = "UPDATE user set  username = '$Username',Email ='$Email',Ph_num ='$Tel',password ='$pass' ,User_type ='2' WHERE Email='$Email'" ;
             $result = mysqli_query($conn,$sql);

            if($result)
            {
                include('cutomer.html');
            }
            else
            {
                echo"sql not matched";
            }
        }
}
 
?>












