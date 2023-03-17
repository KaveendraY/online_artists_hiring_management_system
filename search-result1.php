<?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['artistid']==0)) {
  header('location:logoutar.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manage Users </title>
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
                        <h1 class="mt-4">
Search Results</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="artistdash.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Search Results</li>
                        </ol>
            <h3>Search Results against keyword '<?php echo $_POST['searchkey'];?>'</h3>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Search Result
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                     
                                             <th>Duration in Hours</th>
                                  <th>Performance start_time</th>
                                  <th>Artist Name</th>
                                  <th>Customer Name</th>
                                  <th>Contact no.</th>
                                  <th>Customer Email</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          
                                             <th>Duration in Hours</th>
                                  <th>Performance start_time</th>
                                  <th>Artist Name</th>
                                  <th>Customer Name</th>
                                  <th>Contact no.</th>
                                  <th>Customer Email</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
$searchkey=$_POST['searchkey'];
$ret=mysqli_query($conn,"select * from hire where (cuname like '%$searchkey%' || c_email like '%$searchkey%' || artist_name like '%$searchkey%')");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                              td><?php echo $row['duration'];?></td>
                                  <td><?php echo $row['Start_time'];?></td>
                                  <td><?php echo $row['artist_name'];?></td>
                                  <td><?php echo $row['cuname'];?></td> 
                                  <td><?php echo $row['contact_num'];?></td> 
                                  <td><?php echo $row['c_email'];?></td>  <td><?php echo $row['post_time'];?></td>
                                  <td>
                                     
                                     <a href="profile.php?uid=<?php echo $row['id'];?>"> 
                          <i class="fas fa-edit"></i></a>
                                     <a href="manage-hire.php?id=<?php echo $row['id'];?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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