<?php
   session_start();
 require_once('connection1.php');
 if (isset($_POST['btn'])) {
        
       

   
      $email = $_POST['email'];
      $password = md5($_POST['pass']);
      
        
    
      $sql = "SELECT * FROM user WHERE Email='$email' && password='$password'";
      $result = mysqli_query($conn, $sql);
      $num=mysqli_fetch_array($result);
      
     
        
        if ($num > 0) {
          $_SESSION['id']=$num['Id'];
      
          echo "<script>alert('Customer s login succesfully ')</script>";
       echo "<script type='text/javascript'> document.location = 'musicsea.php'; </script>";
      
        }
        else{
          echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
          include('cutomer.html');
        }
      } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        
      }
    
              
           
 

                 ?>