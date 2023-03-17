
    
 
  
<?php session_start();
include_once('connection1.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logoutca.php');
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
        <title>Manage Hire Details </title>
        <link href="adminstyle1.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="artistdas.css">
        <link rel="stylesheet" href="paidgive.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
        
        <link rel="stylesheet" href="paid.css">
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('navbar3.php');?>
        <div id="layoutSidenav">
       
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="cutdashbode.php">Dashboard</a></li>
                           
                        </ol>

    <form method="POST"   action="pay1.php">
   <div class="container">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Owner</h3>
                <div class="input-field">
                    <input type="text" class="form-control" name="owner">
                </div>
            </div>
            <div class="owner">
                <h3>Artist Name</h3>
                <div class="input-field">
                    <input type="text" class="form-control" name="arname">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password" class="form-control" name="cvv">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Email</h3>
                <div class="input-field">
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="text" class="form-control" name="num">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Expiration</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months" >
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="years" >
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                      </select>
                </div>
                <div class="cards">
                    <img src="mc.png" alt="">
                    <img src="vi.png" alt="">
                    <img src="pp.png" alt="">
                </div>
            </div>    
        </div>
        <a href=""><button type="submit" name="btn" class="sbtn"><p>Confirm</p></button></a>
    </div>
</form>
</body>
</html>

<?php }?>  
<main>
                
                        

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="datatables-simple-demo.js"></script>