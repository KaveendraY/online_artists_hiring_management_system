<?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logoutca.php');
  } else{
//Code for Updation 

 if(isset($_POST['submit'])) {
        
       
	$aname = $_POST['arname'];
    $title=$_POST['title'];
    $comm=$_POST['comment'];
    $name = $_POST['reviewer'];
 
   
      $email = $_POST['email'];
       $uid=$_SESSION['id'];
      
        
    
	 $msg=mysqli_query($conn,"INSERT INTO rating (artist_name, user_id, title, comment,reviewer,email) VALUES ('$arname', '$uid' ,'$title', '$comm', '$name', '$email')");
    
     
        
   if($msg) {
          
      
          echo "<script>alert(' succesfully ')</script>";
       echo "<script type='text/javascript'> document.location = 'cutdashbode.php'; </script>";
      
        }
        else{
          echo "<script>alert('Woops! something went Wrong.')</script>";
          include('cutomer.html');
        }
      } 




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manage payment</title>
        <link href="adminstyle1.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="artistdas.css">
		<div>
			<div>
			<body class="sb-nav-fixed">
      <?php include_once('navbar3.php');?>
        <div id="layoutSidenav">
         <?php include_once('sidebar3.php');?>
            <div id="layoutSidenav_content">
                <main>
		<div class="container-fluid px-4">
		<div class="card mb-4">
                            <div class="card-body">
			
							<form  method="POST" action="product_detail_content.php">
								<div class="form-group">
								<div class="form-group">
									<label >Artist Name</label>
									<input type="text" class="form-control" id="title" name="arname" required>
								</div>
								<div class="form-group">
									<label >Title</label>
									<input type="text" class="form-control" id="title" name="title" required>
								</div>
								<div class="form-group">
									<label >Review</label>
									<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
								</div>
								<div class="form-group">
									<label >Name</label>
										<input type="text" class="form-control"  id = "reviewer" name="reviewer" placeholder="Username" required>
								</div>
								<div class="form-group">
									<label >Email</label>
									<input type="email" class="form-control" id = "email"  name="email" placeholder="Email" required>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-secondary btn-sm" name="submit">Post</button> <div  class="btn btn-secondary btn-sm"><a href="cutdashbode.php">Cancel</a></div>
								</div>
							</form>
					

				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="datatables-simple-demo.js"></script>
    </body>
	<?php } ?>
</html>