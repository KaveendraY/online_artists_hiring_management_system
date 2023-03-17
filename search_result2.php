<?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logoutca.php');
  } else{ ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
   
      <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  
     
  
      <!-- Bootstrap core CSS -->
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  
   
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="fontawesome.css">
    <link rel="stylesheet" href="music2.css">
    <link rel="stylesheet" href="owl.css">


  
  

    <link rel="stylesheet" href="musicsea1.css">
</head>
<body>
<header>
        <h1>Artist For Hire</h1>
        <svg  viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon class="svg--sm" fill="rgb(173, 165, 165)" points="0,0 30,100 65,21 90,100 100,75 100,100 0,100"/>
          <polygon class="svg--lg" fill="rgb(173, 165, 165)" points="0,0 15,100 33,21 45,100 50,75 55,100 72,20 85,100 95,50 100,80 100,100 0,100" />
        </svg>
      </header>
      
      <section>
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-5 my-5 my-md-0" method="post" action="search_result2.php">
                <div class="input-group">
                    <input class="form-control" type="text" size="50" placeholder="Search Artist by name , type contact number" title="Search User by name , email and contact number" aria-describedby="btnNavbarSearch" name="searchkey" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit" ><i class="fas fa-search"></i></button>
                </div>
            </form>
                
            
             
           
 
                      
<?php 
$searchkey=$_POST['searchkey'];
$ret=mysqli_query($conn,"select * from artist where (username like '%$searchkey%' || Act_type like '%$searchkey%' || Type like '%$searchkey%')");
                           
                              while($row=mysqli_fetch_array($ret))
                              {?>
                             
                              <div class="featured container no-gutter">
 
                              <div class="row posts">
     <div id="1" class="item new col-md-4">
       <a href="single_product.php?name=<?php echo $row['username'];?>">
         <div class="featured-item">
        <?php  $id=$_SESSION['id'];
         $img = mysqli_query($conn, "SELECT * FROM artist_table where artist_name = '".$row['username']."'");
     while ($row1 = mysqli_fetch_array($img)) {     
		
      
      
        

           	echo "<img src='image/".$row1['image']." '>";    }   ?>
           <h4><?php echo $row['username'];?></h4>
           <h6>From $<?php echo $row['price'];?></h6>
         </div>
       </a>
     </div>
                                  
     </div>
     </div>                        
                                   
                                  
     <?php }?>                       
     <div class="page-navigation">
       <div class="container">
         <div class="row">
           <div class="col-md-12">
             <ul>
               <li class="current-page"><a href="#">1</a></li>
               <li><a href="#">2</a></li>
               <li><a href="#">3</a></li>
               <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
             </ul>
           </div>
         </div>
       </div>
     </div>
         
     
       </section>
                                  <section>
         <div class="container"></div>
         <footer>
           <!-- Footer main -->
           <section class="ft-main">
             <div class="ft-main-item">
               <h2 class="ft-title">About</h2>
               <ul>
                 <li><a href="home1.html">home</a></li>
                 <li><a href="#">Portfolio</a></li>
                 <li><a href="#">Pricing</a></li>
                 <li><a href="#">Customers</a></li>
                 <li><a href="#">Careers</a></li>
               </ul>
             </div>
             <div class="ft-main-item">
               <h2 class="ft-title">Resources</h2>
               <ul>
                 <li><a href="#">Docs</a></li>
                 <li><a href="#">Blog</a></li>
                 <li><a href="#">eBooks</a></li>
                 <li><a href="#">Webinars</a></li>
               </ul>
             </div>
             <div class="ft-main-item">
               <h2 class="ft-title">Contact</h2>
               <ul>
                 <li><a href="#">Help</a></li>
                 <li><a href="#">Sales</a></li>
                 <li><a href="#">Advertise</a></li>
               </ul>
             </div>
            
           </section>
          
         
          
           <!-- Footer legal -->
           <section class="ft-legal">
             <ul class="ft-legal-list">
               <li><a href="#">Terms &amp; Conditions</a></li>
               <li><a href="#">Privacy Policy</a></li>
               <li>&copy; 2021 Copyright </li>
             </ul>
           </section>
         </footer>
       </section>
            <!-- Bootstrap core JavaScript -->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
 
     <!-- Additional Scripts -->
     <script src="custom.js"></script>
     <script src="owl.js"></script>
     <script src="isotope.js"></script>
 
 
     <script language = "text/Javascript"> 
       cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
       function clearField(t){                   //declaring the array outside of the
       if(! cleared[t.id]){                      // function makes it static and global
           cleared[t.id] = 1;  // you could use true and false, but that's more typing
           t.value='';         // with more chance of typos
           t.style.color='#fff';
           }
       }
     </script>
     
 </body>
 </html>
                                  <?php }?>