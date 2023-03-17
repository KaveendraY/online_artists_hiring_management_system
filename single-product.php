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
    <title>profile page</title>
	
	
    <style>
        .mySlides {display:none;}
        </style>
    <link rel="stylesheet"href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="product1.css">
  
   
   
  
   

</head>
<body>
    <header class="header">
        <a href="#" class="logo"><span>A</span>rist <span>N</span>etwork</a>
        <nav class="navbar">
          
            <li>
                <a href="home.html">
                    <i class="user"  ><img src="home.png" ></i>
                </a>
            </li>
         
        </nav>
      
    </header>  




	



<section class="product">
	<div class="product__photo">
		<div class="photo-container">
			<div class="photo-main">
            <?php  $id=$_SESSION['id'];
         $img = mysqli_query($conn, "SELECT * FROM artist_table where artist_name = 'Song Kang'");
     while ($row1 = mysqli_fetch_array($img)) {     
		
      
      
        

           	echo "<img class='profile' src='image/".$row1['image']." '>";    }   ?>
				
			</div>
       
		</div>
	</div>
	<div class="product__info">
		<div class="title">
		<?php   $ret=mysqli_query($conn,"select * from artist where username='Song Kang' ");
                           
                           while($row=mysqli_fetch_array($ret))
                           {?>
			<h1><?php echo $row['username'];?></h1>
			<span>COD: 45999</span>
		</div>
		<div class="reviews">
			<span>reviews 1k+</span>
			<ul class="stars_list">
				<li><i class="ri-star-fill"></i></li>
				<li><i class="ri-star-fill"></i></li>
				<li><i class="ri-star-fill"></i></li>
				<li><i class="ri-star-fill"></i></li>
				<li><i class="ri-star-fill"></i></li>
			</ul>
		</div>
		<div class="price">
			For 1 hour $ <span><?php echo $row['price'];?></span>
		</div>
   <?php }   ?>
		<div class="description">
			
			<ul><li>Song Kang is a South Korean actor. His notable lead roles in television series include Love Alarm, Sweet Home, Nevertheless, and Navillera <li>
				
				
			</ul>
		</div>
		
		<a href="product.php"><button class="buy--btn">Add to cart</button></a>
		<a href="#"><button onclick="document.getElementById('id02').style.display='block'" style="width:auto;"class="buy--btn">Chat with me</button></a>
	</div>
	

  




   

    
    
<form method="POST" id="Register" class="input-group" action="product1.php">
    <div id="id02" class="modal">
      
    
        <div class="imgcontainer">
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        
        </div>
    
        <div class="container">
          <p>Chat using instargarm or Facebook</p>
         <br>
         <br>
          
            <a href="https://www.facebook.com/profile.php?id=100073771907701" onClick="return confirm('Do you really want to chat with FB');"><i class="fab fa-facebook fa-9x" aria-hidden="true"></i></a>
            <br>
            <a href="https://www.instagram.com/_pearl_artist/" onClick="return confirm('Do you really want to chat with inster');"><i class="fab fa-instagram-square fa-9x" aria-hidden="true"></i></a>
            <br>
            <br>
         
           
            <button type="button"  onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    
      </form>
    </div>
    </div>

   </section>
    <h1 class="heading"><span>MY</span>Gallery</h1>
   
    
  
<script>

    // Get the modal
    var modal = document.getElementById('id02');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

</body>
</html>

<?php }?>