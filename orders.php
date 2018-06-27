<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["user"])){
  header("Location: login.php");
}


$curr_user = $_SESSION["user"];
$total=0;

$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = "SELECT prod_id, size, qty, title, price, image, status, order_id FROM orders,products WHERE username='$curr_user' AND orders.prod_id=products.id AND (status=0 OR status=1) ORDER BY status DESC";


      
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
  $i=0;
   while($row = mysqli_fetch_assoc($retval)){

    $arr[$i]=$row;
    $i++;
}


   mysqli_close($conn);




?>

<!DOCTYPE html>
<html>
<head>
  <title>Orders</title>
  <meta charset="UTF-8">
  <link rel="icon" href="image/fevicon.png">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto:400,900" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <style type="text/css">
    body{
      margin-top: 100px;
    }
    

    .prod_box{
      min-height: 170px;
      max-height: 170px;
      min-width: 650px;
      max-width: 650px;
      border: 1px solid rgba(0,0,0,0.1);
    }

    .price_box{
      min-width: 300px;
      max-width: 300px;
      min-height: 320px;
      border: 1px solid rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

 <?php
  require('nav.html');
  ?>

    <div class="inner_cont2">
    <div class="container">
      <div style="font-family: 'Roboto', sans-serif; color: rgba(0,0,0,0.7); font-weight: 700; font-size: 15pt">My Orders</div><br><br>
      <div class="row">
        <div class="col-12">

          <?php

          foreach ($arr as $prodd) {
            $total = $total+$prodd["price"];
            echo '<div class="prod_box">
            <div style="min-width: 120px; max-width: 120px; min-height: 170px; max-height: 170px; background: url(prod/'.$prodd["image"].'); background-size: cover; background-position: center; display: inline-block; float: left; margin-right: 20px;"></div>

            <div style="font-weight: 700; color: rgba(0,0,0,0.7); padding-bottom: 10px; font-size: 10pt; padding-top: 10px">'.$prodd["title"].'</div>
            <div style="font-weight: 700; color: rgba(0,0,0,0.7); padding-bottom: 15px; font-size: 10pt">Rs. '.$prodd["price"].'</div>
            <div style="font-size: 10pt; padding-bottom: 10px">Size: '.$prodd["size"].' &nbsp &nbsp Quantity: '.$prodd["qty"].'</div><hr>
            <div style="font-size: 10pt; font-weight: 700">';
            if($prodd["status"]==0){ 
              echo 'processing';
            } elseif ($prodd["status"]==1) {
              echo 'shipped';
            }else{
              echo "delivered";
            }
            echo '</div></div><br>';
          }

          ?>

        </div>
      </div>

    </div>
    </div>


    <br><br><br>

     
</body>
</html>