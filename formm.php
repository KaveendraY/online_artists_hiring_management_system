<?php
  require_once('connection1.php');

  if(isset($_POST['s1-btn']))
  {
     
      $Username = mysqli_real_escape_string($conn,$_POST['username']);
      $Email = mysqli_real_escape_string($conn,$_POST['email']);
      $Tel = mysqli_real_escape_string($conn,$_POST['tel']);
      $Password = mysqli_real_escape_string($conn,$_POST['password']);
      $Cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
      $dis = mysqli_real_escape_string($conn,$_POST['District']);
      $Do = mysqli_real_escape_string($conn,$_POST['Dis']);
      $price = mysqli_real_escape_string($conn,$_POST['price']);
      $Type = mysqli_real_escape_string($conn,$_POST['ActType']);
      $Style = mysqli_real_escape_string($conn,$_POST['style']);
      $website = mysqli_real_escape_string($conn,$_POST['web']);
      $FB = mysqli_real_escape_string($conn,$_POST['url']);
     
      
     
     

  	
      

      if (empty($_POST['username']) ||
      empty($_POST['email']) ||
      empty($_POST['password']) ||
      empty($_POST['cpassword'])|| empty($_POST['ActType']) || empty($_POST['style'])||empty($_POST['Dis']) ||
      empty($_POST['web']) ||
      empty($_POST['url'])) {
                echo "Please Fill in the Blanks";
           }
           if($Password!=$Cpassword)
           {
               echo"Password not matched";
           }
           else{
            $select = "SELECT * FROM artist WHERE Email = '$Email'";
            $result1 = mysqli_query($conn, $select);
            if(mysqli_num_rows($result1) > 0){
                echo '<script type  = "text/javascript">';
                echo 'alert("Email Already Taken!");';
                echo 'window.location.href = "form.html"';
                echo '</script>';
            }else{
               $pass=md5($Password);
               $sql =" INSERT INTO artist( username, Email, Ph_no, password, District, price, Act_type, Style, inturl, fburl, eventtype,Type,status)  VALUES  ('$Username','$Email','$Tel','$pass','$dis','$price','$Type','$Style','$website','$FB','$Do','Dancer','pending')";
             
           
               $result = mysqli_multi_query($conn,$sql);
              
 
               if($result){
                   
                   $msg=mysqli_query($conn, " SELECT Email from user ");
            
                 
                   $row=mysqli_fetch_array($msg);
               
                $suject = "Email test via php using localhost";
                $body = "Hi, This email send from ArtistNetwork.$Username is newly added Musicans to the our website";
                $sender ="From:tharushinishekadesilva@gmail.com";
   
                if(mail($row['Email'],$suject,$body,$sender)){
             
                echo "<script>alert('Artist registre succesfully ')</script>";
                echo "<script type='text/javascript'> document.location = 'artistdash.php'; </script>";
               
               }
               else
               {
                echo "<script>alert('Woops! Something went Wrong.')</script>";
                echo "<script type='text/javascript'> document.location = 'form2.html'; </script>";
               }
               
            
           }}
        } 
  }
 ?>