<?php
  require_once('connection1.php');

  if(isset($_POST['sbtn']))
  {

      $Email = mysqli_real_escape_string($conn,$_POST['email']);
    
          
           $sql = " SELECT * from user where Email ='$Email'";
           $result = mysqli_query($conn,$sql);
           $num = mysqli_num_rows($result);

           if($num)
           {
             $suject = "Email test via php using localhost";
             $body = "Hi,Your activation link is http://localhost/hire/reset.html.
             This is a test email send from Localhost.";
             $sender ="From:tharushinishekadesilva@gmail.com";

             if(mail($Email,$suject,$body,$sender)){
                echo '<script>alert("Email sent succesfully to $Email")</script>';
             }
           
           else
           {
            echo '<script>alert("Recheck your Email sent succesfully to $Email")</script>';
           }
       
  }
}
   
?>