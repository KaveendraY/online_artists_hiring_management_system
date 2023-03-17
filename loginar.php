<?php
   session_start();
 require_once('connection1.php');
 if (isset($_POST['btn'])) {
        
       

   
      $email = $_POST['email'];
      $password = md5($_POST['pass']);
      
        
    
      $sql = "SELECT * FROM artist WHERE Email='$email' && password='$password'";
      $result = mysqli_query($conn, $sql);
      
     
        
        if ($result->num_rows > 0) {
        
        
        
        include('artistdash.html');
        }
        else{
         
          include('artistlogin.html');
        }
      } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        
      }
    
              
           
 

                 ?>