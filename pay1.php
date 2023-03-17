<?php
  require_once('connection1.php');


  if(isset($_POST['btn']))
  {    $aname = mysqli_real_escape_string($conn,$_POST['arname']);
      $name = mysqli_real_escape_string($conn,$_POST['owner']);
      $Email = mysqli_real_escape_string($conn,$_POST['email']);
      $cvv = mysqli_real_escape_string($conn,$_POST['cvv']);
      $card_num = mysqli_real_escape_string($conn,$_POST['num']);
      $month = mysqli_real_escape_string($conn,$_POST['months']);
      $year = mysqli_real_escape_string($conn,$_POST['years']);

 
      
            
             
              $sql = "INSERT INTO payment (Cu_id,artistname,Owner,Email,cvv,card_no,exp) values (1,'$aname','$name','$Email','$cvv','$card_num','$month$year')";
            
              $result = mysqli_query($conn,$sql);

              if($result){
              $msg=mysqli_query($conn, " SELECT * from artist where username= '$aname'");
              $row = mysqli_fetch_assoc($msg);
                              
            
                $Email=$row['Email'];
            
           if($msg){
           $suject = "Email test via php using localhost";
           $body = "Hi, This email send from $name.Payment was paid";
           $sender ="From:tharushinishekadesilva@gmail.com";

           if(mail($Email,$suject,$body,$sender)){
        
            echo "<script>alert('payment paid.')</script>";
           echo "<script type='text/javascript'> document.location = 'product_detail_content.php'; </script>";
       
              } 
              else
              {
                echo "<script>alert('Woops! Email or card details  Wrong.')</script>";
                echo "<script type='text/javascript'> document.location = 'paid.php'; </script>";
              }
          }
        }
              }
?>