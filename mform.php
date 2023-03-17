<?php
  require_once('connection1.php');

  if(isset($_POST['s1-btn']))
  {
     
      $Type = mysqli_real_escape_string($conn,$_POST['ActType']);
      $Style = mysqli_real_escape_string($conn,$_POST['style']);
      $Actname = mysqli_real_escape_string($conn,$_POST['Aname']);
      $website = mysqli_real_escape_string($conn,$_POST['web']);
      $FB = mysqli_real_escape_string($conn,$_POST['url']);
      $Do = mysqli_real_escape_string($conn,$_POST['customRadioInline1']);
     

      if ( empty($_POST['ActType']) || empty($_POST['style'])||empty($_POST['Aname']) ||
      empty($_POST['web']) ||
      empty($_POST['url']) ||
      empty($_POST['customRadioInline1'])) {
                echo "Please Fill in the Blanks";
           }
          
           else{

               
               $sql= "INSERT INTO artist_profile (A_Id,Act_type,Style,Actname,weburl,fburl,eventtype) values (2,'$Type','$Style','$Actname','$website','$FB','$Do')";

             
              echo $sql;
               $result = mysqli_multi_query($conn,$sql);
              
 
               if($result)
               {
                    echo "successful";
               }
               else
               {
                 echo "Unsuccessful";
               }
               
           }
   }
    
 ?>




