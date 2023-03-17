<?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logoutca.php');
  } else{
//Code for Updation 
if(isset($_POST['update']))
{
    $fname=$_POST['fname'];
    $start=$_POST['time'];
    $contact=$_POST['num'];
    $userid=$_GET['uid'];
    $msg=mysqli_query($conn,"update hire set duration='$fname',Start_time='$start',contact_num='$contact' where id='$userid'");

if($msg)
{
    echo "<script>alert('Profile updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'payement.php'; </script>";
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
        <link href="adminstyle1.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="artistdas.css">
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('navbar3.php');?>
        <div id="layoutSidenav">
          <?php include_once('sidebar3.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
<?php 
$userid=$_GET['uid'];
$query=mysqli_query($conn,"select * from hire where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['cuname'];?>'s Hiring</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Duration in Hours</th>
                                       <td><input class="form-control" id="fname" name="fname" type="text" value="<?php echo $result['duration'];?>" required /></td>
                                   </tr>
                                   </tr>
                                    <tr>
                                       <th>Performance to start at:</th>
                                       <td colspan="3"><input class="form-control" size="20" type="num" value="<?php echo $result['Start_time']; ?>" name="time"  required></td>
                                   </tr>
                    
                                         <tr>
                                       <th>Artist Name:</th>
                                       <td colspan="3"><?php echo $result['artist_name'];?></td>
                                      
                                   </tr>
                                   
                                   <tr>
                                       <th>Customer Name:</th>
                                       <td colspan="3"><?php echo $result['cuname'];?></td>
                                   </tr>
                                   <tr>
                                       <th>Customer contactnum:</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="num" type="tele" value="<?php echo $result['contact_num'];?>"  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required /></td>
                                   </tr>
                               
                                     
                                        <tr>
                                       <th>Customer Email:</th>
                                       <td colspan="3"><?php echo $result['c_email'];?></td>
                                   </tr>
                                        <tr>
                                       <th>Reg. Date</th>
                                       <td colspan="3"><?php echo $result['post_time'];?></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>

                    </div>
                </main>
          
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
