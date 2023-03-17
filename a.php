<?php 
if(isset($_POST['confirm'])){
    $email=$_POST['email'];
    $artist=$_POST['artist'];
    $a="Yes";

    $msg=mysqli_query($conn,"UPDATE user set status='$a' FROM hire WHERE c_email  ='$email'");
if($msg){
    $suject = "Email send via php using localhost";
    $body = "Hi, $Email Your request is confirmed.Now you can hire.
    This email send from $artist.";
    $sender ="From:tharushinishekadesilva@gmail.com";

    if(mail($email,$suject,$body,$sender)){
      
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

if(isset($_POST['reject'])){
    $email=$_POST['email'];
    $b="No";
    $msg=mysqli_query($conn,"UPDATE user set status='$b' FROM hire WHERE c_email  ='$email'");

    
}
?>