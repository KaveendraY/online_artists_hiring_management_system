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
        <title>Manage hire</title>
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
                        <h1 class="mt-4">Manage hire</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="artistdash.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage hire</li>
                        </ol>
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Confirmed Hire details
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
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                              <?php
                                
                                                
                                                 $query = "SELECT * FROM hire WHERE status = 'No' ORDER BY id ASC";
                                                 $result = mysqli_query($conn, $query);
                              $cnt=1;
                              while($row = mysqli_fetch_array($result)){
                              ?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['duration'];?></td>
                                  <td><?php echo $row['Start_time'] ; echo $row['type'];?></td>
                                  <td><?php echo $row['artist_name'];?></td>
                                  <td><?php echo $row['cuname'];?></td> 
                                  <td><?php echo $row['contact_num'];?></td> 
                                  <td><?php echo $row['c_email'];?></td>  <td><?php echo $row['post_time'];?></td>
                                  <td>
                                 
                                  <form action ="manage_hire.php" method ="POST">
                    <input type = "hidden" name  ="id" value = "<?php echo $row['id'];?>"/>
                    <input type = "submit" name  ="approve" value = "Yes"/>
                    <input type = "submit" name  ="deny" value = "No"/>
                </form>
            
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php
                if(isset($_POST['approve']) || isset($_GET['email'])){
    $id = $_POST['id'];

    $select = "UPDATE hire SET status = 'Yes' WHERE id = '$id'";
    $result = mysqli_query($conn, $select);
   
  
        $user=$_SESSION['artistname'];
        
    $msg1=mysqli_query($conn,"SELECT * FROM hire WHERE  id = '$id'");
    $row = mysqli_fetch_assoc($msg1);
    $Email=$row['c_email'];
    if($msg1)
    {
        $suject = "Email send via php using localhost";
        $body = "Hi, $Email Your request is confirmed.Now you can hire.
        This email send from $user.";
        $sender ="From:tharushinishekadesilva@gmail.com";
    
        if(mail($Email,$suject,$body,$sender)){
          
           echo "<script>alert('Email sent succesfully to $Email')</script>";
           echo "<script type='text/javascript'> document.location = 'manage_hire.php'; </script>";
        }
      
      else
      {
       echo "<script>alert('Recheck your Email sent succesfully to $Email')</script>";
       echo "<script type='text/javascript'> document.location = 'manage_hire.php'; </script>";
      }
    }

    echo '<script type = "text/javascript">';
    echo 'alert("Hire Confirmed!");';
    echo 'window.location.href = "manage_hire.php"';
    echo '</script>';
}

if(isset($_POST['deny'])){
    $id = $_POST['id'];

    $select = "DELETE FROM hire WHERE id = '$id'";
    $result = mysqli_query($conn, $select);

    $msg1=mysqli_query($conn,"SELECT * FROM hire WHERE  id = '$id'");
    $row = mysqli_fetch_assoc($msg1);
    $Email=$row['c_email'];
    if($msg1)
    {
        $suject = "Email send via php using localhost";
        $body = "Hi, $Email Your request is rejected.Try again.
        This email send from $user.";
        $sender ="From:tharushinishekadesilva@gmail.com";
    
        if(mail($Email,$suject,$body,$sender)){
          
           echo "<script>alert('Email sent succesfully to $Email')</script>";
           echo "<script type='text/javascript'> document.location = 'home.html'; </script>";
        }
      
      else
      {
       echo "<script>alert('Recheck your Email sent succesfully to $Email')</script>";
       echo "<script type='text/javascript'> document.location = 'manage_hire.php'; </script>";
      }
    }


    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "manage_hire.php"';
    echo '</script>';
}?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="datatables-simple-demo.js">
        </script>
    </body>
</html>
<?php  }?>