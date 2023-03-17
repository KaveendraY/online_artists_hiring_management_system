<?php include('connection.php') ?>
<?php 
    
    include './files/action.php';

    if(isset($_GET['logout'])){
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['img']);
    }
    else{
        //
    }

    if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
        $ava = $_SESSION['img'];
    }
    else{
        header('location: login.php');
    }


    if(isset($_GET['empty'])){
        unset($_SESSION['cart']);
    }

    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        foreach($_SESSION['cart'] as $k => $part){
            if($id == $part['id']){
                unset($_SESSION['cart'][$k]);
            }
        }
    }

    $total = 0;
?>


