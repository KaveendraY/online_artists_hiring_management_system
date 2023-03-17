<?php session_start();
require_once('connection1.php'); 
if(isset($_GET['id']))
    {
        //Get the food ID and details of the selected food
        $id = $_GET['id'];

        //Get the details of the selected food
        $sql = "SELECT * FROM artist WHERE Ar_id=$id";
        //Execute the query
        $res = mysqli_query($conn, $sql);
        //Count the rows
        $count = mysqli_num_rows($res);
        //check whether the data is available or not 
        if($count==1)
        {
            //We have data
            //Get the data from database
            $row = mysqli_fetch_assoc($res);
           
            $price = $row['price'];
           
            
        }
    }    
//Code for Registration 
if(isset($_POST['cbtn']))
{  
     $date=date('Y-m-d', strtotime($_POST['date1']));
    $dura=$_POST['dura'];
    $strat=$_POST['time'];
    $place=$_POST['place'];
    $type=$_POST['day'];
    $cname=$_POST['cuname'];
    $contact=$_POST['num'];
    $email=$_POST['cemail'];
    $price=$_POST['price'];
    $arname= $_POST['fname']; 
    $tot =$dura*$price;
 
    $stat="No";
   

    $msg="INSERT INTO hire(Date,duration, Start_time,Place,type, artist_name, total_price, cuname, contact_num, c_email,status) VALUES ( '$date',$dura,'$strat','$place','$type','$arname',$tot,'$cname',$contact,'$email','$stat')";

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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="proca.css">
  <link href="adminstyle1.css" rel="stylesheet" />
  <link href="hire1.css" rel="stylesheet" />
  
   

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
                                       <td> <input type="text"  class="form-control datepicker" autocomplete="off"  name="date1"    required /></td>
                                      
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
                                       <th>Place:</th>
                                       <td><select class="form-control" name="place" required>
                      <option>--select--</option>
                      <option value="Gampaha">Gampaha</option>
                      <option value="Colombo">Colombo</option>
                      <option value="Kalutara">Kalutara</option>
                      <option value="Hambantota">Hambantota</option>
                      <option value="Matara">Matara</option>
                      <option value="Galle">Galle</option>
                      <option value="Anuradhapura">Anuradhapura	</option>
                      <option value="Polonnaruwa">Polonnaruwa</option>
                      <option value="Matale">Matale</option>
                      <option value="Kandy">Kandy</option>
                      <option value="Nuwara Eliya">Nuwara Eliya</option>
                      <option value="Kegalle">Kegalle	</option>
                      <option value="Ratnapura">Ratnapura</option>
                      <option value="Trincomalee">Trincomalee</option>
                      <option value="Batticaloa">Batticaloa</option>
                      <option value="Anuradhapura">Anuradhapura	</option>
                      <option value="Polonnaruwa">Polonnaruwa</option>
                      <option value="Ampara">Ampara</option>
                      <option value="Badulla">Badulla</option>
                      <option value="Monaragala">Monaragala</option>
                      <option value="Jaffna">Jaffna	</option>
                      <option value="Kilinochchi"> Kilinochchi</option>
                      <option value="Mannar">Mannar	</option>
                      <option value="Mullaitivu">Mullaitivu	</option>
                      <option value="Vavuniya">Vavuniya</option>
                      <option value="Puttalam"> Puttalam</option>
                      <option value="Kurunegala"> Kurunegala</option>
    
                    </select></td>
                                   </tr>
                                 <?php if(isset($_GET['id'])){
    
                                 $userid=$_GET['id'];

                                  $query1=mysqli_query($conn,"SELECT * FROM artist WHERE Ar_id=$userid");
while($result1=mysqli_fetch_array($query1)){
 ?>
                                         <tr>
                                       <th>Artist Name:</th>
                                       <td><input class="form-control" id="fname" name="fname" type="text" value="<?php echo $result1['username'];?>" required /></td>
                                       <?php }} ?>
                                   </tr>
                                
                                   <tr>
                                       <th>Customer Name:</th>
                                       <td><input class="form-control" id="dis" name="cuname" type="text"   required /></td>
                                   </tr>
                                   <tr>
                                       <th>Customer contact num:</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="num" type="tele"   pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required /></td>
                                   </tr>
                                   <tr>
                                    
                                       <td colspan="3"><input class="form-control"  name="price" type="hidden" value="<?php echo $price;?>"/></td>
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
<script type="text/javascript">
   
    $('.datepicker').datepicker({ 
        startDate: new Date()
    });
  
</script>
</body>
</html>