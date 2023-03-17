<?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
// for deleting user

   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manage Artist </title>
        <link href="adminstyle1.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
      <?php include_once('navbar.php');?>
        <div id="layoutSidenav">
         <?php include_once('sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Artist</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage artist</li>
                        </ol>
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Registered artist Details
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
            $query = "SELECT * FROM artist WHERE status = 'pending' ORDER BY Ar_id ASC";
            $result = mysqli_query($conn, $query);
            $cnt=1;
            while($row = mysqli_fetch_array($result)){
        ?>
                              
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['username'];?></td>
                                  <td><?php echo $row['Email'];?></td>
                                  <td><?php echo $row['District'];?></td>
                                  <td><?php echo $row['price'];?></td>
                                  <td><?php echo $row['posting_date'];?></td>
                                  <td>
                                 
                                  <form action ="manage-artist.php" method ="POST">
                    <input type = "hidden" name  ="id" value = "<?php echo $row['Ar_id'];?>"/>
                    <input type = "submit" name  ="approve" value = "Approve"/>
                    <input type = "submit" name  ="deny" value = "Deny"/>
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

if(isset($_POST['approve'])){
    $id = $_POST['id'];

    $select = "UPDATE artist SET status = 'approved' WHERE Ar_id = '$id'";
    $result = mysqli_query($conn, $select);

    $msg1=mysqli_query($conn,"SELECT * FROM artist WHERE  Ar_id = '$id'");
    $row = mysqli_fetch_assoc($msg1);
    $Email=$row['Email'];
    if($msg1)
    {
        $suject = "Email send via php using localhost";
        $body = "Hi, $Email Your request is confirmed.Now you can get hire from customers.
        This email send from Admin.";
        $sender ="From:tharushinishekadesilva@gmail.com";
    
        if(mail($Email,$suject,$body,$sender)){
          
           echo "<script>alert('Email sent succesfully to $Email')</script>";
           echo "<script type='text/javascript'> document.location = 'manage-artist.php'; </script>";
        }
      
      else
      {
       echo "<script>alert('Recheck your Email sent succesfully to $Email')</script>";
       echo "<script type='text/javascript'> document.location = 'manage-artist.php'; </script>";
      }
    }


    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "manage-artist.php"';
    echo '</script>';
}

if(isset($_POST['deny'])){
    $id = $_POST['id'];

    $select = "DELETE FROM artist WHERE Ar_id = '$id'";
    $result = mysqli_query($conn, $select);

    
    $msg1=mysqli_query($conn,"SELECT * FROM artist WHERE  Ar_id = '$id'");
    $row = mysqli_fetch_assoc($msg1);
    $Email=$row['Email'];
    if($msg1)
    {
        $suject = "Email send via php using localhost";
        $body = "Hi, $Email Your request is rejected.Try again.
        This email send from Admin.";
        $sender ="From:tharushinishekadesilva@gmail.com";
    
        if(mail($Email,$suject,$body,$sender)){
          
           echo "<script>alert('Email sent succesfully to $Email')</script>";
           echo "<script type='text/javascript'> document.location = 'home.html'; </script>";
        }
      
      else
      {
       echo "<script>alert('Recheck your Email sent succesfully to $Email')</script>";
       echo "<script type='text/javascript'> document.location = 'manage-artist.php'; </script>";
      }
    }

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "manage-artist.php"';
    echo '</script>';
}
?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="datatables-simple-demo.js"></script>
    </body>
</html>
<?php  }?>