
<?php session_start();
require_once('connection1.php'); 

//Code for Registration 
if(isset($_POST['cbtn']))
{  
     $date=date('Y-m-d', strtotime($_POST['date1']));
    $dura=$_POST['dura'];
    $strat=$_POST['time'];
    $type=$_POST['day'];
    $arname=$_POST['name'];
    $cname=$_POST['cuname'];
    $contact=$_POST['num'];
    $email=$_POST['cemail'];
    $tot =($_POST['dura']* 78 );
    $msg="INSERT INTO hire(Date,duration, Start_time,type, artist_name, total_price, cuname, contact_num, c_email) VALUES ( '$date',$dura,'$strat','$type','$arname',$tot,'$cname',$contact,'$email')";

    $result = mysqli_query($conn,$msg);
if($msg)
{
    echo "<script>alert('Registered successfully');</script>";
   
}else{
    echo "<script>alert('Registered unsuccessfully');</script>";
   
}

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>profile page</title>
	
	

    <link rel="stylesheet"href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="stylesheet" href="proca.css">
  <link href="adminstyle1.css" rel="stylesheet" />
  <link href="hire.css" rel="stylesheet" />
  
   

</head>
<body>
    <header class="header">
        <a href="#" class="logo"><span>A</span>rist <span>N</span>etwork</a>
        <nav class="navbar">
          
            <li>
                <a href="home1.html">
                    <i class="user"  ><img src="home.png" ></i>
                </a>
            </li>
         
        </nav>
      
    </header> 
 
                    <div class="container-fluid px-4">
    <form method="POST"  action="product.php">
    <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                <tr>
                                       <th>Required  Date:</th>
                                       <td><input class="form-control" type="date"  name="date1"    required /></td>
                                      
                                   </tr>
                                   <tr>
                                    <th>Required performance Duration: </th>
                                       <td><select class="form-control" name="dura" >
        <option value="">--Select--</option>
        <option value="1">1h</option>
        <option value="2">2h</option>
        <option value="3">3h</option>
        <option value="4">4h</option>
        <option value="5">5h</option>
        </select></td>
                                   </tr>
                                    <tr>
                                       <th>Performance to start at:</th>
                                       <td colspan="3"><input class="form-control" type="num"  name="time"  required>     <select class="form-control" name="day" >
        <option value="">--Select--</option>
        <option value="Am">AM</option>
        <option value="Pm">PM</option>
</td>
                                   </tr>
                    
                                         <tr>
                                       <th>Artist Name:</th>
                                       <td><input class="form-control" id="dis" name="name" type="text"   required /></td>
                                      
                                   </tr>
                                   
                                   <tr>
                                       <th>Customer Name:</th>
                                       <td><input class="form-control" id="dis" name="cuname" type="text"   required /></td>
                                   </tr>
                                   <tr>
                                       <th>Customer contactnum:</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="num" type="tele"   pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required /></td>
                                   </tr>
                               
                                     
                                        <tr>
                                       <th>Customer Email:</th>
                                       <td colspan="3"> <input class="form-control" type="email" name="cemail" required></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="cbtn">continue</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                                      </div>


                    </div>
                </main>

        
</div>
</form>
</body>
</html>