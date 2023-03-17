<?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['artistid']==0)) {
  header('location:logoutar.php');
  } else{ 
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from user where Id='$adminid'");
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
        <title>B/w Dates Report Result </title>
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
                        <h1 class="mt-4">B/w Dates Report Result</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">B/w Dates Report Result</li>
                        </ol>
            
                        <div class="card mb-4">
                            <div class="card-header" align="center" style="font-size:20px;">
                                <i class="fas fa-table me-1"></i>
<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>

                              B/w Dates Report Result from <?php echo date("d-m-Y", strtotime($fdate));?> to <?php echo date("d-m-Y", strtotime($tdate));?>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Sno.</th>
                                  <th>Username</th>
                                  <th> Email Id</th>
                                  <th>District</th>
                                  <th>price</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Sno.</th>
                                  <th>Username</th>
                                  <th> Email Id</th>
                                  <th>District</th>
                                  <th>price</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php
$ad = $_SESSION['artistid'];
 $ret=mysqli_query($conn,"select * from artist where  date(posting_date) between '$fdate' and '$tdate' and Ar_id=$ad");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <  <td><?php echo $row['username'];?></td>
                                  <td><?php echo $row['Email'];?></td>
                                  <td><?php echo $row['District'];?></td>
                                  <td><?php echo $row['price'];?></td>
                                  <td><?php echo $row['posting_date'];?></td>
                                  <td>
                                 
                                     
                                  <a href="user-profile1.php?uid=<?php echo $row['Ar_id'];?>"> 
                          <i class="fas fa-edit"></i></a>
                                     <a href="manage-artist.php?id=<?php echo $row['Ar_id'];?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
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
<?php } ?>