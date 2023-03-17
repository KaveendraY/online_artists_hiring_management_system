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
          
              $select = "SELECT * FROM user WHERE Email = '$Email'";
              $result1 = mysqli_query($conn, $select);
              if(mysqli_num_rows($result1) > 0){
                  echo '<script type  = "text/javascript">';
                  echo 'alert("Email Already Taken!");';
                  echo 'window.location.href = "cutomer.html"';
                  echo '</script>';}else{
              $pass=md5($Password);
              $sql = "INSERT INTO user (username,Email,Ph_num,password) values ('$Username','$Email','$Tel','$pass')";
              $result = mysqli_query($conn,$sql);

              if($result)
              {
                   include('cutomer.html');
              }
              else
              {
                include('cutomer.html');
              }
          }
  }}
   
?>