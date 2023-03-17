
        <?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logoutca.php');
  } else{
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($conn,"delete from hire where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
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
        <title>Manage Hire Details </title>
        <link href="adminstyle1.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="artistdas.css">
        
        <link rel="stylesheet" href="paid.css">
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('navbar3.php');?>
        <div id="layoutSidenav">
         <?php include_once('sidebar3.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage hire</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="cutdashbode.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage hire</li>
                        </ol>
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Hire Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                             <th>Serial No.</th>
                                  <th>Duration in Hours</th>
                                  <th>Performance start_time</th>
                                  <th>Artist Name</th>
                                  <th>Customer Name</th>
                                  <th>Contact no.</th>
                                  <th>Customer Email</th>
                                  <th>Total Price</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Serial No.</th>
                                  <th>Duration in Hours</th>
                                  <th>Performance start_time</th>
                                  <th>Artist Name</th>
                                  <th>Customer Name</th>
                                  <th>Contact no.</th>
                                  <th>Customer Email</th>
                                  <th>Total Price</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>                       <?php 
$userid=$_SESSION['id'];
$query=mysqli_query($conn,"select * from user where Id='$userid'");
while($result=mysqli_fetch_array($query))
{ $name =$result['username'];?>                      
     
                                              <?php $ret=mysqli_query($conn,"select * from hire where cuname= '$name'  ORDER BY id ASC");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              { 
                               
                              ?>       
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['duration'];?></td>
                                  <td><?php echo $row['Start_time'] ; echo $row['type'];?></td>
                                  <td><?php echo $row['artist_name'];?></td>
                                  <td><?php echo $row['cuname'];?></td> 
                                  <td><?php echo $row['contact_num'];?></td> 
                                  
                                  <td><?php echo $row['c_email'];?></td>  <td><?php echo $row['total_price'];?></td>  <td><?php echo $row['post_time'];?></td>
                                  <td>
                                  <form action ="paid.php?id=<?php echo  $row['total_price'];?> "onClick="return confirm('Do you really want to pay payment');" method="POST"></a>
                    <input type = "hidden" name  ="id" value = "<?php echo $row['total_price'];?>"/>
                    <input type = "hidden" name  ="aid" value = "<?php echo $row['artist_name'];?>"/>
                    <input type = "submit"  name="pay" value="Payment"/>
                    
                </form>
                                    
   <?php  if(isset($_POST['pay'])){
    $id = $_POST['total_price'];

    $select = "UPDATE hire SET  payment_status = 'paid' WHERE total_price = '$id'";


  echo  $result;


    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "payment.php"';
    echo '</script>';
}
?>

                              </td>
                          
                              </tr><?php }?>  
                            
                                      
                                    </tbody><?php  $sum =mysqli_query($conn,"select SUM(total_price) As sum from hire  where cuname= '$name'") ;
                            $row1=mysqli_fetch_array($sum);
                                     ?>
                                               <div class="total" >
                                <h4>Total Rs: <span >$<?php echo $row1['sum'];?></span></h4>
                            </div>    
                            <?php $cnt=$cnt+1; ?>
                   
                </div>
                              </table>
                            </div>
                        </div>
                    </div>
                </main>
              </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="datatables-simple-demo.js"></script>
    </body>
</html>


       <?php }?>  
       <?php }?>  
                  