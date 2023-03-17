<?php

   $host ="localhost";
   $user= "root";
   $dbpassword ="";
   $db ="hiring_system";

   $conn = new mysqli($host,$user,$dbpassword,$db);
   if(!$conn){
       echo "Please check Your Database Connection";
   }

?>