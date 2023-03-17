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
                <a href="home1.html">
                    <i class="user"  ><img src="home.png" ></i>
                </a>
            </li>
         
        </nav>
      
    </header>  




	



<section class="product">
	<div class="product__photo">
		<div class="photo-container">
			<div class="photo-main">
            <?php  $name=$_GET['name'];
         $img = mysqli_query($conn, "SELECT * FROM artist_table where artist_name = '$name'");
     while ($row1 = mysqli_fetch_array($img)) {     
		
      
      
        

           	echo "<img class='profile' src='image/".$row1['image']." '>";      ?>
				
			</div>
       
		</div>
	</div>
	<div class="product__info">
		<div class="title">
      
			<h1><?php  echo $name; ?></h1>
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
			For 1 hour Performance $ <span><?php $sql = mysqli_query($conn,"SELECT * FROM artist where username = '$name'"); 
            while ($row = mysqli_fetch_array($sql)) {  echo $row['price']; ?></span>
		</div>
		
		<div class="description">
			
			
			
			<ul>
            <ul><?php $sql = mysqli_query($conn,"SELECT * FROM artistdes where username = '$name'"); 
            while ($row1 = mysqli_fetch_array($sql)) {  ?>
				<li> <?php echo $row1['des'];?></li>
		
			</ul>
				
	
		</div>
		
		<a href="product.php?id=<?php echo $row['Ar_id'];?>"><button class="buy--btn">Hire </button></a>
		<a href="#"><button onclick="document.getElementById('id02').style.display='block'" style="width:auto;"class="buy--btn">Chat with me</button></a>
	</div>
	

<?php}?>




   

    
    
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
    =
    
  
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
<?php }?>
<?php }?>
<?php }?>