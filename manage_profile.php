<?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['artistid']==0)) {
  header('location:logoutar.php');
  } else{
//Code for Updation 
if(isset($_POST['update']))
{
    $fname=$_POST['fname'];
    $contact=$_POST['contact'];
    $Dis=$_POST['dis'];
    $price=$_POST['price'];
    $userid=$_SESSION['artistid'];
    $msg=mysqli_query($conn,"update artist set username='$fname',ph_no='$contact',District ='$Dis',price='$price' where Ar_id='$userid'");

if($msg)
{
    echo "<script>alert('Profile updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'manage_profile.php'; </script>";
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
        <title>Edit Profile </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="adminstyle1.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="artistdas.css">
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('navbar2.php');?>
        <div id="layoutSidenav">
         <?php include_once('sidebar2.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                           
                        </ol>
                        
<?php 
 $userid=$_SESSION['artistid'];
$query=mysqli_query($conn,"select * from artist where Ar_id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['username'];?>'s Profile</h1>
                        <a href="pic.php">Upload image?</a>
                        <a href="dec.php">Berif description?</a>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>First Name</th>
                                       <td><input class="form-control" id="fname" name="fname" type="text" value="<?php echo $result['username'];?>" required /></td>
                                   </tr>
                                    <tr>
                                       <th>Email</th>
                                       <td colspan="3"><?php echo $result['Email'];?></td>
                                   </tr>
                    
                                         <tr>
                                       <th>Contact No.</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="contact" type="text" value="<?php echo $result['Ph_no'];?>"  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required /></td>
                                   </tr>
                                   
                                   <tr>
                                       <th>District</th>
                                       <td><input class="form-control" id="dis" name="dis" type="text" value="<?php echo $result['District'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <th>price</th>
                                       <td><input class="form-control" id="price" name="price" type="text" value="<?php echo $result['price'];?>"  required /></td>
                                   </tr>
                               
                                     
                                        <tr>
                                       <th>Reg. Date</th>
                                       <td colspan="3"><?php echo $result['posting_date'];?></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                            <?php } ?>
                            
  	  	
            	
            
            
          
                
                        </div>


                    </div>
                </main>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
