<?php

   $host ="localhost";
   $user= "root";
   $dbpassword ="";
   $db ="hire system";

   $conn = new mysqli($host,$user,$dbpassword,$db);
   if(!$conn){
       echo "Please check Your Dtabase Connection";
   }

?>