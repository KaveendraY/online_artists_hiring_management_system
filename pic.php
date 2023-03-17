<?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['artistid']==0)) {
  header('location:logoutar.php');
  } else{
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Artist </title>
        <link href="adminstyle1.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <head>
        <title>artist dashbord</title>
        <link rel="stylesheet" href="artistdas.css">
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('navbar2.php');?>
        <div id="layoutSidenav">
         <?php include_once('sidebar2.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
  
  <form method="POST" action="pic.php" enctype="multipart/form-data">
  
        <div class="card-body">
                                <table class="table table-bordered">
                                   
                                    <tr>
                                       <th>Artistname</th>
                                       <td ><input class="form-control" id="fname" name="email" type="text" value="" required /></td>
                                   </tr>
                                   <tr>
                                    <th>Image</th>
                                       <td><input class="form-control" id="fname" name="image" type="file" value="" required /></td>
                                   </tr>
                                   
                                
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="upload">Upload Image</button></td>

                                   </tr>
                                    </tbody>
                                </table>
  	
  </form>
  
  <?php
  
    
  if (isset($_POST['upload'])) {
	
  	// Get name of images
  	$Get_image_name = $_FILES['image']['name'];
  	
  	// image Path
  	$image_Path = "image/".basename($Get_image_name);
  $email =$_POST['email'];
  	$sql = "INSERT INTO artist_table (artist_name,image ) VALUES ( '$email','$Get_image_name')";
  	
	// Run SQL query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)) {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'manage_profile.php'; </script>";
  		
  	}else{
        echo "<script>alert('Not Insert Image');</script>";
        echo "<script type='text/javascript'> document.location = 'pic.php'; </script>";
  		
  	}
  }
  ?>
     </body>
</html>
<?php } ?>